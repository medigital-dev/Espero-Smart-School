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
