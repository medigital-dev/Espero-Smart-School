<?php

namespace App\Controllers\public;

use App\Controllers\BaseController;
use App\Libraries\DataPesertaDidik;

class Homepage extends BaseController
{
    public function pesertaDidik(): string
    {
        $page = [
            'title' => 'EsperoSmartSchool - Daftar Peserta Didik',
            'page' => 'Daftar Peserta Didik',
            'breadcrumb' => ['Homepage', 'Peserta Didik'],
            'sidebar' => ['parent' => 'database', 'current' => 'data-pd',],
            'data' => [],
        ];
        return view('public/peserta-didik', $page);
    }

    public function guru(): string
    {
        $dataPdLib = new DataPesertaDidik();
        echo "<pre>";
        var_dump($dataPdLib
            // ->forPublic()
            // ->for Admin()
            // ->withAlamat()
            // ->withOrtuWali()
            ->get());
        echo "</pre>";
        die;
        $page = [
            'title' => 'EsperoSmartSchool - Daftar Guru',
            'page' => 'Daftar Guru',
            'breadcrumb' => ['Homepage', 'Guru'],
            'sidebar' => ['parent' => 'database', 'current' => 'data-guru'],
            'data' => [],
        ];
        return view('public/guru', $page);
    }

    public function prestasi()
    {
        $page = [
            'title' => 'EsperoSmartSchool - Prestasi',
            'page' => 'Daftar Prestasi SMP Negeri 2 Wonosari',
            'breadcrumb' => ['Homepage', 'Prestasi'],
            'sidebar' => ['parent' => null, 'current' => 'prestasi',],
            'data' => [],
        ];
        return view('public/prestasi', $page);
    }

    public function flyer()
    {
        helper('code');
        qrcode('http://smp2wonosari.sch.id', 'Scan Me!', 'assets/img/brands/meDigital-dev.png');
        die;
        return view('public/flyer');
    }
}
