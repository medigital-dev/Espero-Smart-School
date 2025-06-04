<?php

use CodeIgniter\Model;

helper('text');

if (!function_exists('unik')) {
    /**
     * Fungsi untuk generate ID unik khusus model CI4
     * @param object $model Model
     * @param string $field pada tabel
     * @param int $lenght Jumlah Karakter (Default: 16)
     */
    function unik($model, $field, $lenght = 16)
    {
        do {
            $uniqueId = random_string('crypto', $lenght / 2) . '-' . random_string('crypto', $lenght / 2);
        } while ($model->where($field, $uniqueId)->first());
        return $uniqueId;
    }
}

if (!function_exists('uuid')) {
    function uuid(): string
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }
}

if (!function_exists('idUnik')) {
    /**
     * Helper untuk mendapatkan ID Unik
     * 
     * @param object $model Instance Of Codeigniter/Model
     * @param string $field Kolom id unique dalam database
     * @param string $type Tipe random string generator [uuid, basic, alpha, alnum, numeric, nozero, md5, sha1, and crypto]
     * @param int $length Ukuran string output
     * @return string ID Unik yang acak 
     */
    function idUnik(object $model, string $field = 'id', string $type = 'uuid', int $length = 16): string
    {
        if (!$model instanceof Model) throw new InvalidArgumentException('Parameter harus instance dari CodeIgniter\Model');
        do {
            $unique = $type == 'uuid' ? uuid() : random_string($type, $length);
        } while ($model->where($field, $unique)->first());
        return $unique;
    }
}
