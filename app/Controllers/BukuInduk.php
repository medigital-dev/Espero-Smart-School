<?php

namespace App\Controllers;

use App\Models\RegistrasiPesertaDidikModel;
use CodeIgniter\API\ResponseTrait;

class BukuInduk extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['indonesia']);
    }

    public function index(): string
    {
        $page = [
            'title' => 'SISPADU - Buku Induk',
            'sidebar' => 'buku-induk',
            'name' => 'Buku Induk Peserta Didik',
            'data' => [],
        ];
        return view('buku_induk/index', $page);
    }

    public function getTable()
    {
        $mRegistrasi = new RegistrasiPesertaDidikModel();
        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $searchValue = $this->request->getPost('search')['value'];
        $filter = [];

        $totalRecord = $mRegistrasi->countAllResults();

        $query = $mRegistrasi
            ->join('peserta_didik', 'peserta_didik.peserta_didik_id = registrasi_peserta_didik.peserta_didik_id', 'LEFT')
            ->like('nama', $searchValue)
            ->orLike('nipd', $searchValue)
            ->orLike('nisn', $searchValue);

        $totalFilteredData = $query->countAllResults(false);
        $filteredData = $query->orderBy('nama', 'asc')->findAll($length, $start);

        $data = array_map(function ($row) {
            return [
                'checkbox' => '
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input dtCheckbox" type="checkbox" id="check_' . $row['peserta_didik_id'] . '" value="' . $row['peserta_didik_id'] . '">
                    <label for="check_' . $row['peserta_didik_id'] . '" class="custom-control-label"></label>
                </div>',
                'nama' => '<a type="button" href="#">' . strtoupper($row['nama']) . '</a>',
                'nis' => $row['nipd'],
                'nisn' => $row['nisn'],
                'jk' => $row['jenis_kelamin'],
                'tempatLahir' => $row['tempat_lahir'],
                'tanggalLahir' => tanggal($row['tanggal_lahir']),
                'jenisRegistrasi' => $row['jenis_registrasi'],
                'tanggalRegistrasi' => tanggal($row['tanggal_registrasi']),
                'status' => ''
            ];
        }, $filteredData);

        $response = [
            'draw' => intval($draw),
            'recordsTotal' => $totalRecord,
            'recordsFiltered' => $totalFilteredData,
            'data' => $data,
        ];

        return $this->respond($response);
    }
}
