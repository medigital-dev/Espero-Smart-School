<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Libraries\DataPesertaDidik;
use CodeIgniter\API\ResponseTrait;

class Datatables extends BaseController
{
    use ResponseTrait;

    protected $getData;

    public function __construct()
    {
        helper(['indonesia']);
        $this->getData = new DataPesertaDidik;
    }

    public function bukuIndukPd()
    {
        $result = $this->getData
            ->withAlamat(['dusun', 'desa', 'kecamatan', 'rt', 'rw'])
            ->withContact(['hp'])
            ->withOrtuWali(['ayah.nama', 'ibu.nama'])
            ->withRegistrasi(['ref_jenis_registrasi.nama as jenis_registrasi', 'tanggal_registrasi'])
            ->withRombel(['rombongan_belajar.nama as kelas'])
            ->withMutasi(['mutasi_pd.tanggal as tanggal_mutasi', 'ref_jenis_mutasi.nama as jenis_mutasi'])
            ->withFilter()
            ->forAdmin()
            ->toDataTable();

        $data = [];
        foreach ($result['data'] as $row) {
            $row['tahun_registrasi'] = $row['tanggal_registrasi'] !== '0000-00-00' ? tanggal($row['tanggal_registrasi'], 'Y') : '';
            $row['tanggal_lahir'] = tanggal($row['tanggal_lahir'], 'd/m/Y');
            $data[] = $row;
        }

        $response = [
            'draw' => intval($result['draw']),
            'recordsTotal' => $result['recordsTotal'],
            'recordsFiltered' => $result['recordsFiltered'],
            'data' => $data,
        ];

        return $this->respond($response);
    }

    public function publicPd()
    {
        $rows = $this->getData
            ->active()
            ->toDataTable();
        $data = [];
        $no = 1 + $rows['paging']['start'];
        foreach ($rows['data'] as $row) {
            $row['no'] = $no++;
            $row['tanggal_lahir'] = tanggal($row['tanggal_lahir'], 'j F Y');
            $row['nama'] = strtoupper($row['nama']);
            $row['tempat_lahir'] = ucwords(strtolower($row['tempat_lahir']));
            $data[] = $row;
        }

        $response = [
            'draw' => intval($rows['draw']),
            'recordsTotal' => $rows['recordsTotal'],
            'recordsFiltered' => $rows['recordsFiltered'],
            'data' => $data,
        ];

        return $this->respond($response);
    }
}
