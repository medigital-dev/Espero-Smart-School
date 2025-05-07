<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Datatables extends BaseController
{
    use ResponseTrait;

    protected $getData;

    public function __construct()
    {
        helper(['indonesia']);
        $this->getData = service('getPesertaDidik');
    }

    public function bukuIndukPd()
    {
        $result = $this->getData
            ->withAlamat()
            ->withContact()
            ->withOrtuWali()
            ->withRegistrasi()
            ->withMutasi()
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
