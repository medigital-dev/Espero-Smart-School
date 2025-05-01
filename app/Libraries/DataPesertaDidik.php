<?php

namespace App\Libraries;

use App\Models\GuruPegawaiModel;
use App\Models\PesertaDidikModel;

class DataPesertaDidik
{
    protected $model;

    public function __construct()
    {
        $this->model = new PesertaDidikModel();
    }

    public function allData()
    {
        $this->model = new PesertaDidikModel();
        return $this;
    }



    protected function publicData()
    {
        $this->builder =  $this->builder->select($this->publicFilter($this->model->table));
        return $this;
    }

    private function publicFilter($table)
    {
        switch ($table) {
            case 'peserta_didik':
                $selects = [
                    'peserta_didik.peserta_didik_id as id',
                    'peserta_didik.nama',
                    'peserta_didik.jenis_kelamin as jk',
                    // 'nipd as nis',
                    'nisn',
                    'peserta_didik.tanggal_lahir',
                    'peserta_didik.tempat_lahir',
                    // 'rombongan_belajar.nama as kelas',
                    // 'desa',
                    // 'dusun',
                    // 'kecamatan',
                    // 'orangtua_wali.nama as ibu_kandung'
                ];
                return $selects;
                break;

            default:
                return [];
                break;
        }
    }

    public function withFilter(array $filters = [])
    {
        foreach ($filters as $key => $value) {
            $this->builder =   $this->builder->where($key, $value);
        }
        return $this;
    }

    public function get()
    {
        $this->get = $this->builder->get();
        return $this;
    }

    public function toArray()
    {
        $rsult = $this->get->getResultArray();
        return $rsult;
    }
}
