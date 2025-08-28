<?php

use App\Libraries\Files;
use CodeIgniter\HTTP\Files\UploadedFile;

if (!function_exists('importExcel')) {
    function importExcel(UploadedFile $file)
    {
        $upload = service('files')->upload($file, ['xlsx']);

        if (!$upload['status']) {
            return [
                'status' => false,
                'http_code' => 400,
                'status_code' => 'upload_error',
                'message' => $upload['message'],
                'error' => $upload['error'],
                'data' => [],
            ];
        }

        return service('import')->excel($upload['data']['path']);
    }
}

if (!function_exists('uploadFile')) {
    function uploadFile(UploadedFile $file, array $allowedExtension = [], string $toFolder = '')
    {
        return service('files')->upload($file, $allowedExtension, $toFolder);
    }
}

if (!function_exists('upload')) {
    /**
     * Helper untuk mengunggah berkas
     * @param UploadedFile $file Berkas yang akan diupload
     * @param string|array $allowedExtension Extensi yang diperbolehkan. Default '*' semua file
     * @param string $toFolder Target penyimpanan berkas yang diupload.
     * @return string ID file
     * @return null Jika gagal upload.
     */
    function upload(UploadedFile $file, string|array $allowedExtension = '*', string $toFolder = '/'): string|null
    {
        $lib = new Files();
        return $lib->saveUpload($file, $allowedExtension, $toFolder);
    }
}

if (!function_exists('getFile')) {
    function getFile(string|null $id, array|string $select = '*')
    {
        $lib = new Files();
        return $lib->get($id, $select);
    }
}

if (!function_exists('tempUpload')) {
    /**
     * Helper untuk upload file sementara 
     */
    function tempUpload(UploadedFile $file): string|null
    {
        cleanFiles(UPLOAD_PATH . 'temp');
        return (new Files())->upload($file, [], 'temp')['data']['path'] ?? null;
    }
}

if (! function_exists('cleanFiles')) {
    /**
     * Hapus file lama dari folder
     *
     * @param string $path   Path folder
     * @param int    $maxAge Umur maksimum file (detik), default 86400 = 1 hari
     * @param array  $skip   Daftar pola nama file yang tidak boleh dihapus
     * @return int           Jumlah file yang dihapus
     */
    function cleanFiles(string $path, int $maxAge = 86400, array $skip = []): int
    {
        if (! is_dir($path)) {
            return 0;
        }

        $deleted = 0;
        $now = time();

        foreach (glob($path . '/*') as $file) {
            if (! is_file($file)) {
                continue;
            }

            // Skip kalau cocok dengan pola
            $base = basename($file);
            $skipThis = false;
            foreach ($skip as $pattern) {
                if (fnmatch($pattern, $base)) {
                    $skipThis = true;
                    break;
                }
            }
            if ($skipThis) {
                continue;
            }

            $fileAge = $now - filemtime($file);
            if ($fileAge > $maxAge) {
                if (@unlink($file)) {
                    $deleted++;
                }
            }
        }

        return $deleted;
    }
}

if (!function_exists('public_src')) {
    /**
     * Helper untuk membuat public URL
     */

    function public_src($type, $filename)
    {
        return base_url('files/' . $type . '/' . $filename);
    }
}
