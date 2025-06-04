<?php

namespace App\Libraries;

use App\Models\RefAgamaModel;
use App\Models\RefJenisBeasiswaModel;
use App\Models\RefJenisKebutuhanKhususModel;
use App\Models\RefJenisKelaminModel;
use App\Models\RefJenisKesejahteraanModel;
use App\Models\RefJenisMutasiModel;
use App\Models\RefJenisRegistrasiModel;
use App\Models\RefJenisTinggalModel;
use App\Models\RefPekerjaanModel;
use App\Models\RefPendidikanModel;
use App\Models\RefPenghasilanModel;
use App\Models\RefSatuanModel;
use App\Models\RefTransportasiModel;
use InvalidArgumentException;

class Referensi
{
    protected $model;

    public function __construct()
    {
        helper('string');
    }

    private function model($typeReferensi)
    {
        switch ($typeReferensi) {
            case 'jenisMutasi':
                $this->model = new RefJenisMutasiModel();
                break;

            case 'jenisRegistrasi':
                $this->model = new RefJenisRegistrasiModel();
                break;

            case 'agama':
                $this->model = new RefAgamaModel();
                break;

            case 'jenisKelamin':
                $this->model = new RefJenisKelaminModel();
                break;

            case 'alatTransportasi':
                $this->model = new RefTransportasiModel();
                break;

            case 'pekerjaan':
                $this->model = new RefPekerjaanModel();
                break;

            case 'pendidikan':
                $this->model = new RefPendidikanModel();
                break;

            case 'penghasilan':
                $this->model = new RefPenghasilanModel();
                break;

            case 'jenisTinggal':
                $this->model = new RefJenisTinggalModel();
                break;

            case 'satuan':
                $this->model = new RefSatuanModel();
                break;

            case 'jenisBeasiswa':
                $this->model = new RefJenisBeasiswaModel();
                break;

            case 'jenisKebutuhanKhusus':
                $this->model = new RefJenisKebutuhanKhususModel();
                break;

            case 'jenisKesejahteraan':
                $this->model = new RefJenisKesejahteraanModel();
                break;

            default:
                throw new InvalidArgumentException('Parameter $typeReferensi tidak ditemukan.');
                break;
        }
    }

    public function save(string $typeReferensi, string $namaReferensi, array $set = [])
    {
        $this->model($typeReferensi);
        $cek = $this->model->where('nama', $namaReferensi)->orWhere('kode', $namaReferensi)->first();
        if ($cek) {
            $set['ref_id'] = $cek['ref_id'];
            $set['id'] = $cek['id'];
        } else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($this->model, 'ref_id');
            if (!isset($set['kode']))
                $set['kode'] = $namaReferensi;
            $set['nama'] = $namaReferensi;
        }
        if (!$this->model->save($set)) return false;
        return $set['ref_id'];
    }

    public function saveAgama(string $nama, array $set = [])
    {
        $model = new RefAgamaModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $idAgama = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
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
                $set['ref_id'] = idUnik($model, 'ref_id');
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
                $set['ref_id'] = idUnik($model, 'ref_id');
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
                $set['ref_id'] = idUnik($model, 'ref_id');
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
                $set['ref_id'] = idUnik($model, 'ref_id');
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
                $set['ref_id'] = idUnik($model, 'ref_id');
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
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) return false;
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function getJenisMutasi(string $keyword = null, array|string $output = []): array|string|false
    {
        $model = new RefJenisMutasiModel();
        $model->select(['ref_id as id', 'nama', 'kode', 'warna']);
        $fields = ['id', 'nama', 'kode', 'warna'];

        if ($keyword) {
            $model->where('ref_id', $keyword)->orWhere('nama', $keyword)->orWhere('kode', $keyword);
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

    public function get(string $typeReferensi, string $keyword = null, array|string $output = []): array|string|false
    {
        $this->model($typeReferensi);
        $this->model->select(['ref_id as id', 'nama', 'kode', 'warna']);
        $fields = ['id', 'nama', 'kode', 'warna'];

        if ($keyword) {
            $this->model->where('ref_id', $keyword)->orWhere('nama', $keyword)->orWhere('kode', $keyword);
            $result = $this->model->first();
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
            $result = $this->model->findAll();
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
