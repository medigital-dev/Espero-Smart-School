<?php

namespace App\Libraries;

use GdImage;

class Flyer
{
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
     * @param array      $fontColor    Warna teks [R, G, B]
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
        int $fontSize = 40,
        array $fontColor = [0, 0, 0],
        ?array $outlineColor = null,
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

        // bungkus teks jadi beberapa baris
        // $words = explode(' ', $text);
        // $lines = [];
        // $currentLine = '';

        // foreach ($words as $word) {
        //     $testLine = ($currentLine === '') ? $word : $currentLine . ' ' . $word;
        //     $box = imagettfbbox($fontSize, 0, $font, $testLine);
        //     $lineWidth = $box[2] - $box[0];

        //     if ($lineWidth > $boxWidth && $currentLine !== '') {
        //         $lines[] = $currentLine;
        //         $currentLine = $word;
        //     } else {
        //         $currentLine = $testLine;
        //     }
        // }
        // if ($currentLine !== '') {
        //     $lines[] = $currentLine;
        // }

        // // tinggi total teks
        // $lineHeight = (int) ($fontSize * 1.2);
        // $textHeight = count($lines) * $lineHeight;

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
     * @param array      $fontColor    Warna teks [R, G, B]
     * @param array|null $outlineColor Warna outline [R, G, B] atau null
     * @param string     $fontFile     Path ke file TTF (default: OpenSans)
     * @return void
     */
    public function addBodyText(
        GdImage $image,
        string $text,
        int $fromX,
        int $fromY,
        int $boxWidth = 600,
        int $boxHeight = 100,
        int $fontSize = 38,
        array $fontColor = [0, 0, 0],
        ?array $outlineColor = null,
        string $fontFile = ''
    ): void {
        // fallback font
        if (empty($fontFile)) {
            $fontFile = FCPATH . 'assets/fonts/OpenSans_SemiCondensed-Bold.ttf';
        }

        if (!file_exists($fontFile)) {
            throw new \RuntimeException("Font file tidak ditemukan: {$fontFile}");
        }

        $color = imagecolorallocate($image, $fontColor[0], $fontColor[1], $fontColor[2]);

        // bungkus teks jadi beberapa baris
        $words = explode(' ', $text);
        $lines = [];
        $currentLine = '';

        foreach ($words as $word) {
            $testLine = ($currentLine === '') ? $word : $currentLine . ' ' . $word;
            $box = imagettfbbox($fontSize, 0, $fontFile, $testLine);
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

        // tinggi total teks
        $lineHeight = (int) ($fontSize * 1.2);
        $textHeight = count($lines) * $lineHeight;

        // posisi Y awal agar teks rata tengah vertikal
        $yStart = $fromY + (int) (($boxHeight - $textHeight) / 2) + $fontSize;

        foreach ($lines as $line) {
            $bbox = imagettfbbox($fontSize, 0, $fontFile, $line);
            $textWidth = $bbox[2] - $bbox[0];
            $xText = $fromX + (int) (($boxWidth - $textWidth) / 2);

            // outline jika ada
            if ($outlineColor) {
                $outline = imagecolorallocate($image, $outlineColor[0], $outlineColor[1], $outlineColor[2]);
                for ($c1 = -1; $c1 <= 1; $c1++) {
                    for ($c2 = -1; $c2 <= 1; $c2++) {
                        imagettftext($image, $fontSize, 0, $xText + $c1, $yStart + $c2, $outline, $fontFile, $line);
                    }
                }
            }

            // teks utama
            imagettftext($image, $fontSize, 0, $xText, $yStart, $color, $fontFile, $line);

            $yStart += $lineHeight;
        }
    }
}
