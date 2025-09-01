<?php

namespace App\Controllers\Api\Public;

use App\Controllers\BaseController;
use App\Libraries\ImageEditor;
use App\Models\FlyerDukaModel;
use App\Models\FlyerPrestasiModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class Flyer extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['files', 'code', 'string', 'peserta_didik']);
    }

    public function info()
    {
        $editor = new ImageEditor();
        $model = new FlyerDukaModel();

        $set = $this->request->getPost();
        if (!isset($set['kode']) || $set['kode'] == '') {
            $set['kode'] = idUnik($model, 'kode', 'crypto', 6);
            $set['flyer_id'] = idUnik($model, 'flyer_id');
        } else {
            $cFlyer = $model->where('kode', $set['kode'])->first();
            if ($cFlyer) $set['id'] = $cFlyer['id'];
        }
        if (!$model->save($set)) return $this->fail('Flyer informasi gagal disimpan.');

        $gdCanvas = $editor->createCanvas();
        $gdTemplate = $editor->toGDImage(TEMPLATES_PATH . 'flyer-info.png');
        $editor->mergeImage($gdCanvas, $gdTemplate, 'center', 'middle');
        $editor->addText($gdCanvas, 'h1', $set['judul'], ['center', 200], [900, 72], ['color' => [255, 240, 0], 'fontSize' => 48]);
        $editor->addText($gdCanvas, 'body', $set['konten'], ['center', 320], [900, 'auto'], ['color' => [255, 240, 0], 'fontSize' => 32, 'lineSpacing' => 24, 'align' => 'center']);
        // Barcode
        $barcode = barcode($set['kode'], true, [255, 255, 255], true);
        $gdBarcode = $editor->toGDImage(TEMPORARY_PATH . $barcode);
        $editor->mergeImage($gdCanvas, $gdBarcode, 'right', 'bottom');
        // output
        $dir = TEMPORARY_PATH;
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $filename = uniqid('info_') . '.png';
        $path = $dir . $filename;
        $editor->saveImage($gdCanvas, $path);
        $editor->destroy();
        return $this->respond([
            'kode' => $set['kode'],
            'src' => tempSrc($filename)
        ]);
    }

    public function duka()
    {
        $editor = new ImageEditor();
        $model = new FlyerDukaModel();

        $set = $this->request->getPost();
        $foto = $this->request->getFile('foto');
        $upload = upload($foto, 'foto/flyer/duka', ['jpg', 'jpeg', 'png'], ['file_id', 'fullpath']);
        if ($upload) $set['file_id'] = $upload['file_id'];
        if (!isset($set['kode']) || $set['kode'] == '') {
            $set['kode'] = idUnik($model, 'kode', 'crypto', 6);
            $set['flyer_id'] = idUnik($model, 'flyer_id');
        } else {
            $cFlyer = $model->where('kode', $set['kode'])->first();
            if ($cFlyer) $set['id'] = $cFlyer['id'];
        }
        if (!$model->save($set)) return $this->fail('Flyer duka cita gagal disimpan.');

        $gdCanvas = $editor->createCanvas();
        $gdTemplate = $editor->toGDImage(TEMPLATES_PATH . 'flyer-duka.png');
        $gdFoto = $editor->toGDImage(WRITEPATH . $upload['fullpath']);
        $gdFoto = $editor->resize($gdFoto, 315, 315);
        $editor->mergeImage($gdCanvas, $gdFoto, 'center', 355);
        $editor->mergeImage($gdCanvas, $gdTemplate, 'center', 'middle');
        $editor->addText($gdCanvas, 'h1', $set['nama'], ['center', 730], [720, 72], ['color' => [255, 240, 0]]);
        $editor->addText($gdCanvas, 'body', $set['keterangan'], ['center', 800], [720, 'auto'], ['color' => [255, 240, 0], 'fontSize' => 16, 'align' => 'center']);
        // Barcode
        $barcode = barcode($set['kode'], true, [255, 255, 255], true);
        $gdBarcode = $editor->toGDImage(TEMPORARY_PATH . $barcode);
        $editor->mergeImage($gdCanvas, $gdBarcode, 'right', 'bottom');
        // output
        $dir = TEMPORARY_PATH;
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $filename = uniqid('duka_') . '.png';
        $path = $dir . $filename;
        $editor->saveImage($gdCanvas, $path);
        $editor->destroy();
        return $this->respond([
            'kode' => $set['kode'],
            'src' => tempSrc($filename)
        ]);
    }

    public function prestasi()
    {
        $editor = new ImageEditor();
        $model = new FlyerPrestasiModel();
        $target = $this->request->getPost('target');
        $idTarget = $this->request->getPost('idTarget');
        $kode = $this->request->getPost('kode');
        $isi = $this->request->getPost('isi');
        $foto = $this->request->getFile('foto');
        $upload = upload($foto, 'foto/flyer/prestasi', ['jpg', 'jpeg', 'png'], ['file_id', 'filename', 'path']);
        if ($target == 'pd') {
            $pd = getPd($idTarget, ['nik', 'peserta_didik.nama']);
            $nama = $pd['nama'] . ' - ' . rombel($idTarget);
            $nik = $pd['nik'];
        } else if ($target == 'custom') {
            $nama = $idTarget;
            $nik = '';
        }

        $set = [
            'nik' => $nik,
            'nama' => $nama,
            'content' => $isi,
            'kode' => $kode,
            'foto_id' => $upload['file_id'],
        ];

        $unique = idUnik($model, 'flyer_id');
        if (!$kode || $kode == '') {
            $set['kode'] = idUnik($model, 'kode', 'crypto', 6);
            $set['flyer_id'] = $unique;
        } else {
            $exist = $model->where('kode', $kode)->first();
            if ($exist) $set['id'] = $exist['id'];
            else $set['flyer_id'] = $unique;
        }
        if (!$model->save($set)) return $this->fail('Flyer prestasi gagal disimpan.');

        $gdCanvas = $editor->createCanvas();
        $gdTemplate = $editor->toGDImage(TEMPLATES_PATH . 'flyer-prestasi.png');
        $gdFoto = $editor->toGDImage(WRITEPATH . $upload['path'] . DIRECTORY_SEPARATOR . $upload['filename']);
        $gdFotoSm = $editor->resize($gdFoto, 480, 480);
        $editor->mergeImage($gdCanvas, $gdFotoSm, 'center', 183);
        $editor->mergeImage($gdCanvas, $gdTemplate, 'center', 'middle');
        $editor->addText($gdCanvas, 'h1', $nama, ['center', 620], [700, 110], ['color' => [255, 255, 255]]);
        $editor->addText($gdCanvas, 'body', $isi, ['center', 780], [720, 200], ['align' => 'center', 'valign' => 'top', 'color' => [255, 240, 0]]);
        $barcode = barcode($set['kode'], true, [255, 255, 255], true);
        $gbBarcode = $editor->toGDImage(TEMPORARY_PATH . $barcode);
        $editor->mergeImage($gdCanvas, $gbBarcode, 'right', 'bottom');

        // output
        $dir = TEMPORARY_PATH;
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $filename = uniqid('pres_') . '.png';
        $path = $dir . $filename;
        $editor->saveImage($gdCanvas, $path);
        $editor->destroy();
        return $this->respond([
            'kode' => $set['kode'],
            'src' => tempSrc($filename)
        ]);
    }

    public function generate(): ResponseInterface
    {
        $imgEditor = new ImageEditor();
        $config = [
            'template' => TEMPLATES_PATH . 'flyer.png',
            'foto' => [
                'fromX' => 300,
                'fromY' => 183,
                'width' => 480,
                'height' => 480,
            ],
            'nama' => [
                'fromX' => 190,
                'fromY' => 620,
                'width' => 700,
                'height' => 110,
            ],
            'isi' => [
                'fromX' => 110,
                'fromY' => 773,
                'width' => 860,
                'height' => 160,
            ],
            'output' => [
                'width' => 1080,
                'height' => 1080,
                'bg-color' => [35, 122, 165],
            ]
        ];

        $nama = $this->request->getPost('nama');
        $isi = $this->request->getPost('isi');
        $foto = $this->request->getFile('foto');

        error_reporting(E_ALL & ~E_WARNING);
        $template = imagecreatefrompng($config['template']);
        error_reporting(E_ALL);

        $fotoImg = imagecreatefromstring(file_get_contents(tempUpload($foto)));

        $outputImg = imagecreatetruecolor($config['output']['width'], $config['output']['height']);
        $bgColor = imagecolorallocate($outputImg, $config['output']['bg-color'][0], $config['output']['bg-color'][1], $config['output']['bg-color'][2]);
        imagefill($outputImg, 0, 0, $bgColor);
        imagecopyresampled(
            $outputImg,
            $fotoImg,
            $config['foto']['fromX'],
            $config['foto']['fromY'],
            0,
            0,
            $config['foto']['width'],
            $config['foto']['height'],
            imagesx($fotoImg),
            imagesy($fotoImg)
        );
        imagecopy($outputImg, $template, 0, 0, 0, 0, $config['output']['width'], $config['output']['height']);
        $imgEditor->addTitleText(
            $outputImg,
            $nama,
            $config['nama']['fromX'],
            $config['nama']['fromY'],
            $config['nama']['width'],
            $config['nama']['height']
        );
        $imgEditor->addBodyText(
            $outputImg,
            $isi,
            $config['isi']['fromX'],
            $config['isi']['fromY'],
            $config['isi']['width'],
            $config['isi']['height'],
            [255, 240, 0],
            [0, 0, 0]
        );

        cleanFiles(TEMPORARY_PATH);
        $outputDir = TEMPORARY_PATH;
        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        $filename = 'flyer_' . time() . '.png';
        $outputPath = $outputDir . $filename;

        imagepng($outputImg, $outputPath);
        imagedestroy($template);
        imagedestroy($fotoImg);
        imagedestroy($outputImg);

        return $this->respond(public_src('temp', $filename));
    }
}
