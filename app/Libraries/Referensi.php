<?php

namespace App\Libraries;

use App\Models\RefAgamaModel;
use App\Models\RefPekerjaanModel;
use App\Models\RefPendidikanModel;
use App\Models\RefPenghasilanModel;
use App\Models\RefTransportasiModel;

class Referensi
{
    public function __construct()
    {
        helper('string');
    }

    public function saveAgama(string $nama)
    {
        $model = new RefAgamaModel();
        $cAgama = $model->where('nama', $nama)->first();
        if ($cAgama) $idAgama = $cAgama['ref_id'];
        else {
            $setAgama['ref_id'] = unik($model, 'ref_id');
            $setAgama['nama'] = $nama;
            if (!$model->save($setAgama)) return false;
            $idAgama = $setAgama['ref_id'];
        }
        return $idAgama;
    }

    public function savePekerjaan(string $nama)
    {
        $model = new RefPekerjaanModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            $set = [
                'ref_id' => unik($model, 'ref_id'),
                'nama' => $nama,
            ];
            if (!$model->save($set)) return false;
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function savePendidikan(string $nama)
    {
        $model = new RefPendidikanModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            $set = [
                'ref_id' => unik($model, 'ref_id'),
                'nama' => $nama,
            ];
            if (!$model->save($set)) return false;
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function savePenghasilan(string $nama)
    {
        $model = new RefPenghasilanModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            $set = [
                'ref_id' => unik($model, 'ref_id'),
                'nama' => $nama,
            ];
            if (!$model->save($set)) return false;
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveTransportasi(string $nama)
    {
        $model = new RefTransportasiModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            $set = [
                'ref_id' => unik($model, 'ref_id'),
                'nama' => $nama,
            ];
            if (!$model->save($set)) return false;
            $id = $set['ref_id'];
        }
        return $id;
    }
}
