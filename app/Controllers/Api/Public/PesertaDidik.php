<?php

namespace App\Controllers\Api\Public;

use App\Controllers\BaseController;
use App\Models\PrestasiModel;
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

    public function setPrestasi($id)
    {
        $model = new PrestasiModel();
        $nik = getPd($id, 'nik');
        if (!$nik) return $this->fail('Peserta didik tidak ditemukan.');
        $set = $this->request->getPost();
        $set['tahun'] = date('Y');
        $set['nik'] = $nik;
        $set['prestasi_id'] = idUnik($model, 'prestasi_id');
        $set['kode'] = date('ymd') . idUnik($model, 'kode', 'alnum', 4);

        $fotoJuara = $this->request->getFile('foto');
        $fotoPiagam = $this->request->getFile('piagam');
        if ($fotoJuara)
            $set['foto_id'] = upload($fotoJuara, ['jpg', 'jpeg', 'png'], 'peserta-didik/juara');
        if ($fotoPiagam)
            $set['piagam_id'] = upload($fotoPiagam, ['jpg', 'png', 'jpeg'], 'peserta-didik/piagam');

        if (!$model->save($set)) return $this->fail('Prestasi peserta didik gagal disimpan.');
        return $this->respond($this->generatFlyer($id, $set['foto_id']));
    }

    function cleanPng(string $filePath): string
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

    public function generatFlyer($idPd, $idFile)
    {
        $settings = [
            'path' => getFile($idFile, 'path'),
            'fotoX' => 300,
            'fotoY' => 236,
            'fotoW' => 480,
            'fotoH' => 480,
            'textX' => 150,
            'textY' => 600,
            'fontSize' => 28,
        ];
        $pd = getPd($idPd, 'peserta_didik.nama');
        $kelas = rombel($idPd);
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


        // simpan ke server
        $outputDir = EXPORTS_PATH . 'flyers' . DIRECTORY_SEPARATOR;
        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        $filename = 'flyer_' . time() . '.png';
        $outputPath = $outputDir . $filename;

        imagepng($resize, $outputPath);

        // bersihkan
        imagedestroy($template);
        imagedestroy($fotoImg);
        imagedestroy($resize);
        return $outputDir;
    }
}
