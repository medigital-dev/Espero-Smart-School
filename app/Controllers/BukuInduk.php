<?php

namespace App\Controllers;

use App\Libraries\Export;
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

    public function export($type, $privasi)
    {
        $heading = [
            ['DATA PESERTA DIDIK'],
            ['SMP Negeri 2 Wonosari'],
        ];

        $subHeading = [
            ['Tanggal unduh ' . tanggal('now', 'j F Y') . ' Jam ' . tanggal('now', 'H:i:s') . ' WIB']
        ];

        $title = [
            'heading' => $heading,
            'subHeading' => $subHeading,
        ];

        $header = [
            'No',
            'Kelas',
            'Nama',
            'NIPD',
            'NISN',
            'NIK',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat Jalan',
            'RT',
            'RW',
            'Dusun'
        ];

        $lib = new Export;
        $lib->excel($title, $header, $rows);
    }
}
