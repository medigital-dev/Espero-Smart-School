<?php

namespace App\Libraries\baseData;

use App\Models\AlamatModel;

class Alamat
{
    public function get(string|null $nik = null, string|array $select = '*'): array|null
    {
        $model = new AlamatModel();
        $model
            ->join('ref_alat_transportasi', 'ref_alat_transportasi.ref_id = alamat_tinggal.alat_transportasi_id', 'left')
            ->join('ref_jenis_tinggal', 'ref_jenis_tinggal.ref_id = alamat_tinggal.jenis_tinggal_id', 'left')
        ;
        if ($select == '*')
            $model->select([
                'alamat_jalan',
                'rt',
                'rw',
                'dusun',
                'desa',
                'kabupaten',
                'provinsi',
                'kode_pos',
                'lintang',
                'bujur',
                'jarak_rumah as jarak',
                'waktu_tempuh',
                'ref_alat_transportasi.ref_id as transportasi_id',
                'ref_alat_transportasi.nama as transportasi_nama',
                'ref_jenis_tinggal.ref_id as jenis_tinggal_id',
                'ref_jenis_tinggal.nama as jenis_tinggal_nama'
            ]);
        else $model->select($select);

        if (is_null($nik)) return $model->findAll();
        return $model->where('nik', $nik)->first();
    }
}
