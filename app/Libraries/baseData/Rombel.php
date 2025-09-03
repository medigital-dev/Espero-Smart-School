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
                'ref_kurikulum.nama as kurikulum_nama',
                'ref_kurikulum.kode as kurikulum_kode',
                'ref_kurikulum.id as kurikulum_id',
                'ref_kurikulum.bg_color as kurikulum_warna',
            ]);
        else $model->select($select);

        if (is_null($id))
            return $model->findAll();
        if (is_bool($id))
            return $model->where('rombongan_belajar.status', $id)->findAll();

        return $model->where('rombel_id', $id)->first();
    }

    public function rombelPd(string $id, bool $aktif = false): array|string|null
    {
        $model = new RombonganBelajarModel();
        $model->select('rombongan_belajar.rombel_id')
            ->join('anggota_rombongan_belajar', 'anggota_rombongan_belajar.rombel_id = rombongan_belajar.rombel_id', 'left')
            ->join('semester', 'semester.kode = anggota_rombongan_belajar.semester_kode', 'left')
            ->where('peserta_didik_id', $id)
        ;
        if ($aktif) {
            $res = $model
                ->where('semester.status', true)
                ->first();
            return $res ? $res['rombel_id'] : null;
        }
        return $model
            ->findAll();
    }

    public function save(array $set = [], string|array|null $keyname = null): string|null
    {
        $model = new RombonganBelajarModel();
        $ifExist = false;
        if (is_string($keyname)) {
            $ifExist = $model->where($keyname, $set[$keyname])->first();
            if ($ifExist) {
                $set['id'] = $ifExist['id'];
                $set['rombel_id'] = $ifExist['rombel_id'];
            }
        } else if (is_array($keyname) && count($keyname) > 0) {
            $model->groupStart();
            foreach ($keyname as $key) {
                $model->where($key, $set[$key]);
            }
            $model->groupEnd();
            $ifExist = $model->first();
            if ($ifExist) {
                $set['id'] = $ifExist['id'];
                $set['rombel_id'] = $ifExist['rombel_id'];
            }
        }
        if (!isset($set['rombel_id'])) $set['rombel_id'] = idUnik($model, 'rombel_id');
        if (!$model->save($set)) return false;

        return $set['rombel_id'];
    }
}
