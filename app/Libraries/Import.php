<?php

namespace App\Libraries;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Import
{
    public function excel(string $filePath): array
    {
        try {
            $reader = new Xlsx();

            if (!file_exists($filePath)) {
                throw new \Exception("File tidak ditemukan: $filePath");
            }

            $spreadsheet = $reader->load($filePath);
            $dataExcel = $spreadsheet->getActiveSheet()->toArray();

            if (file_exists($filePath)) {
                unlink($filePath);
            }

            return [
                'status' => true,
                'http_code' => 200,
                'status_code' => 'success',
                'message' => 'Import file excel berhasil.',
                'error' => null,
                'data' => $dataExcel,
            ];
        } catch (\Throwable $e) {
            return [
                'status' => false,
                'http_code' => 500,
                'status_code' => 'error',
                'message' => 'Gagal mengimpor file excel.',
                'error' => $e->getMessage(),
                'data' => [],
            ];
        }
    }
}
