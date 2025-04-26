<?php

namespace App\Controllers\public;

use App\Controllers\BaseController;

class Homepage extends BaseController
{
    public function pesertaDidik(): string
    {
        $page = [
            'title' => 'EsperoSmartSchool - Daftar Peserta Didik',
            'page' => 'Daftar Peserta Didik',
            'breadcrumb' => ['Homepage', 'Peserta Didik'],
            'sidebar' => 'data-pd',
            'data' => [],
        ];
        return view('public/peserta-didik', $page);
    }
}
