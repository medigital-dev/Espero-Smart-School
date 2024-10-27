<?php

namespace App\Controllers;

use App\Models\RegistrasiPesertaDidikModel;
use CodeIgniter\API\ResponseTrait;

class BukuInduk extends BaseController
{
    use ResponseTrait;

    public function index(): string
    {
        // $token = 'tgRkvD7cZaYPRL3';
        // $t = 'Authorization: Bearer ' . $token;
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, 'http://10.2.0.2:5774/WebService/getGtk?npsn=20402028');
        // curl_setopt($ch, CURLOPT_HTTPHEADER, [$t]);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        // $hasil = curl_exec($ch);
        // $awal = strpos($hasil, '{');
        // $result = json_decode(substr($hasil, $awal), true);
        // echo "<pre>";
        // var_dump($result);
        // echo "</pre>";
        // die;
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
        $dataRegistrasi = $mRegistrasi
            ->select(['registrasi_id as id', 'nama', 'nipd as nis', 'nisn', 'jenis_kelamin as jk', 'tempat_lahir as tempatLahir', 'tanggal_lahir as tanggalLahir', 'tanggal_registrasi as tanggalRegistrasi', 'jenis_registrasi as jenisRegistrasi'])
            ->join('peserta_didik', 'peserta_didik.peserta_didik_id = registrasi_peserta_didik.peserta_didik_id', 'LEFT')
            ->orderBy('nis', 'desc')
            ->findAll();

        return $this->respond($dataRegistrasi);
    }
}
