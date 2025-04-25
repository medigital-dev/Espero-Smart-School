<?php

namespace App\Libraries;

use CodeIgniter\HTTP\Files\UploadedFile;

class Files
{
    /**
     * Library unggah berkas
     * @param UploadedFile $file Berkas yang diupload
     * @param array $allowedExtension ekstensi yang diizinkan untuk diupload (default [] => semua diperbolehkan)
     * @param string $toFolder Lokasi penyimpanan, default di "assets/files/uploads/", isi string untuk membuat folder baru di "assets/files/uploads/"
     * @return array status dan pesan
     */
    public function upload(UploadedFile $file, array $allowedExtension = [], string $toFolder = ''): array
    {
        if (!$file->isValid()) {
            return ['status' => false, 'message' => 'Upload Error.', 'error' => $file->getError(), 'data' => []];
        }

        if (!empty($allowedExtension) && !in_array($file->getExtension(), $allowedExtension)) {
            return ['status' => false, 'message' => 'Upload Error.', 'error' => 'Format file tidak sesuai. [' . implode(', ', $allowedExtension) . ']', 'data' => []];
        }

        $folder = 'uploads/' . trim($toFolder, '/');
        if (!is_dir($folder)) {
            if (!mkdir($folder, 0777, true) && !is_dir($folder)) {
                return ['status' => false, 'message' => 'Upload Error', 'error' => 'Gagal membuat folder penyimpanan.', 'data' => []];
            }
        }

        $newName = $file->getRandomName();
        $set = [
            'clientname' => $file->getClientName(),
            'filename' => $newName,
            'path' => $folder . '/' . $newName,
            'type' => $file->getMimeType(),
            'extension' => $file->getExtension(),
            'size' => $file->getSize(),
        ];

        if (!$file->move($folder, $newName)) {
            return ['status' => false, 'message' => 'Upload Error.', 'error' => 'Gagal memindahkan file.', 'data' => []];
        }

        return ['status' => true, 'message' => 'Upload Berhasil.', 'error' => null, 'data' => $set];
    }
}
