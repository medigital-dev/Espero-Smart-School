<?php

namespace App\Controllers;

class PesertaDidik extends BaseController
{
    public function index(): string
    {
        $page = [
            'title' => 'SISPADU - Peserta Didik Aktif',
            'sidebar' => 'peserta-didik',
            'name' => 'Daftar Peserta Didik Aktif',
            'data' => [],
        ];
        return view('peserta_didik/aktif', $page);
    }
}
