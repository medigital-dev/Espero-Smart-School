<?php

use CodeIgniter\HTTP\Files\UploadedFile;

if (!function_exists('importExcel')) {
    function importExcel(UploadedFile $file)
    {
        $files = service('files')->upload($file);
        if ($files)
            $result = service('import')->excel($files['data']['path'], ['xlsx']);
        return $result;
    }
}
