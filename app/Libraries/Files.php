<?php

namespace App\Libraries;

use App\Models\FilesModel;
use CodeIgniter\HTTP\Files\UploadedFile;

class Files
{
    /**
     * Library unggah berkas
     * @param UploadedFile $file Berkas yang diupload
     * @param array $allowedExtension ekstensi yang diizinkan untuk diupload (default [] => semua diperbolehkan)
     * @param string $toFolder Lokasi penyimpanan, default di UPLOAD_PATH
     * @return array status dan pesan
     */
    public function upload(UploadedFile $file, string $toFolder = '', array $allowedExtension = []): array
    {
        if (!$file->isValid()) {
            return ['status' => false, 'message' => 'Upload Error.', 'error' => $file->getError(), 'data' => []];
        }

        if (!empty($allowedExtension) && !in_array($file->getExtension(), $allowedExtension)) {
            return ['status' => false, 'message' => 'Upload Error.', 'error' => 'Format file tidak sesuai. [' . implode(', ', $allowedExtension) . ']', 'data' => []];
        }

        $folder = WRITEPATH . $toFolder;
        if (!is_dir($folder)) {
            if (!mkdir($folder, 0777, true) && !is_dir($folder)) {
                return ['status' => false, 'message' => 'Upload Error', 'error' => 'Gagal membuat folder penyimpanan.', 'data' => []];
            }
        }

        $newName = $file->getRandomName();
        $set = [
            'clientname' => $file->getClientName(),
            'filename' => $newName,
            'path' => $toFolder,
            'fullpath' => $folder . DIRECTORY_SEPARATOR . $newName,
            'type' => $file->getMimeType(),
            'extension' => $file->getExtension(),
            'size' => $file->getSize(),
        ];

        if (!$file->move($folder, $newName)) {
            return ['status' => false, 'message' => 'Upload Error.', 'error' => 'Gagal memindahkan file.', 'data' => []];
        }

        return ['status' => true, 'message' => 'Upload Berhasil.', 'error' => null, 'data' => $set];
    }

    public function saveUpload(UploadedFile $file, string $toFolder = '', array|string $allowedExtension = '*', array|string $return = 'file_id'): array|string|null
    {
        if ($allowedExtension == '*')
            $allowedExtension = [];

        $data = $this->upload($file, $toFolder, $allowedExtension);
        if (!$data['status']) return null;

        helper('string');
        $model = new FilesModel();
        $set = $data['data'];
        $set['file_id'] = idUnik($model, 'file_id');
        if (!$model->save($set)) return null;
        if (is_string($return))
            return $set[$return];
        else if (is_array($return)) {
            $send = [];
            foreach ($return as $key) {
                $send[$key] = $set[$key];
            }
            return $send;
        }
        return true;
    }

    public function get(string|null $id = null, array|string $select = '*'): array|string|null
    {
        $model = new FilesModel();
        if ($select == '*')
            $model
                ->select(['file_id as id', 'clientname', 'filename', 'extension', 'path', 'size', 'type']);
        else $model->select($select);
        if (is_null($id)) $result = $model->findAll();
        else $result = $model->where('file_id', $id)
            ->first();

        if ($select !== '*') {
            if (is_string($select)) {
                // kalau single string → kembalikan langsung value
                if (is_array($result)) {
                    if (array_is_list($result)) {
                        // banyak row
                        return array_map(fn($row) => $row[$select] ?? null, $result);
                    } else {
                        // single row
                        return $result[$select] ?? null;
                    }
                }
            } elseif (is_array($select)) {
                // kalau array → hanya ambil field itu saja
                if (is_array($result)) {
                    if (array_is_list($result)) {
                        // banyak row
                        return array_map(fn($row) => array_intersect_key($row, array_flip($select)), $result);
                    } else {
                        // single row
                        return array_intersect_key($result, array_flip($select));
                    }
                }
            }
        }
        return $result;
    }
}
