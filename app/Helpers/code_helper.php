<?php

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Picqer\Barcode\BarcodeGenerator;
use Picqer\Barcode\BarcodeGeneratorPNG;

if (!function_exists('barcode')) {
    /**
     * Helper untuk generate barcode
     * @param string $text Text yang akan diubah menjadi barcode
     * @param bool $withText Tulisan dibawah barcode (Default: true)
     * @return string Filename .png on dir TEMPORARY_PATH
     */
    function barcode(string $text, bool $withText = true, array $barColor = [0, 0, 0], bool|array $bgColor = false, int $height = 30)
    {
        $dir = TEMPORARY_PATH;
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $filename = uniqid('barcode_') . '.png';
        $filepath = $dir . $filename;

        $generator = new BarcodeGeneratorPNG();
        $barcode = $generator->getBarcode($text, BarcodeGenerator::TYPE_CODE_128, 2, $height, $barColor);
        if ($withText) {
            $barcode = add_text_to_barcode($barcode, $text, $barColor, $bgColor);
        }

        file_put_contents($filepath, $barcode);

        return $filename;
    }
}

if (!function_exists('qrcode')) {
    /**
     * Helper untuk generate QRCode
     * @param string $text Text yang akan diubah menjadi QRCode
     * @param bool $withText Tulisan dibawah QRCode (Default: true)
     * @return string Filename .png on dir TEMPORARY_PATH
     */
    function qrcode(string $text, string|null $label = null, string|null $logoSrc = null): string
    {
        $dir = TEMPORARY_PATH;
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $filename = uniqid('qr_') . '.png';
        $filepath = $dir . $filename;

        $writer = new PngWriter();
        $qr = new QrCode(
            data: $text,
            // size: 100,
        );

        $label = null;
        if ($label) {
            $label = new Label(
                text: $label,
                textColor: new Color(0, 0, 0)
            );
        }

        $logo = null;
        if ($logoSrc) {
            $logo = new Logo(
                path: $logoSrc,
                resizeToWidth: 75,
                resizeToHeight: 75,
                punchoutBackground: true,
            );
        }

        $result = $writer->write($qr, $logo, $label);
        $result->saveToFile($filepath);
        return $filename;
    }
}

/**
 * Tambahkan teks di bawah barcode / qrcode
 *
 * @param string      $binaryData   Binary PNG dari barcode/qrcode
 * @param string      $text         Teks yang ingin ditambahkan
 * @param string|null $fontFile     Path ke font TTF (default: Courier_Prime-Code.ttf)
 * @param int         $fontSize     Ukuran font (default 10)
 * @param array|int   $padding      Padding: angka (semua sisi) atau [top,right,bottom,left]
 * @param bool|array  $background   true=transparent, false=white, atau [r,g,b]
 * @param array|null  $textColor    [r,g,b] warna teks, default hitam
 * @return string                   Binary PNG dengan teks
 */
function add_text_to_barcode(
    string $binaryData,
    string $text,
    ?array $textColor = null,
    bool|array $background = false,
    int $fontSize = 10,
    array|int $padding = 4,
    string|null $fontFile = null,
): string {
    if (is_null($fontFile)) {
        $fontFile = FCPATH . 'assets/fonts/Courier_Prime-Code.ttf';
    }
    $barcodeImg = imagecreatefromstring($binaryData);
    $width  = imagesx($barcodeImg);
    $height = imagesy($barcodeImg);

    // Normalisasi padding
    if (is_int($padding)) {
        $padding = [$padding, $padding, $padding, $padding]; // top, right, bottom, left
    } elseif (is_array($padding) && count($padding) === 4) {
        $padding = array_values($padding);
    } else {
        $padding = [4, 4, 4, 4];
    }

    // Hitung tinggi area teks
    $box = imagettfbbox($fontSize, 0, $fontFile, $text);
    $textHeight = abs($box[5] - $box[1]);

    // Buat canvas baru
    $newWidth  = $width + $padding[1] + $padding[3];
    $newHeight = $height + $textHeight + $padding[0] + $padding[2];
    $newImg = imagecreatetruecolor($newWidth, $newHeight);

    // Atur background
    if ($background === true) {
        // transparan
        imagesavealpha($newImg, true);
        $transparent = imagecolorallocatealpha($newImg, 0, 0, 0, 127);
        imagefill($newImg, 0, 0, $transparent);
    } elseif (is_array($background) && count($background) === 3) {
        $bg = imagecolorallocate($newImg, $background[0], $background[1], $background[2]);
        imagefilledrectangle($newImg, 0, 0, $newWidth, $newHeight, $bg);
    } else {
        // default putih
        $white = imagecolorallocate($newImg, 255, 255, 255);
        imagefilledrectangle($newImg, 0, 0, $newWidth, $newHeight, $white);
    }

    // Tempelkan barcode
    imagecopy($newImg, $barcodeImg, $padding[3], $padding[0], 0, 0, $width, $height);

    // Hitung posisi teks (center horizontal)
    $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
    $textWidth = abs($textBox[2] - $textBox[0]);
    $textX = ($newWidth - $textWidth) / 2;
    $textY = $height + $padding[0] + 2 + $textHeight;

    // Warna teks
    if (is_array($textColor) && count($textColor) === 3) {
        $color = imagecolorallocate($newImg, $textColor[0], $textColor[1], $textColor[2]);
    } else {
        $color = imagecolorallocate($newImg, 0, 0, 0); // default hitam
    }

    imagettftext($newImg, $fontSize, 0, $textX, $textY, $color, $fontFile, $text);

    // Export PNG
    ob_start();
    imagepng($newImg);
    $output = ob_get_clean();

    imagedestroy($barcodeImg);
    imagedestroy($newImg);

    return $output;
}
