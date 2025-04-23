<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class BukuInduk extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['indonesia']);
    }

    public function pesertaDidik(): string
    {
        $page = [
            'title' => 'EsperoSmartSchool - Buku Induk',
            'page' => 'Buku Induk Peserta Didik',
            'breadcrumb' => ['Buku Induk', 'Peserta Didik'],
            'sidebar' => 'buku-induk-pd',
            'data' => [],
        ];
        return view('buku_induk/peserta-didik', $page);
    }
}
