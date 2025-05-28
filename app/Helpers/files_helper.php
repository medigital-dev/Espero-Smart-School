<?php

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
