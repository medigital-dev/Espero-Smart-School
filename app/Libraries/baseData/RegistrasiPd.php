<?php

namespace App\Libraries\baseData;

use App\Models\RegistrasiPesertaDidikModel;

class RegistrasiPd
{
    public function nis(string $id): string|null
    {
        $model = new RegistrasiPesertaDidikModel();
        $model
            ->select([
                'registrasi_peserta_didik.peserta_didik_id',
                'tanggal_registrasi as tanggal',
                'nipd',
                'asal_sekolah',
                'ref_jenis_registrasi.ref_id as jenis_registrasi_id',
                'ref_jenis_registrasi.nama as jenis_registrasi_nama',
                'ref_jenis_registrasi.kode as jenis_registrasi_kode',
                'ref_jenis_registrasi.bg_color as jenis_registrasi_color'
            ])
            ->join('ref_jenis_registrasi', 'ref_jenis_registrasi.ref_id = registrasi_peserta_didik.jenis_registrasi', 'left')
        ;

        $result = $model->where('peserta_didik_id', $id)->first();
        return $result['nipd'] ?? null;
    }

    public function get(string|null $id = null, array|string $select = '*'): array|null
    {
        $model = new RegistrasiPesertaDidikModel();
        $model
            ->join('ref_jenis_registrasi', 'ref_jenis_registrasi.ref_id = registrasi_peserta_didik.jenis_registrasi', 'left');

        if ($select == '*')
            $model
                ->select([
                    'registrasi_peserta_didik.peserta_didik_id',
                    'tanggal_registrasi as tanggal',
                    'nipd',
                    'asal_sekolah',
                    'ref_jenis_registrasi.ref_id as jenis_registrasi_id',
                    'ref_jenis_registrasi.nama as jenis_registrasi_nama',
                    'ref_jenis_registrasi.kode as jenis_registrasi_kode',
                    'ref_jenis_registrasi.bg_color as jenis_registrasi_color'
                ])
                ->join('ref_jenis_registrasi', 'ref_jenis_registrasi.ref_id = registrasi_peserta_didik.jenis_registrasi', 'left')
            ;
        else $model->select($select);

        if (is_null($id)) return $model->findAll();
        return $model->where('peserta_didik_id', $id)->findAll();
    }
}
