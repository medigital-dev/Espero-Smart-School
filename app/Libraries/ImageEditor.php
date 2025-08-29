<?php

namespace App\Libraries;

use GdImage;

class ImageEditor
{
    /** @var GDImage[] */
    protected $gdImages = [];

    /**
     * Auto destroy GDImage
     * Default: true
     */
    protected bool $autoDestroy = true;

    /**
     * Set apakah autoDestroy aktif atau tidak
     */
    public function setAutoDestroy(bool $status): self
    {
        $this->autoDestroy = $status;
        return $this;
    }

    /**
     * Auto cleanup ketika objek hancur
     */
    public function __destruct()
    {
        if ($this->autoDestroy) {
            $this->destroy(); // otomatis destroy semua
        }
    }

    /**
     * Simpan GDImage ke file
     *
     * @param GDImage $gd
     * @param string  $filePath  Lokasi file output
     * @param string  $format    png|jpeg|jpg|gif|webp (default: png)
     * @param int     $quality   Untuk jpeg/webp (0-100), untuk png (0-9)
     */
    public function saveImage(GDImage $gd, string $filePath, string $format = 'png', int $quality = 90): bool
    {
        $format = strtolower($format);
        return match ($format) {
            'jpg', 'jpeg' => imagejpeg($gd, $filePath, max(0, min(100, $quality))),
            'png'         => imagepng($gd, $filePath, max(0, min(9, (int)($quality / 10)))),
            'gif'         => imagegif($gd, $filePath),
            'webp'        => function_exists('imagewebp') ? imagewebp($gd, $filePath, max(0, min(100, $quality))) : false,
            default       => false,
        };
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

    /**
     * Convert file gambar menjadi GDImage.
     */
    public function toGDImage(string $file): GDImage|false
    {
        if (! is_file($file)) {
            return false;
        }

        $info = @getimagesize($file);
        if (! $info) {
            return false;
        }

        $mime = $info['mime'];
        $gd = match ($mime) {
            'image/jpeg' => @imagecreatefromjpeg($file),
            'image/png'  => @imagecreatefrompng($file),
            'image/gif'  => @imagecreatefromgif($file),
            'image/webp' => function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($file) : false,
            'image/bmp'  => function_exists('imagecreatefrombmp') ? @imagecreatefrombmp($file) : false,
            default      => false,
        };

        if ($gd instanceof \GdImage) {
            $this->gdImages[] = $gd;
        }

        return $gd;
    }

    /**
     * Membuat canvas kosong dengan ukuran dan warna tertentu
     *
     * @param int|array         $size    lebar dan tinggi canvas
     * @param array|string|null $color   warna: 
     *                                   - array [R,G,B]
     *                                   - array [R,G,B,A] (A = alpha 0-127)
     *                                   - "transparent"
     *                                   - default putih
     * @return GDImage|false
     */
    public function createCanvas(int|array $size = 1080, array|string|null $color = [255, 255, 255]): GDImage|false
    { // jika input int -> persegi
        if (is_int($size)) {
            $width = $height = $size;
        } elseif (is_array($size) && count($size) === 2) {
            [$width, $height] = $size;
        } else {
            return false; // format salah
        }

        $gd = imagecreatetruecolor($width, $height);
        if (! $gd) {
            return false;
        }

        // Aktifkan alpha
        imagealphablending($gd, false);
        imagesavealpha($gd, true);

        if ($color === 'transparent') {
            // full transparent
            $bg = imagecolorallocatealpha($gd, 0, 0, 0, 127);
        } elseif (is_array($color)) {
            $r = $color[0] ?? 255;
            $g = $color[1] ?? 255;
            $b = $color[2] ?? 255;
            $a = $color[3] ?? 0; // default solid
            $bg = imagecolorallocatealpha($gd, $r, $g, $b, $a);
        } else {
            // default putih
            $bg = imagecolorallocate($gd, 255, 255, 255);
        }

        // Isi background
        imagefill($gd, 0, 0, $bg);

        // Simpan ke list
        $this->gdImages[] = $gd;

        return $gd;
    }


    /**
     * Destroy GDImage
     * - tanpa parameter → semua
     * - dengan GDImage  → hanya itu
     * - dengan index    → hanya di posisi tertentu
     */
    public function destroy(GdImage|int|null $target = null): void
    {
        if ($target === null) {
            // destroy semua
            foreach ($this->gdImages as $i => $img) {
                if ($img instanceof \GdImage) {
                    imagedestroy($img);
                }
            }
            $this->gdImages = [];
            return;
        }

        if ($target instanceof \GdImage) {
            // destroy satu GDImage
            foreach ($this->gdImages as $i => $img) {
                if ($img === $target) {
                    imagedestroy($img);
                    unset($this->gdImages[$i]);
                    break;
                }
            }
        } elseif (is_int($target) && isset($this->gdImages[$target])) {
            // destroy berdasarkan index
            $img = $this->gdImages[$target];
            if ($img instanceof \GdImage) {
                imagedestroy($img);
            }
            unset($this->gdImages[$target]);
        }

        // rapikan index array
        $this->gdImages = array_values($this->gdImages);
    }

    protected array $textStyles = [
        'h1' => [
            'font' => 'Roboto_Condensed-ExtraBold.ttf',
            'fontSize' => 40,
            'lineSpacing' => 6,
            'align' => 'center',
            'color' => [0, 0, 0],
            'padding' => 0,
        ],
        'h2' => [
            'font' => 'Roboto_Condensed-ExtraBold.ttf',
            'fontSize' => 36,
            'lineSpacing' => 6,
            'align' => 'center',
            'color' => [0, 0, 0],
            'padding' => 0,
        ],
        'body' => [
            'font' => 'OpenSans_SemiCondensed-Bold.ttf',
            'fontSize' => 32,
            'lineSpacing' => 16,
            'align' => 'left',
            'color' => [0, 0, 0],
            'padding' => 0,
        ],
    ];

    public function addText(
        GdImage $image,
        string $style,
        string $text,
        int|array|string $pos,       // [x, y] atau string (left/center/right, top/middle/bottom)
        int|array|string $box = 'auto', // [w, h] atau 'auto'
        array $overrides = []
    ): void {
        if (!isset($this->textStyles[$style])) {
            throw new \InvalidArgumentException("Style {$style} tidak terdaftar");
        }

        $opt = array_merge([
            'padding' => 0,
            'valign'  => 'middle', // default vertical alignment
        ], $this->textStyles[$style], $overrides);

        $fontFile = FCPATH . 'assets/fonts/' . $opt['font'];
        $imageWidth  = imagesx($image);
        $imageHeight = imagesy($image);

        // === Normalisasi posisi ===
        if (is_int($pos)) {
            $pos = [$pos, $pos];
        } elseif (!is_array($pos)) {
            throw new \InvalidArgumentException("Posisi harus int atau [x,y]");
        }
        [$fromX, $fromY] = $pos;

        // === Normalisasi ukuran box ===
        if ($box === 'auto') {
            $boxWidth = 'auto';
            $boxHeight = 'auto';
        } elseif (is_int($box)) {
            $boxWidth = $boxHeight = $box;
        } elseif (is_array($box)) {
            [$boxWidth, $boxHeight] = $box;
        } else {
            throw new \InvalidArgumentException("Box harus int, [w,h], atau 'auto'");
        }

        // === Box width auto ===
        if ($boxWidth === 'auto') {
            $words = explode(' ', $text);
            $maxWidth = 0;
            foreach ($words as $w) {
                $wBox = imagettfbbox($opt['fontSize'], 0, $fontFile, $w);
                $wWidth = abs($wBox[2] - $wBox[0]);
                $maxWidth = max($maxWidth, $wWidth);
            }
            $boxWidth = $maxWidth + ($opt['padding'] * 2);
        }

        // === Word wrap untuk estimasi tinggi ===
        $lines = [];
        $currentLine = '';
        foreach (explode(' ', $text) as $word) {
            $testLine = $currentLine === '' ? $word : $currentLine . ' ' . $word;
            $testBox = imagettfbbox($opt['fontSize'], 0, $fontFile, $testLine);
            $testWidth = abs($testBox[2] - $testBox[0]);

            if ($testWidth > ($boxWidth - ($opt['padding'] * 2)) && $currentLine !== '') {
                $lines[] = $currentLine;
                $currentLine = $word;
            } else {
                $currentLine = $testLine;
            }
        }
        if ($currentLine !== '') {
            $lines[] = $currentLine;
        }

        // === Box height auto ===
        if ($boxHeight === 'auto') {
            $boxHeight = count($lines) * ($opt['fontSize'] + $opt['lineSpacing']);
            $boxHeight += ($opt['padding'] * 2);
        }

        // === Horizontal pos (string center, left, right) ===
        if (is_string($fromX)) {
            if ($fromX === 'left') {
                $fromX = 0;
            } elseif ($fromX === 'center') {
                $fromX = (int)(($imageWidth - $boxWidth) / 2);
            } elseif ($fromX === 'right') {
                $fromX = $imageWidth - $boxWidth;
            } else {
                throw new \InvalidArgumentException("Posisi X tidak valid: {$fromX}");
            }
        }

        // === Vertical pos (string top, middle, bottom) ===
        if (is_string($fromY)) {
            if ($fromY === 'top') {
                $fromY = 0;
            } elseif ($fromY === 'middle') {
                $fromY = (int)(($imageHeight - $boxHeight) / 2);
            } elseif ($fromY === 'bottom') {
                $fromY = $imageHeight - $boxHeight;
            } else {
                throw new \InvalidArgumentException("Posisi Y tidak valid: {$fromY}");
            }
        }

        // Mulai menulis dari dalam box (padding + align)
        $xStart = $fromX + $opt['padding'];

        // === Vertical alignment ===
        $textTotalHeight = count($lines) * ($opt['fontSize'] + $opt['lineSpacing']);
        if ($opt['valign'] === 'top') {
            $y = $fromY + $opt['padding'] + $opt['fontSize'];
        } elseif ($opt['valign'] === 'bottom') {
            $y = $fromY + $boxHeight - $textTotalHeight + $opt['fontSize'];
        } else { // middle
            $y = $fromY + (int)(($boxHeight - $textTotalHeight) / 2) + $opt['fontSize'];
        }

        foreach ($lines as $line) {
            $lineBox = imagettfbbox($opt['fontSize'], 0, $fontFile, $line);
            $lineWidth = abs($lineBox[2] - $lineBox[0]);

            $lineX = $xStart;
            if ($opt['align'] === 'center') {
                $lineX = $fromX + (int)(($boxWidth - $lineWidth) / 2);
            } elseif ($opt['align'] === 'right') {
                $lineX = $fromX + $boxWidth - $lineWidth - $opt['padding'];
            }

            imagettftext(
                $image,
                $opt['fontSize'],
                0,
                $lineX,
                $y,
                is_array($opt['color'])
                    ? imagecolorallocate($image, $opt['color'][0], $opt['color'][1], $opt['color'][2])
                    : $opt['color'],
                $fontFile,
                $line
            );

            $y += $opt['fontSize'] + $opt['lineSpacing'];
        }
    }
}
