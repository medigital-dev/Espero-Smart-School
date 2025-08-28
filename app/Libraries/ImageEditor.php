<?php

namespace App\Libraries;

use GdImage;

class ImageEditor
{
    protected $gdImage;

    /**
     * Tambahkan teks ke dalam gambar dengan pembungkus kata otomatis
     *
     * @param GdImage    $image        Resource gambar
     * @param string     $text         Teks yang akan ditulis
     * @param int        $fromX        Posisi X awal kotak teks
     * @param int        $fromY        Posisi Y awal kotak teks
     * @param int        $boxWidth     Lebar kotak teks
     * @param int        $boxHeight    Tinggi kotak teks
     * @param int        $fontSize     Ukuran font
     * @param array      $fontColor    Warna teks [R, G, B] Default [255,255,255] White
     * @param array|null $outlineColor Warna outline [R, G, B] atau null
     * @param string     $fontFile     Path ke file TTF (default: OpenSans)
     * @return void
     */
    public function addTitleText(
        GdImage $image,
        string $text,
        int $fromX,
        int $fromY,
        int $boxWidth = 720,
        int $boxHeight = 120,
        array $fontColor = [255, 255, 255],
        ?array $outlineColor = null,
        int $fontSize = 40,
        bool $autoShrink = true,
        float $shrinkPercent = 0.9,
        string $font = ''
    ): void {
        // fallback font
        if (empty($font)) {
            $font = FCPATH . 'assets/fonts/Roboto_Condensed-ExtraBold.ttf';
        }

        if (!file_exists($font)) {
            throw new \RuntimeException("Font file tidak ditemukan: {$font}");
        }

        $color = imagecolorallocate($image, $fontColor[0], $fontColor[1], $fontColor[2]);
        $lineSpacing = 1.2;
        $minFontSize = 12;

        // === Fungsi bantu untuk hitung line wrapping ===
        $wrapText = function ($fs) use ($text, $font, $boxWidth) {
            $words = explode(' ', $text);
            $lines = [];
            $currentLine = '';

            foreach ($words as $word) {
                $testLine = ($currentLine === '') ? $word : $currentLine . ' ' . $word;
                $box = imagettfbbox($fs, 0, $font, $testLine);
                $lineWidth = $box[2] - $box[0];

                if ($lineWidth > $boxWidth && $currentLine !== '') {
                    $lines[] = $currentLine;
                    $currentLine = $word;
                } else {
                    $currentLine = $testLine;
                }
            }
            if ($currentLine !== '') {
                $lines[] = $currentLine;
            }
            return $lines;
        };

        // === Auto-shrink loop (pakai persen) ===
        do {
            $lines = $wrapText($fontSize);
            $lineHeight = (int) round($fontSize * $lineSpacing);
            $textHeight = count($lines) * $lineHeight;

            if (!$autoShrink || $textHeight <= $boxHeight || $fontSize <= $minFontSize) {
                break;
            }

            // Turunkan font dengan persentase
            $fontSize = max((int)($fontSize * $shrinkPercent), $minFontSize);
        } while (true);

        // posisi Y awal agar teks rata tengah vertikal
        $yStart = $fromY + (int) (($boxHeight - $textHeight) / 2) + $fontSize;

        foreach ($lines as $line) {
            $bbox = imagettfbbox($fontSize, 0, $font, $line);
            $textWidth = $bbox[2] - $bbox[0];
            $xText = $fromX + (int) (($boxWidth - $textWidth) / 2);

            // outline jika ada
            if ($outlineColor) {
                $outline = imagecolorallocate($image, $outlineColor[0], $outlineColor[1], $outlineColor[2]);
                for ($c1 = -1; $c1 <= 1; $c1++) {
                    for ($c2 = -1; $c2 <= 1; $c2++) {
                        imagettftext($image, $fontSize, 0, $xText + $c1, $yStart + $c2, $outline, $font, $line);
                    }
                }
            }

            // teks utama
            imagettftext($image, $fontSize, 0, $xText, $yStart, $color, $font, $line);

            $yStart += $lineHeight;
        }
    }

    /**
     * Tambahkan teks ke dalam gambar dengan pembungkus kata otomatis
     *
     * @param GdImage    $image        Resource gambar
     * @param string     $text         Teks yang akan ditulis
     * @param int        $fromX        Posisi X awal kotak teks
     * @param int        $fromY        Posisi Y awal kotak teks
     * @param int        $boxWidth     Lebar kotak teks
     * @param int        $boxHeight    Tinggi kotak teks
     * @param int        $fontSize     Ukuran font
     * @param array      $fontColor    Warna teks [R, G, B] Default [255,255,255] White
     * @param array|null $outlineColor Warna outline [R, G, B] atau null
     * @param string     $fontFile     Path ke file TTF (default: OpenSans)
     * @return void
     */
    public function addBodyText(
        GdImage $image,
        string $text,
        int $fromX,
        int $fromY,
        int $boxWidth = 720,
        int $boxHeight = 120,
        array $fontColor = [255, 255, 255],
        ?array $outlineColor = null,
        int $fontSize = 36,
        bool $autoShrink = true,
        float $shrinkPercent = 0.9,
        string $font = ''
    ): void {
        // fallback font
        if (empty($font)) {
            $font = FCPATH . 'assets/fonts/OpenSans_SemiCondensed-Bold.ttf';
        }

        if (!file_exists($font)) {
            throw new \RuntimeException("Font file tidak ditemukan: {$font}");
        }

        $color = imagecolorallocate($image, $fontColor[0], $fontColor[1], $fontColor[2]);
        $lineSpacing = 1.5;
        $minFontSize = 8;

        // === Fungsi bantu untuk hitung line wrapping ===
        $wrapText = function ($fs) use ($text, $font, $boxWidth) {
            $words = explode(' ', $text);
            $lines = [];
            $currentLine = '';

            foreach ($words as $word) {
                $testLine = ($currentLine === '') ? $word : $currentLine . ' ' . $word;
                $box = imagettfbbox($fs, 0, $font, $testLine);
                $lineWidth = $box[2] - $box[0];

                if ($lineWidth > $boxWidth && $currentLine !== '') {
                    $lines[] = $currentLine;
                    $currentLine = $word;
                } else {
                    $currentLine = $testLine;
                }
            }
            if ($currentLine !== '') {
                $lines[] = $currentLine;
            }
            return $lines;
        };

        // === Auto-shrink loop (pakai persen) ===
        do {
            $lines = $wrapText($fontSize);
            $lineHeight = (int) round($fontSize * $lineSpacing);
            $textHeight = count($lines) * $lineHeight;

            if (!$autoShrink || $textHeight <= $boxHeight || $fontSize <= $minFontSize) {
                break;
            }

            // Turunkan font dengan persentase
            $fontSize = max((int)($fontSize * $shrinkPercent), $minFontSize);
        } while (true);

        // posisi Y awal agar teks rata tengah vertikal
        $yStart = $fromY + (int) (($boxHeight - $textHeight) / 2) + $fontSize;

        foreach ($lines as $line) {
            $bbox = imagettfbbox($fontSize, 0, $font, $line);
            $textWidth = $bbox[2] - $bbox[0];
            $xText = $fromX + (int) (($boxWidth - $textWidth) / 2);

            // outline jika ada
            if ($outlineColor) {
                $outline = imagecolorallocate($image, $outlineColor[0], $outlineColor[1], $outlineColor[2]);
                for ($c1 = -1; $c1 <= 1; $c1++) {
                    for ($c2 = -1; $c2 <= 1; $c2++) {
                        imagettftext($image, $fontSize, 0, $xText + $c1, $yStart + $c2, $outline, $font, $line);
                    }
                }
            }

            // teks utama
            imagettftext($image, $fontSize, 0, $xText, $yStart, $color, $font, $line);

            $yStart += $lineHeight;
        }
    }

    /**
     * Resize image
     */
    public function resize(GdImage $image, int $newWidth, int $newHeight): GdImage
    {
        $resized = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($image), imagesy($image));
        return $resized;
    }

    /**
     * Rotate image
     *
     * @param GdImage $image
     * @param float $angle Sudut rotasi (0–360). Rotasi searah jarum jam.
     * @param array|null $bgColor Warna background [R, G, B] jika ada area kosong.
     * @return GdImage
     */
    public function rotate(GdImage $image, float $angle, array $bgColor = [255, 255, 255]): GdImage
    {
        $bg = imagecolorallocate($image, $bgColor[0], $bgColor[1], $bgColor[2]);
        $rotated = imagerotate($image, -$angle, $bg); // pakai -$angle biar searah jarum jam
        return $rotated;
    }

    /**
     * Menempelkan (merge) gambar lain ke dalam image utama dengan posisi manual/auto
     *
     * @param GdImage $baseImage   Gambar utama (misalnya flyer)
     * @param string|GdImage $overlay Path file atau GdImage yang akan ditempel
     * @param int|string $x        Posisi X (angka) atau keyword auto-position: left|center|right
     * @param int|string $y        Posisi Y (angka) atau keyword auto-position: top|middle|bottom
     * @param int $padding         Jarak dari tepi (default 10px)
     * @return GdImage             Gambar hasil merge
     */
    public function mergeImage(
        GdImage $baseImage,
        string|GdImage $overlay,
        int|string $x,
        int|string $y,
        int $padding = 20
    ): GdImage {
        // Kalau overlay berupa path → buat GD image
        if (is_string($overlay)) {
            $ext = strtolower(pathinfo($overlay, PATHINFO_EXTENSION));
            switch ($ext) {
                case 'png':
                    $overlayImg = imagecreatefrompng($overlay);
                    break;
                case 'jpg':
                case 'jpeg':
                    $overlayImg = imagecreatefromjpeg($overlay);
                    break;
                case 'gif':
                    $overlayImg = imagecreatefromgif($overlay);
                    break;
                default:
                    throw new \Exception("Format gambar tidak didukung: $ext");
            }
        } else {
            $overlayImg = $overlay;
        }

        $ow = imagesx($overlayImg);
        $oh = imagesy($overlayImg);

        $bw = imagesx($baseImage);
        $bh = imagesy($baseImage);

        // Auto position X
        if (is_string($x)) {
            switch (strtolower($x)) {
                case 'left':
                    $x = $padding;
                    break;
                case 'center':
                    $x = (int)(($bw - $ow) / 2);
                    break;
                case 'right':
                    $x = $bw - $ow - $padding;
                    break;
                default:
                    $x = $padding;
            }
        }

        // Auto position Y
        if (is_string($y)) {
            switch (strtolower($y)) {
                case 'top':
                    $y = $padding;
                    break;
                case 'middle':
                    $y = (int)(($bh - $oh) / 2);
                    break;
                case 'bottom':
                    $y = $bh - $oh - $padding;
                    break;
                default:
                    $y = $padding;
            }
        }

        // Aktifkan transparansi
        imagealphablending($baseImage, true);
        imagesavealpha($baseImage, true);

        // Tempel overlay ke base
        imagecopy($baseImage, $overlayImg, $x, $y, 0, 0, $ow, $oh);

        return $baseImage;
    }

    public function toGDImage(string $file): GDImage|false
    {
        if (! is_file($file)) {
            return false;
        }

        $info = getimagesize($file);
        if (! $info) {
            return false;
        }

        $mime = $info['mime'];
        return match ($mime) {
            'image/jpeg' => imagecreatefromjpeg($file),
            'image/png'  => imagecreatefrompng($file),
            'image/gif'  => imagecreatefromgif($file),
            default      => false, // bisa ditambah format lain kalau perlu
        };
    }
}
