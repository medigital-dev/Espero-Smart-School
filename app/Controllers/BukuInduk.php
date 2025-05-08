<?php

namespace App\Controllers;

use App\Libraries\DataPesertaDidik;
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

    public function export($type)
    {
        $rows = [];
        switch ($type) {
            case 'pesertaDidik':
                $title = [
                    'heading' => [
                        ['DATA PESERTA DIDIK'],
                        ['SMP Negeri 2 Wonosari'],
                    ],
                    'subHeading' => [
                        ['Tanggal unduh ' . tanggal('now', 'j F Y') . ' Jam ' . tanggal('now', 'H:i:s') . ' WIB']
                    ],
                ];

                $header = [
                    'No',
                    'Rombel Saat Ini',
                    'Nama',
                    'JK',
                    'NIPD',
                    'NISN',
                    'Tempat Lahir',
                    'Tanggal Lahir',
                    'NIK',
                    'Agama',
                    'Alamat',
                    'RT',
                    'RW',
                    'Dusun',
                    'Kelurahan',
                    'Kecamatan',
                    'Kode Pos',
                    'Lintang',
                    'Bujur',
                    'Alat Transportasi',
                    'Telepon',
                    'HP',
                    'E-Mail',
                    'Sekolah Asal',
                    'Jarak Rumah ke Sekolah (KM)',
                    'Nama Ayah',
                    'Jenjang Pendidikan',
                    'Pekerjaan',
                    'Penghasilan',
                    'Nama Ibu',
                    'Jenjang Pendidikan',
                    'Pekerjaan',
                    'Penghasilan',
                    'Nama Wali',
                    'Jenjang Pendidikan',
                    'Pekerjaan',
                    'Penghasilan',
                ];
                $lib = new DataPesertaDidik;
                $data = $lib->withRegistrasi()
                    ->withRombel()
                    ->withAlamat()
                    ->withContact()
                    ->withOrtuWali()
                    ->withFilter()
                    ->forAdmin()
                    ->get();

                $no = 1;
                foreach ($data as $row) {
                    $rows[] = [
                        $no++,
                        $row['kelas'],
                        $row['nama'],
                        $row['jenis_kelamin'],
                        $row['nipd'],
                        $row['nisn'],
                        $row['tempat_lahir'],
                        $row['tanggal_lahir'],
                        $row['nik'],
                        $row['agama'],
                        $row['alamat_jalan'],
                        $row['rt'],
                        $row['rw'],
                        $row['dusun'],
                        $row['desa'],
                        $row['kecamatan'],
                        $row['kode_pos'],
                        $row['lintang'],
                        $row['bujur'],
                        $row['transportasi'],
                        $row['telepon'],
                        $row['hp'],
                        $row['email'],
                        $row['asal_sekolah'],
                        $row['jarak_rumah'],
                        $row['ayah'],
                        null,
                        null,
                        null,
                        $row['ibu'],
                        null,
                        null,
                        null,
                        $row['wali'],
                        null,
                        null,
                        null,
                    ];
                }
                break;

            default:
                # code...
                break;
        }

        $lib = new Export;
        $result =  $lib->excel($title, $header, $rows);

        return $this->respond($result);
    }
}
