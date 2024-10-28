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
        $response = [];
        $dataRegistrasi = $mRegistrasi
            ->select([
                'registrasi_id as id',
                'nama',
                'nipd as nis',
                'nisn',
                'jenis_kelamin as jk',
                'tempat_lahir as tempatLahir',
                'tanggal_lahir as tanggalLahir',
                'tanggal_registrasi as tanggalRegistrasi',
                'jenis_registrasi as jenisRegistrasi'
            ])
            ->join('peserta_didik', 'peserta_didik.peserta_didik_id = registrasi_peserta_didik.peserta_didik_id', 'LEFT')
            ->orderBy('nis', 'desc')
            ->findAll();
        foreach ($dataRegistrasi as $registrasi) {
            $temp = [
                'checkbox' => '
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input dtCheckbox" type="checkbox" id="check_' . $registrasi['id'] . '" value="' . $registrasi['id'] . '">
                        <label for="check_' . $registrasi['id'] . '" class="custom-control-label"></label>
                    </div>',
                'nama' => strtoupper($registrasi['nama']),
                'nis' => $registrasi['nis'],
                'nisn' => $registrasi['nisn'],
                'jk' => $registrasi['jk'],
                'tempatLahir' => $registrasi['tempatLahir'],
                'tanggalLahir' => tanggal($registrasi['tanggalLahir']),
                'jenisRegistrasi' => $registrasi['jenisRegistrasi'],
                'tanggalRegistrasi' => tanggal($registrasi['tanggalRegistrasi']),
                'status' => ''
            ];
            array_push($response, $temp);
        }
        return $this->respond($response);
    }
}
