<?php

namespace App\Libraries\baseData;

use App\Models\MutasiPdModel;

class MutasiPd
{
    public function get(string|null $id = null, string|array $select = '*'): array|null
    {
        $model = new MutasiPdModel();
        $model
            ->join('ref_jenis_mutasi', 'ref_jenis_mutasi.ref_id = mutasi_pd.jenis', 'left');
        if ($select == '*')
            $model->select([
                'mutasi_id as id',
                'peserta_didik_id',
                'ref_jenis_mutasi.ref_id as jenis_mutasi_id',
                'ref_jenis_mutasi.nama as jenis_mutasi_nama',
                'tanggal',
                'alasan',
                'sekolah_tujuan'
            ]);
        else $model->select($select);
        if (is_null($id)) return $model->findAll();
        return $model->where('mutasi_id', $id)->first();
    }
}
