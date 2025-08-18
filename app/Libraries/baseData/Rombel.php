<?php

namespace App\Libraries\baseData;

use App\Models\RombonganBelajarModel;

class Rombel
{
    public function get(string|bool|null $id = null, array|string $select = '*'): array|null
    {
        $model = new RombonganBelajarModel();
        $model
            ->join('guru_pegawai', 'guru_pegawai.guru_pegawai_id = rombongan_belajar.ptk_id', 'left')
            ->join('semester', 'semester.kode = rombongan_belajar.semester_kode', 'left')
            ->join('ref_kurikulum', 'ref_kurikulum.ref_id = rombongan_belajar.kurikulum_id', 'left')
            ->orderBy('tingkat_pendidikan', 'ASC')
            ->orderBy('rombongan_belajar.nama', 'ASC');

        if ($select == '*')
            $model->select([
                'rombongan_belajar.rombel_id as id',
                'rombongan_belajar.nama as rombel_nama',
                'tingkat_pendidikan as tingkat',
                'guru_pegawai.nama as gtk_nama',
                'guru_pegawai.guru_pegawai_id as gtk_id',
                'semester.kode as semester_kode',
                'semester.semester_id as semester_id',
                'semester.status',
                'ref_kurikulum.nama as kurikulum_nama',
                'ref_kurikulum.kode as kurikulum_kode',
                'ref_kurikulum.id as kurikulum_id',
                'ref_kurikulum.bg_color as kurikulum_warna',
            ]);
        else $model->select($select);

        if (is_null($id))
            return $model->findAll();
        if (is_bool($id))
            return $model->where('semester.status', $id)->findAll();

        return $model->where('rombel_id', $id)->first();
    }

    public function rombelPd(string $id, bool $aktif = false): array|string|null
    {
        $model = new RombonganBelajarModel();
        $model->select('rombongan_belajar.rombel_id')
            ->join('semester', 'semester.kode = rombongan_belajar.semester_kode', 'left')
            ->join('anggota_rombongan_belajar', 'anggota_rombongan_belajar.rombel_id = rombongan_belajar.rombel_id', 'left')
            ->where('peserta_didik_id', $id)
        ;
        if ($aktif) {
            $res = $model->where('semester.status', true)->first();
            return $res ? $res['rombel_id'] : null;
        }
        return $model
            ->findAll();
    }
}
