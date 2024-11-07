<?php

namespace App\Controllers;

use App\Models\AnggotaRombelModel;
use App\Models\MutasiPdModel;
use App\Models\RegistrasiPesertaDidikModel;
use CodeIgniter\API\ResponseTrait;

class BukuInduk extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['indonesia']);
    }

    public function index(): string
    {
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
        $mMutasi = new MutasiPdModel();
        $mAnggotaRombel = new AnggotaRombelModel();

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $searchValue = $this->request->getPost('search')['value'];
        $filter = [];

        $totalRecord = $mRegistrasi->countAllResults();

        $query = $mRegistrasi
            ->join('peserta_didik', 'peserta_didik.peserta_didik_id = registrasi_peserta_didik.peserta_didik_id', 'LEFT')
            ->like('nama', $searchValue)
            ->orLike('nipd', $searchValue)
            ->orLike('nisn', $searchValue);

        $totalFilteredData = $query->countAllResults(false);
        $filteredData = $query->orderBy('nama', 'asc')->findAll($length, $start);

        $data = [];
        foreach ($filteredData as $row) {
            $status = '<i class="fas fa-minus-circle text-secondary"></i>';
            $cMutasi = $mMutasi
                ->join('ref_jenis_mutasi', 'ref_jenis_mutasi.ref_id = mutasi_pd.jenis', 'LEFT')
                ->where('peserta_didik_id', $row['peserta_didik_id'])
                ->first();
            if ($cMutasi) $status = '<span class="badge bg-' . $cMutasi['warna'] . '">' . $cMutasi['nama'] . '</span>';

            $cAnggota = $mAnggotaRombel
                ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'LEFT')
                ->join('semester', 'semester.semester_id = rombongan_belajar.semester_id', 'LEFT')
                ->where('semester.status', true)
                ->where('peserta_didik_id', $row['peserta_didik_id'])
                ->orderBy('semester.kode', 'DESC')
                ->first();
            if ($cAnggota) $status = '<span class="badge bg-success p-1 m-0">Kelas ' . $cAnggota['nama'] . '</span>';
            $temp = [
                'checkbox' => '
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input dtCheckbox" type="checkbox" id="check_' . $row['peserta_didik_id'] . '" value="' . $row['peserta_didik_id'] . '">
                    <label for="check_' . $row['peserta_didik_id'] . '" class="custom-control-label"></label>
                </div>',
                'nama' => '<a type="button" href="#">' . strtoupper($row['nama']) . '</a>',
                'nis' => $row['nipd'],
                'nisn' => $row['nisn'],
                'jk' => $row['jenis_kelamin'],
                'tempatLahir' => $row['tempat_lahir'],
                'tanggalLahir' => tanggal($row['tanggal_lahir']),
                'jenisRegistrasi' => $row['jenis_registrasi'],
                'tanggalRegistrasi' => tanggal($row['tanggal_registrasi']),
                'status' => $status,
            ];
            $data[] = $temp;
        }

        $response = [
            'draw' => intval($draw),
            'recordsTotal' => $totalRecord,
            'recordsFiltered' => $totalFilteredData,
            'data' => $data,
        ];

        return $this->respond($response);
    }
}
