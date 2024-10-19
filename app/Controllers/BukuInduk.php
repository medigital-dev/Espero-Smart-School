<?php

namespace App\Controllers;

class BukuInduk extends BaseController
{
    public function index(): string
    {
        $token = 'tgRkvD7cZaYPRL3';
        $t = 'Authorization: Bearer ' . $token;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://10.2.0.2:5774/WebService/getSekolah?npsn=20402028');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [$t]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $hasil = curl_exec($ch);
        $awal = strpos($hasil, '{');
        $result = json_decode(substr($hasil, $awal), true);
        echo "<pre>";
        var_dump($result);
        echo "</pre>";
        die;
        $page = [
            'title' => 'SISPADU - Buku Induk',
            'sidebar' => 'buku-induk',
            'name' => 'Buku Induk Peserta Didik Aktif',
            'data' => [],
        ];
        return view('buku_induk/index', $page);
    }

    public function getTable()
    {
        // ambil dari registrasi
    }
}
