<?php

namespace App\Libraries;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Import
{
    public function excel(string $filePath): array
    {
        $reader = new Xlsx();
        $spreadsheet = $reader->load($filePath);
        $dataExcel = $spreadsheet->getActiveSheet()->toArray('');

        return [
            'status' => true,
            'http_code' => 200,
            'status_code' => 'success',
            'message' => 'Import file excel berhasil.',
            'error' => null,
            'data' => $dataExcel,
        ];

        unlink($filePath);
    }
}
