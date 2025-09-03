<?php

use App\Libraries\Files;
use App\Libraries\Import;
use CodeIgniter\HTTP\Files\UploadedFile;

if (!function_exists('importExcel')) {
    /**
     * Membaca file excel dan mengubah ke dalam array
     * @param UploadedFile $file File Excel
     * @return Array Data file excel
     * @return false Jika gagal
     */
    function importExcel(UploadedFile $file): array|false
    {
        $upload = tempUpload($file);
        if (!$upload) return false;
        return (new Import())->excel($upload);
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
     * @param string $toFolder Target penyimpanan berkas yang diupload. Default: uploads
     * @param string|array $allowedExtension Extensi yang diperbolehkan. Default '*' semua file
     * @return string $return
     * @return null Jika gagal upload.
     */
    function upload(UploadedFile $file, string $toFolder = '', string|array $allowedExtension = '*', string|array $return = 'file_id'): array|string|null
    {
        $lib = new Files();
        return $lib->saveUpload($file, 'uploads/' . $toFolder, $allowedExtension, $return);
    }
}

if (!function_exists('getFile')) {
    /**
     * Helper untuk mengambil data file pada database
     * @param string|null $id Id file. Default null untuk semua file yang tersimpan
     * @return array|string $select Return variable data yang diinginkan
     */
    function getFile(string|null $id = null, array|string $select = '*')
    {
        return (new Files())->get($id, $select);
    }
}

if (!function_exists('tempUpload')) {
    /**
     * Helper untuk upload file sementara
     * File akan disimpan pada folder temporary
     * @param UploadedFile $file File upload
     * @return string Fullpath lokasi file
     * @return null Jika gagal upload
     */
    function tempUpload(UploadedFile $file): string|null
    {
        cleanFiles(TEMPORARY_PATH);
        $result = (new Files())->upload($file, 'temporary');
        return $result['data']['fullpath'] ?? null;
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

if (!function_exists('tempSrc')) {
    /**
     * Helper membuat path source dari TEMPORARY_PATH
     */
    function tempSrc($filename): string
    {
        return base_url('files/temp/' . $filename);
    }
}

if (!function_exists('uploadSrc')) {
    /**
     * Helper membuat path source dari UPLOADS_PATH
     */
    function uploadSrc($filename): string
    {
        return base_url('files/upload/' . $filename);
    }
}
