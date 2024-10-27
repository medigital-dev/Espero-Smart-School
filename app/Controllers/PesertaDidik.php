<?php

namespace App\Controllers;

use App\Models\PesertaDidikModel;
use App\Models\RegistrasiPesertaDidikModel;
use CodeIgniter\API\ResponseTrait;

class PesertaDidik extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['string', 'indonesia']);
    }

    public function aktif(): string
    {
        $page = [
            'title' => 'SISPADU - Peserta Didik Aktif',
            'sidebar' => 'pd-aktif',
            'name' => 'Daftar Peserta Didik Aktif',
            'data' => [],
        ];
        return view('peserta_didik/aktif', $page);
    }

    public function baru(): string
    {
        $page = [
            'title' => 'SISPADU - Peserta Didik Baru',
            'sidebar' => 'pd-new',
            'name' => 'Daftar Peserta Didik Baru',
            'data' => [],
        ];
        return view('peserta_didik/baru', $page);
    }

    public function getTablePdBaru()
    {
        $mPesertaDidik = new PesertaDidikModel();
        $mRegistrasi = new RegistrasiPesertaDidikModel();
        $response = [];

        $dataPd = $mPesertaDidik->select(['peserta_didik_id as id', 'nama', 'jenis_kelamin as jk', 'tempat_lahir as tempatLahir', 'tanggal_lahir as tanggalLahir', 'nisn', 'nik', 'agama'])->orderBy('nama', 'ASC')
            ->findAll();
        foreach ($dataPd as $pd) {
            if (!$mRegistrasi->where('peserta_didik_id', $pd['id'])->first()) {
                $pd['checkbox'] = '
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input dtCheckbox" type="checkbox" id="check_' . $pd['id'] . '" value="' . $pd['id'] . '">
                        <label for="check_' . $pd['id'] . '" class="custom-control-label"></label>
                    </div>';
                $pd['tanggalLahir'] = tanggal($pd['tanggalLahir']);
                array_push($response, $pd);
            }
        }
        return $this->respond($response);
    }
}
