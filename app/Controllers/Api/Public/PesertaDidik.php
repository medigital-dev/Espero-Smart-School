<?php

namespace App\Controllers\Api\Public;

use App\Controllers\BaseController;
use App\Libraries\ImageEditor;
use App\Models\FlyerPrestasiModel;
use CodeIgniter\API\ResponseTrait;

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
        return $this->respond($this->generateFlyer($set));
    }

    // private function cleanPng(string $filePath): string
    // {
    //     $img = imagecreatefrompng($filePath);

    //     // buat ulang
    //     $width  = imagesx($img);
    //     $height = imagesy($img);
    //     $clean  = imagecreatetruecolor($width, $height);

    //     // transparansi biar tetap ada
    //     imagealphablending($clean, false);
    //     imagesavealpha($clean, true);

    //     imagecopy($clean, $img, 0, 0, 0, 0, $width, $height);

    //     // overwrite file tanpa profil warna
    //     imagepng($clean, $filePath);

    //     imagedestroy($img);
    //     imagedestroy($clean);

    //     return $filePath;
    // }

    // private function attachBarcodeToFlyer(string $flyerPath, string $barcodeText)
    // {
    //     $d = new \Picqer\Barcode\BarcodeGeneratorPNG();
    //     $barcodeData = $d->getBarcode($barcodeText, $d::TYPE_CODE_128, 2, 20);
    //     $barcodeImg  = imagecreatefromstring($barcodeData);

    //     // Tambahkan teks
    //     $fontSize   = 3;
    //     $textHeight = imagefontheight($fontSize) + 5;
    //     $barcodeW   = imagesx($barcodeImg);
    //     $barcodeH   = imagesy($barcodeImg);

    //     $withText = imagecreatetruecolor($barcodeW, $barcodeH + $textHeight);
    //     $white = imagecolorallocate($withText, 255, 255, 255);
    //     $black = imagecolorallocate($withText, 0, 0, 0);
    //     imagefill($withText, 0, 0, $white);
    //     imagecopy($withText, $barcodeImg, 0, 0, 0, 0, $barcodeW, $barcodeH);

    //     $textWidth = imagefontwidth($fontSize) * strlen($barcodeText);
    //     $x = ($barcodeW - $textWidth) / 2;
    //     $y = $barcodeH + 2;
    //     imagestring($withText, $fontSize, $x, $y, $barcodeText, $black);

    //     // ==== Tambahkan padding di sekitar barcode ====
    //     $paddingInside = 6; // padding internal (px)
    //     $finalW = $barcodeW + ($paddingInside * 2);
    //     $finalH = $barcodeH + $textHeight + ($paddingInside * 2);

    //     $barcodeFinal = imagecreatetruecolor($finalW, $finalH);
    //     imagefill($barcodeFinal, 0, 0, $white);
    //     imagecopy($barcodeFinal, $withText, $paddingInside, $paddingInside, 0, 0, $barcodeW, $barcodeH + $textHeight);

    //     // === Load flyer ===
    //     $flyer = imagecreatefrompng($flyerPath);
    //     $flyerW = imagesx($flyer);
    //     $flyerH = imagesy($flyer);

    //     // Posisi kanan bawah dengan jarak dari tepi flyer
    //     $paddingOutside = 10;
    //     $dstX = $flyerW - $finalW - $paddingOutside;
    //     $dstY = $flyerH - $finalH - $paddingOutside;

    //     // Tempelkan
    //     imagecopy($flyer, $barcodeFinal, $dstX, $dstY, 0, 0, $finalW, $finalH);

    //     // Simpan hasil
    //     $output = WRITEPATH . 'flyers/flyer_with_barcode.png';
    //     if (!is_dir(dirname($output))) {
    //         mkdir(dirname($output), 0777, true);
    //     }
    //     imagepng($flyer, $output);

    //     // Bersihkan memory
    //     imagedestroy($flyer);
    //     imagedestroy($barcodeImg);
    //     imagedestroy($withText);
    //     imagedestroy($barcodeFinal);

    //     return $output;
    // }

    public function generateFlyer($data)
    {
        $imgEditor = new ImageEditor();

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

        $width =
            $height = 1080;
        $fotoImg = imagecreatefromstring(file_get_contents($settings['path']));
        $resize = imagecreatetruecolor($width, $height);
        $bgColor = imagecolorallocate($resize, 35, 122, 165);
        imagefill($resize, 0, 0, $bgColor);

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

        $imgEditor->addTitleText(
            $resize,
            $data['nama'],
            $settings['textX'],
            $settings['textY'],
            $settings['textW'],
            $settings['textH'],
        );

        $imgEditor->addBodyText(
            $resize,
            $data['content'],
            110,
            773,
            860,
            160,
            [255, 240, 0]
        );

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
}
