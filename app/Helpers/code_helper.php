<?php

use Endroid\QrCode\Builder\Builder;
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
     * @return string Path File (png)
     */
    function barcode(string $text, bool $withText = true)
    {
        $dir = WRITEPATH . 'cache/barcode/';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $filename = uniqid('bc_') . '.png';
        $filepath = $dir . $filename;

        $generator = new BarcodeGeneratorPNG();
        $barcode = $generator->getBarcode($text, BarcodeGenerator::TYPE_CODE_128, 2, 15);
        if ($withText) {
            $barcode = add_text_to_barcode($barcode, $text);
        }

        file_put_contents($filepath, $barcode);

        return $filepath;
    }
}

if (!function_exists('qrcode')) {
    /**
     * Helper untuk generate QRCode
     * @param string $text Text yang akan diubah menjadi QRCode
     * @param bool $withText Tulisan dibawah QRCode (Default: true)
     * @return string Path File (png)
     */
    function qrcode(string $text, string|null $label = null, string|null $logoSrc = null): string
    {
        $dir = WRITEPATH . 'cache/qrcode/';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $filename = uniqid('qr_') . '.png';
        $filepath = $dir . $filename;

        $writer = new PngWriter();
        $qr = new QrCode(
            data: $text,
        );

        if ($label) {
            $label = new Label(
                text: $label,
                textColor: new Color(0, 0, 0)
            );
        }

        if ($logoSrc) {
            $logo = new Logo(
                path: $logoSrc,
                resizeToWidth: 75,
                resizeToHeight: 75,
                punchoutBackground: true,
            );
        }

        $result = $writer->write($qr, $logo, $label);
        // $writer->validateResult($result, 'QR Code gagal dibuat.');
        $result->saveToFile($filepath);
        return $filepath;
    }
}

/**
 * Tambahkan teks di bawah barcode / qrcode
 *
 * @param string $binaryData   Binary PNG dari barcode/qrcode
 * @param string $text         Teks yang ingin ditambahkan
 * @param string $fontFile     Path ke font TTF (default: DejaVuSansMono bawaan Linux)
 * @param int    $fontSize     Ukuran font (default 14)
 * @param int    $padding      Padding vertikal (default 5px)
 * @return string              Binary PNG dengan teks
 */
function add_text_to_barcode(string $binaryData, string $text, string|null $fontFile = null, int $fontSize = 10, int $padding = 4): string
{
    if (is_null($fontFile)) {
        $fontFile = FCPATH . 'assets/fonts/Courier_Prime-Code.ttf';
    }
    $barcodeImg = imagecreatefromstring($binaryData);
    $width  = imagesx($barcodeImg);
    $height = imagesy($barcodeImg);

    // Hitung tinggi area teks
    $box = imagettfbbox($fontSize, 0, $fontFile, $text);
    $textHeight = abs($box[5] - $box[1]);

    // Buat canvas baru dengan tambahan tinggi teks + padding
    $newHeight = $height + $textHeight + $padding * 2;
    $newImg = imagecreatetruecolor($width, $newHeight);

    // Warna background putih & teks hitam
    $white = imagecolorallocate($newImg, 255, 255, 255);
    $black = imagecolorallocate($newImg, 0, 0, 0);
    imagefilledrectangle($newImg, 0, 0, $width, $newHeight, $white);

    // Tempelkan barcode/QR ke atas
    imagecopy($newImg, $barcodeImg, 0, 0, 0, 0, $width, $height);

    // Hitung posisi teks biar center
    $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
    $textWidth = abs($textBox[2] - $textBox[0]);
    $textX = ($width - $textWidth) / 2;
    $textY = $height + $textHeight + $padding - 2;

    // Gambar teks
    imagettftext($newImg, $fontSize, 0, $textX, $textY, $black, $fontFile, $text);

    // Export PNG
    ob_start();
    imagepng($newImg);
    $output = ob_get_clean();

    imagedestroy($barcodeImg);
    imagedestroy($newImg);

    return $output;
}
