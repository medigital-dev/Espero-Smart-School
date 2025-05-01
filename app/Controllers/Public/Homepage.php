<?php

namespace App\Controllers\public;

use App\Controllers\BaseController;
use App\Libraries\BankData;

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
        $dataLib = new BankData();
        echo "<pre>";
        var_dump($dataLib->getGtk()->get()->toArray());
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
}
