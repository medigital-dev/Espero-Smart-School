<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\AnggotaRombelModel;
use App\Models\MutasiPdModel;
use App\Models\PesertaDidikModel;
use CodeIgniter\API\ResponseTrait;

class Datatables extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['indonesia']);
    }

    public function bukuIndukPd()
    {
        $mPesertaDidik = new PesertaDidikModel();
        $mMutasi = new MutasiPdModel();
        $mAnggotaRombel = new AnggotaRombelModel();

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = (int)$this->request->getPost('length');
        $searchValue = $this->request->getPost('search')['value'];
        $columns = $this->request->getPost('columns');
        $orders = $this->request->getPost('order');
        $filter = [];
        $totalRecord = $mPesertaDidik->countAllResults();

        $query = $mPesertaDidik
            ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id', 'LEFT')
            ->groupStart()
            ->like('nama', $searchValue)
            ->orLike('nipd', $searchValue)
            ->orLike('nisn', $searchValue)
            ->groupEnd();
        $totalFilteredData = $query->countAllResults(false);
        if (empty($orders)) {
            $query->orderBy('nama', 'asc');
        } else {
            foreach ($orders as $order) {
                $query->orderBy($columns[$order['column']]['data'], $order['dir']);
            }
        }
        $filteredData = $query->findAll($length, $start);

        $data = [];
        foreach ($filteredData as $row) {
            $status = ['nama' => '-', 'warna' => 'secondary'];
            $cMutasi = $mMutasi
                ->select(['nama', 'warna'])
                ->join('ref_jenis_mutasi', 'ref_jenis_mutasi.ref_id = mutasi_pd.jenis', 'LEFT')
                ->where('peserta_didik_id', $row['peserta_didik_id'])
                ->first();
            if ($cMutasi) $status = $cMutasi;

            $cAnggota = $mAnggotaRombel
                ->select('nama')
                ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'LEFT')
                ->join('semester', 'semester.semester_id = rombongan_belajar.semester_id', 'LEFT')
                ->where('semester.status', true)
                ->where('peserta_didik_id', $row['peserta_didik_id'])
                ->orderBy('semester.kode', 'DESC')
                ->first();
            if ($cAnggota) $status = ['nama' => $cAnggota['nama'], 'warna' => 'success'];

            $temp = [
                'id' => $row['peserta_didik_id'],
                'nama' => strtoupper($row['nama']),
                'nipd' => $row['nipd'],
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
