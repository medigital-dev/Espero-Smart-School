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
            'sidebar' => ['parent' => 'database', 'current' => 'data-pd',],
            'data' => [],
        ];
        return view('public/peserta-didik', $page);
    }

    public function guru(): string
    {
        $page = [
            'title' => 'EsperoSmartSchool - Daftar Guru',
            'sidebar' => ['parent' => 'database', 'current' => 'data-guru'],
            'data' => [],
        ];
        return view('public/guru', $page);
    }

    public function prestasi()
    {
        $page = [
            'title' => 'EsperoSmartSchool - Prestasi',
            'sidebar' => ['parent' => null, 'current' => 'prestasi',],
            'data' => [],
        ];
        return view('public/prestasi', $page);
    }

    public function flyer()
    {
        $page = [
            'title' => 'EsperoSmartSchool - Flyer',
            'sidebar' => ['parent' => 'layanan', 'current' => 'flyer',],
            'data' => [],
        ];
        return view('public/flyer', $page);
    }
}
