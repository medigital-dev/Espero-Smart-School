<?php

namespace App\Controllers\Api\Public;

use App\Controllers\BaseController;
use App\Libraries\ImageEditor;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class Flyer extends BaseController
{
    use ResponseTrait;

    protected $imgEditor;

    public function __construct()
    {
        helper(['files', 'code', 'text']);
        $this->imgEditor = new ImageEditor();
    }

    public function prestasi()
    {
        $nama = $this->request->getPost('nama');
        $isi = $this->request->getPost('isi');
        $foto = $this->request->getFile('foto');

        $gdCanvas = $this->imgEditor->createCanvas();
        $gdTemplate = $this->imgEditor->toGDImage(TEMPLATES_PATH . 'flyer-prestasi.png');
        $gdFoto = $this->imgEditor->toGDImage(tempUpload($foto));
        $gdFotoSm = $this->imgEditor->resize($gdFoto, 480, 480);
        $this->imgEditor->mergeImage($gdCanvas, $gdFotoSm, 'center', 183);
        $this->imgEditor->mergeImage($gdCanvas, $gdTemplate, 'center', 'middle');
        $this->imgEditor->addText($gdCanvas, 'h1', $nama, ['center', 620], [700, 110], ['color' => [255, 255, 255]]);
        $this->imgEditor->addText($gdCanvas, 'body', $isi, ['center', 780], [720, 200], ['align' => 'center', 'valign' => 'top', 'color' => [255, 240, 0]]);
        $barcode = barcode(random_string('alnum', 4), true, [255, 255, 255], true);
        $gbBarcode = $this->imgEditor->toGDImage(TEMPORARY_PATH . $barcode);
        $this->imgEditor->mergeImage($gdCanvas, $gbBarcode, 'right', 'bottom');

        // output
        $dir = TEMPORARY_PATH;
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $filename = uniqid('pres_') . '.png';
        $path = $dir . $filename;
        $this->imgEditor->saveImage($gdCanvas, $path);
        $this->imgEditor->destroy();
        return $this->respond(public_src('temp', $filename));
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
