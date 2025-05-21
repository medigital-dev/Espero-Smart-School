<?php

namespace App\Libraries;

use App\Models\RefAgamaModel;
use App\Models\RefJenisMutasiModel;
use App\Models\RefJenisRegistrasiModel;
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

    public function saveAgama(string $nama, array $set = [])
    {
        $model = new RefAgamaModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $idAgama = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = unik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) return false;
            $idAgama = $set['ref_id'];
        }
        return $idAgama;
    }

    public function savePekerjaan(string $nama, array $set = [])
    {
        $model = new RefPekerjaanModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = unik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) return false;
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function savePendidikan(string $nama, array $set = [])
    {
        $model = new RefPendidikanModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = unik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) return false;
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function savePenghasilan(string $nama, array $set = [])
    {
        $model = new RefPenghasilanModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = unik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) return false;
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveTransportasi(string $nama, array $set = [])
    {
        $model = new RefTransportasiModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = unik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) return false;
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveJenisRegistrasi(string $nama, array $set = [])
    {
        $model = new RefJenisRegistrasiModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = unik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) return false;
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function getAgama(string $id = null)
    {
        $model = new RefAgamaModel();
        $model->select([
            'ref_id as id',
            'nama'
        ]);
        if ($id)
            return $model->where('ref_id', $id)->first();
        else
            return $model->findAll();
    }

    public function saveJenisMutasi(string $nama, array $set = [])
    {
        $model = new RefJenisMutasiModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = unik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) return false;
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function getJenisMutasi(string $keyword = null, array|string $output = []): array|string|false
    {
        $model = new RefJenisMutasiModel();
        $model->select(['ref_id as id', 'nama', 'warna']);
        $fields = ['id', 'nama', 'warna'];

        if ($keyword) {
            $model->where('ref_id', $keyword)->orWhere('nama', $keyword);
            $result = $model->first();
            if (!$result) return false;
            if (is_string($output)) return $result[$output] ?? false;
            else {
                $rows = [];
                foreach ($output as $row) {
                    if (in_array($row, $fields))
                        $rows[$row] = $output[$row];
                }
                return $rows;
            }
        } else {
            $rows = [];
            $result = $model->findAll();
            foreach ($result as $row) {
                if (is_string($output)) $rows[] = $row[$output] ?? false;
                else {
                    $item = [];
                    foreach ($output as $field) {
                        if (in_array($field, $fields))
                            $item[] = $row[$field];
                    }
                    $rows[] = $item;
                }
            }
            return $rows;
        }
    }
}
