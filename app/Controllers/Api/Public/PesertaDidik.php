<?php

namespace App\Controllers\Api\Public;

use App\Controllers\BaseController;
use App\Models\FlyerPrestasiModel;
use App\Models\PrestasiModel;
use CodeIgniter\API\ResponseTrait;
use Milon\Barcode\DNS1D;
use Picqer\Barcode\BarcodeGeneratorPNG;

class PesertaDidik extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['peserta_didik', 'string', 'files']);
    }

    public function getPd_select2()
    {
        $keyword = $this->request->getGet('key') ?? '';
        $start = (int) $this->request->getGet('page') ?: 1;
        $limit = 10;
        $offset = ($start - 1) * $limit;
        $items = cariPd($keyword, true, ['limit' => $limit + 1, 'offset' => $offset]);

        $hasMore = count($items) > $limit;
        if ($hasMore) {
            array_pop($items);
        }

        $results = array_map(function ($item) {
            $pd = getPd($item['peserta_didik_id']);
            return [
                'id' => $item['peserta_didik_id'],
                'text' => $pd['nama'],
                'nipd' => nis($item['peserta_didik_id']),
                'nisn' => $pd['nisn'],
                'kelas' => rombel($item['peserta_didik_id']),
                'nik' => $pd['nik'],
            ];
        }, $items);

        return $this->respond([
            'items' => $results,
            'hasMore' => $hasMore,
        ]);
    }

    public function setFlyer($id)
    {
        $model = new FlyerPrestasiModel();
        $nik = getPd($id, 'nik');
        if (!$nik) return $this->fail('Peserta didik tidak ditemukan.');
        $set = $this->request->getPost();
        $fotoJuara = $this->request->getFile('foto');
        $set['nik'] = $nik;
        if ($fotoJuara)
            $set['foto_id'] = upload($fotoJuara, ['jpg', 'jpeg', 'png'], 'flyer/prestasi');
        if (!$cek = $model->where('kode', $set['kode'])->first())
            $set['flyer_id'] = idUnik($model, 'flyer_id');
        else
            $set['id'] = $cek['id'];
        if (!$model->save($set)) return $this->fail('Prestasi peserta didik gagal disimpan.');
        return $this->respond($this->generatFlyer($set));
    }

    private function cleanPng(string $filePath): string
    {
        $img = imagecreatefrompng($filePath);

        // buat ulang
        $width  = imagesx($img);
        $height = imagesy($img);
        $clean  = imagecreatetruecolor($width, $height);

        // transparansi biar tetap ada
        imagealphablending($clean, false);
        imagesavealpha($clean, true);

        imagecopy($clean, $img, 0, 0, 0, 0, $width, $height);

        // overwrite file tanpa profil warna
        imagepng($clean, $filePath);

        imagedestroy($img);
        imagedestroy($clean);

        return $filePath;
    }

    private function setBarcode($text)
    {
        $d = new BarcodeGeneratorPNG();
        $barcodeData = $d->getBarcode($text['kode'], $d::TYPE_CODE_128);
        // Tentukan path simpan
        $path = WRITEPATH . 'barcode/';
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        // Simpan ke file
        file_put_contents($path . 'barcode.png', $barcodeData);
        return $path . '/barcode.png';
    }

    public function generatFlyer($data)
    {
        echo $this->setBarcode($data['kode']);
        die;
        $settings = [
            'path' => getFile($data['foto_id'], 'path'),
            'fotoX' => 300,
            'fotoY' => 183,
            'fotoW' => 480,
            'fotoH' => 480,
            'textX' => 190,   // kotak text mulai X
            'textY' => 620,   // kotak text mulai Y (atas)
            'textW' => 700,   // lebar kotak
            'textH' => 110,   // tinggi kotak
            'fontSize' => 40,
        ];

        error_reporting(E_ALL & ~E_WARNING);
        $template = imagecreatefrompng(TEMPLATES_PATH . 'flyer.png');
        error_reporting(E_ALL);

        $width = imagesx($template);
        $height = imagesy($template);
        $fotoImg = imagecreatefromstring(file_get_contents($settings['path']));
        $resize = imagecreatetruecolor($width, $height);
        $white = imagecolorallocate($resize, 35, 122, 165);
        imagefill($resize, 0, 0, $white);

        imagecopyresampled(
            $resize,
            $fotoImg,
            $settings['fotoX'],
            $settings['fotoY'],
            0,
            0,
            $settings['fotoW'],
            $settings['fotoH'],
            imagesx($fotoImg),
            imagesy($fotoImg)
        );
        imagecopy($resize, $template, 0, 0, 0, 0, $width, $height);

        // warna teks
        $yellow = imagecolorallocate($resize, 255, 240, 0);
        $black  = imagecolorallocate($resize, 0, 0, 0);

        $fontSize = $settings['fontSize'];
        $font = FCPATH . 'assets/fonts/Roboto_Condensed-ExtraBold.ttf';
        $font2 = FCPATH . 'assets/fonts/OpenSans_SemiCondensed-Bold.ttf';

        // gambar teks ke dalam kotak
        $this->drawWrappedText(
            $resize,
            $data['nama'],
            $font,
            $fontSize,
            $settings['textX'],
            $settings['textY'],
            $settings['textW'],
            $settings['textH'],
            $yellow,
            $black
        );

        $this->drawWrappedText($resize, $data['content'], $font2, 28, 110, 773, 860, 160, $yellow, true);

        // simpan ke server
        $outputDir = EXPORTS_PATH . 'flyers' . DIRECTORY_SEPARATOR . 'prestasi' . DIRECTORY_SEPARATOR;
        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        $filename = 'flyer_' . time() . '.png';
        $outputPath = $outputDir . $filename;

        imagepng($resize, $outputPath);

        imagedestroy($template);
        imagedestroy($fotoImg);
        imagedestroy($resize);

        return $outputPath;
    }

    public function drawWrappedText($image, $text, $font, $fontSize, $x, $y, $boxWidth, $boxHeight, $color, $outlineColor = null)
    {
        // bungkus teks ke dalam beberapa baris
        $words = explode(' ', $text);
        $lines = [];
        $currentLine = '';

        foreach ($words as $word) {
            $testLine = ($currentLine === '') ? $word : $currentLine . ' ' . $word;
            $box = imagettfbbox($fontSize, 0, $font, $testLine);
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

        // hitung tinggi total teks
        $lineHeight = $fontSize + 10;
        $textHeight = count($lines) * $lineHeight;

        // mulai Y agar teks rata tengah secara vertikal dalam kotak
        $yStart = $y + ($boxHeight - $textHeight) / 2 + $fontSize;

        foreach ($lines as $line) {
            $bbox = imagettfbbox($fontSize, 0, $font, $line);
            $textWidth = $bbox[2] - $bbox[0];
            $xText = $x + ($boxWidth - $textWidth) / 2;

            // outline hitam (opsional)
            if ($outlineColor) {
                for ($c1 = -1; $c1 <= 1; $c1++) {
                    for ($c2 = -1; $c2 <= 1; $c2++) {
                        imagettftext($image, $fontSize, 0, $xText + $c1, $yStart + $c2, $outlineColor, $font, $line);
                    }
                }
            }

            // isi warna utama
            imagettftext($image, $fontSize, 0, $xText, $yStart, $color, $font, $line);

            $yStart += $lineHeight;
        }
    }
}
