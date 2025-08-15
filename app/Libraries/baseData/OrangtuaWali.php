<?php

namespace App\Libraries\baseData;

use App\Models\OrtuWaliPdModel;

class OrangtuaWali
{
    public function get(string|null $id = null, string|array $select = '*'): array|null
    {
        $model = new OrtuWaliPdModel();
        $model
            ->join('orangtua_wali as ayah', 'ayah.orangtua_id = orangtua_wali_pd.ayah_id', 'left')
            ->join('orangtua_wali as ibu', 'ibu.orangtua_id = orangtua_wali_pd.ibu_id', 'left')
            ->join('orangtua_wali as wali', 'wali.orangtua_id = orangtua_wali_pd.wali_id', 'left')
            ->join('ref_jenis_kelamin as jk_ayah', 'jk_ayah.ref_id = ayah.jenis_kelamin', 'left')
            ->join('ref_jenis_kelamin as jk_ibu', 'jk_ibu.ref_id = ibu.jenis_kelamin', 'left')
            ->join('ref_jenis_kelamin as jk_wali', 'jk_wali.ref_id = wali.jenis_kelamin', 'left')
            ->join('ref_agama as agama_ayah', 'agama_ayah.ref_id = ayah.agama_id', 'left')
            ->join('ref_agama as agama_ibu', 'agama_ibu.ref_id = ibu.agama_id', 'left')
            ->join('ref_agama as agama_wali', 'agama_wali.ref_id = wali.agama_id', 'left')
            ->join('ref_pendidikan as pendidikan_ayah', 'pendidikan_ayah.ref_id = ayah.pendidikan_id', 'left')
            ->join('ref_pendidikan as pendidikan_ibu', 'pendidikan_ibu.ref_id = ibu.pendidikan_id', 'left')
            ->join('ref_pendidikan as pendidikan_wali', 'pendidikan_wali.ref_id = wali.pendidikan_id', 'left')
            ->join('ref_pekerjaan as pekerjaan_ayah', 'pekerjaan_ayah.ref_id = ayah.pekerjaan_id', 'left')
            ->join('ref_pekerjaan as pekerjaan_ibu', 'pekerjaan_ibu.ref_id = ibu.pekerjaan_id', 'left')
            ->join('ref_pekerjaan as pekerjaan_wali', 'pekerjaan_wali.ref_id = wali.pekerjaan_id', 'left')
            ->join('ref_penghasilan as penghasilan_ayah', 'penghasilan_ayah.ref_id = ayah.penghasilan_id', 'left')
            ->join('ref_penghasilan as penghasilan_ibu', 'penghasilan_ibu.ref_id = ibu.penghasilan_id', 'left')
            ->join('ref_penghasilan as penghasilan_wali', 'penghasilan_wali.ref_id = wali.penghasilan_id', 'left')
        ;
        if ($select == '*')
            $model
                ->select([
                    'ayah.orangtua_id as ayah_id',
                    'ayah.nama as ayah_nama',
                    'ayah.tempat_lahir as ayah_tempat_lahir',
                    'ayah.tanggal_lahir as ayah_tanggal_lahir',
                    'ayah.nik as ayah_nik',
                    'agama_ayah.nama as ayah_agama',
                    'pendidikan_ayah.nama as ayah_pendidikan',
                    'pekerjaan_ayah.nama as ayah_pekerjaan',
                    'penghasilan_ayah.nama as ayah_penghasilan',
                    'ibu.orangtua_id as ibu_id',
                    'ibu.nama as ibu_nama',
                    'ibu.tempat_lahir as ibu_tempat_lahir',
                    'ibu.tanggal_lahir as ibu_tanggal_lahir',
                    'ibu.nik as ibu_nik',
                    'agama_ibu.nama as ibu_agama',
                    'pendidikan_ibu.nama as ibu_pendidikan',
                    'pekerjaan_ibu.nama as ibu_pekerjaan',
                    'penghasilan_ibu.nama as ibu_penghasilan',
                    'wali.orangtua_id as wali_id',
                    'wali.nama as wali_nama',
                    'wali.tempat_lahir as wali_tempat_lahir',
                    'wali.tanggal_lahir as wali_tanggal_lahir',
                    'wali.nik as wali_nik',
                    'agama_wali.nama as wali_agama',
                    'pendidikan_wali.nama as wali_pendidikan',
                    'pekerjaan_wali.nama as wali_pekerjaan',
                    'penghasilan_wali.nama as wali_penghasilan',
                ]);
        else $model->select($select);

        if (is_null($id)) return $model->findAll();
        return $model->where('peserta_didik_id', $id)->first();
    }
}
