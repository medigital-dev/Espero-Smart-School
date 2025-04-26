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

    protected $mPesertaDidik;
    protected $draw;
    protected $start;
    protected $length;
    protected $searchValue;
    protected $columns;
    protected $orders;
    protected $filter = [];
    protected $totalRecord;

    public function __construct()
    {
        helper(['indonesia']);

        $this->mPesertaDidik = new PesertaDidikModel();
    }

    protected function initDt()
    {
        $this->draw = $this->request->getPost('draw');
        $this->start = (int)$this->request->getPost('start');
        $this->length = (int)$this->request->getPost('length');
        $this->searchValue = $this->request->getPost('search')['value'];
        $this->columns = $this->request->getPost('columns');
        $this->orders = $this->request->getPost('order');
        $this->filter = [];
    }

    public function bukuIndukPd()
    {
        $this->initDt();
        $mMutasi = new MutasiPdModel();
        $mAnggotaRombel = new AnggotaRombelModel();

        $this->totalRecord = $this->mPesertaDidik->countAllResults();
        $query = $this->mPesertaDidik
            ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id', 'LEFT')
            ->groupStart()
            ->like('nama', $this->searchValue)
            ->orLike('nipd', $this->searchValue)
            ->orLike('nisn', $this->searchValue)
            ->groupEnd();
        $totalFilteredData = $query->countAllResults(false);
        if (empty($this->orders)) {
            $query->orderBy('nama', 'asc');
        } else {
            foreach ($this->orders as $order) {
                $query->orderBy($this->columns[$order['column']]['data'], $order['dir']);
            }
        }
        $filteredData = $query->findAll($this->length, $this->start);

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
            'draw' => intval($this->draw),
            'recordsTotal' => $this->totalRecord,
            'recordsFiltered' => $totalFilteredData,
            'data' => $data,
        ];

        return $this->respond($response);
    }

    public function publicPd()
    {
        // return $this->respond($this->request->getPost());
        $this->initDt();
        $this->mPesertaDidik
            ->select(['peserta_didik.peserta_didik_id as id', 'peserta_didik.nama', 'jenis_kelamin as jk', 'nipd as nis', 'nisn', 'tanggal_lahir', 'tempat_lahir', 'rombongan_belajar.nama as kelas', 'desa', 'dusun', 'kecamatan'])
            ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('anggota_rombongan_belajar', 'peserta_didik.peserta_didik_id = anggota_rombongan_belajar.peserta_didik_id', 'left')
            ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
            ->join('semester', 'semester.semester_id = rombongan_belajar.semester_id', 'left')
            ->join('alamat_tinggal', 'alamat_tinggal.nik = peserta_didik.nik', 'left')
            ->where('status', true);
        $this->totalRecord = $this->mPesertaDidik->countAllResults(false);
        $rows = $this->mPesertaDidik
            ->groupStart()
            ->like('peserta_didik.nama', $this->searchValue)
            ->orLike('nipd', $this->searchValue)
            ->orLike('nisn', $this->searchValue)
            ->groupEnd();
        $totalFilteredData = $rows->countAllResults(false);
        if (empty($this->orders)) {
            $rows->orderBy('peserta_didik.nama', 'asc');
        } else {
            foreach ($this->orders as $order) {
                $rows->orderBy($this->columns[$order['column']]['data'], $order['dir']);
            }
        }
        $rows = $rows->findAll($this->length, $this->start);
        $data = array_map(function ($value) {
            $value['tanggal_lahir'] = tanggal($value['tanggal_lahir'], 'j F Y');
            return $value;
        }, $rows);
        $response = [
            'draw' => intval($this->draw),
            'recordsTotal' => $this->totalRecord,
            'recordsFiltered' => $totalFilteredData,
            'data' => $data,
        ];

        return $this->respond($response);
    }
}
