<?php

namespace App\Controllers;

class Url extends BaseController
{
    public function file_src($path, $filename)
    {
        if (!$path || !$filename) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Parameter tidak lengkap");
        }

        switch ($path) {
            case 'temp':
                $type = TEMPORARY_PATH;
                break;

            case 'export':
                $type = EXPORTS_PATH;
                break;

            case 'upload':
                $type = UPLOAD_PATH;
                break;

            case 'cache':
                $type = CACHES_PATH;
                break;

            case 'template':
                $type = TEMPLATES_PATH;
                break;

            default:
                $type = "";
                break;
        }

        $path = $type . $filename;

        if (!is_file($path)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("File tidak ditemukan");
        }

        // kembalikan file sebagai download
        return $this->response->download($path, null)->setFileName($filename);
    }
}
