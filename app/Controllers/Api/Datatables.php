<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\AnggotaRombelModel;
use App\Models\MutasiPdModel;
use App\Models\OrtuWaliPdModel;
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
        $mOrangtuaWaliPd = new OrtuWaliPdModel();

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

            $ortuwali = $mOrangtuaWaliPd
                ->select(['nama', 'jenis_kelamin', 'hubungan_keluarga'])
                ->join('orangtua_wali', 'orangtua_wali.orangtua_id = orangtua_wali_pd.orangtua_id', 'left')
                ->where('peserta_didik_id', $row['peserta_didik_id'])
                ->findAll();

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
                'orangtuawali' => $ortuwali,
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
        $this->initDt();
        $kelas = $this->request->getPost('kelas');
        $nama = $this->request->getPost('nama');
        $ibu_kandung = $this->request->getPost('ibu_kandung');
        $nipd = $this->request->getPost('nipd');
        $nisn = $this->request->getPost('nisn');
        $jk = $this->request->getPost('jk');
        $tempat_lahir = $this->request->getPost('tempat_lahir');
        $tanggal_lahir_lengkap = $this->request->getPost('tanggal_lahir_lengkap');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $bulan_lahir = $this->request->getPost('bulan_lahir');
        $tahun_lahir = $this->request->getPost('tahun_lahir');
        $usia_awal = $this->request->getPost('usia_awal');
        $usia_akhir = $this->request->getPost('usia_akhir');
        $dusun = $this->request->getPost('dusun');
        $desa = $this->request->getPost('desa');
        $kecamatan = $this->request->getPost('kecamatan');
        $this->mPesertaDidik
            ->select(['peserta_didik.peserta_didik_id as id', 'peserta_didik.nama', 'peserta_didik.jenis_kelamin as jk', 'nipd as nis', 'nisn', 'peserta_didik.tanggal_lahir', 'peserta_didik.tempat_lahir', 'rombongan_belajar.nama as kelas', 'desa', 'dusun', 'kecamatan', 'orangtua_wali.nama as ibu_kandung'])
            ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('anggota_rombongan_belajar', 'peserta_didik.peserta_didik_id = anggota_rombongan_belajar.peserta_didik_id', 'left')
            ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
            ->join('semester', 'semester.semester_id = rombongan_belajar.semester_id', 'left')
            ->join('alamat_tinggal', 'alamat_tinggal.nik = peserta_didik.nik', 'left')
            ->join('orangtua_wali_pd', 'orangtua_wali_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('orangtua_wali', 'orangtua_wali.orangtua_id = orangtua_wali_pd.orangtua_id', 'left')
            ->where('status', true)
            ->where('hubungan_keluarga', 'kandung')
            ->where('orangtua_wali.jenis_kelamin', 'P')
        ;
        $this->totalRecord = $this->mPesertaDidik->countAllResults(false);
        if ($kelas) $this->mPesertaDidik->where('rombongan_belajar.rombel_id', $kelas);
        if ($nama) $this->mPesertaDidik->like('peserta_didik.nama', $nama);
        if ($ibu_kandung) $this->mPesertaDidik->like('orangtua_wali.nama', $ibu_kandung);
        if ($nipd) $this->mPesertaDidik->like('nipd', $nipd);
        if ($nisn) $this->mPesertaDidik->like('nisn', $nisn);
        if ($jk !== 'all') $this->mPesertaDidik->where('peserta_didik.jenis_kelamin', $jk);
        if ($tempat_lahir) $this->mPesertaDidik->like('peserta_didik.tempat_lahir', $tempat_lahir);
        if ($tanggal_lahir_lengkap) {
            $setTagl = date_create_from_format('d/m/Y', $tanggal_lahir_lengkap);
            if ($setTagl)
                $this->mPesertaDidik->where('peserta_didik.tanggal_lahir', date_format($setTagl, 'Y-m-d'));
        }
        if ($tanggal_lahir) $this->mPesertaDidik->where('DAY(peserta_didik.tanggal_lahir)', (int) $tanggal_lahir);
        if ($bulan_lahir) $this->mPesertaDidik->where('MONTH(peserta_didik.tanggal_lahir)', $bulan_lahir);
        if ($tahun_lahir) $this->mPesertaDidik->where('YEAR(peserta_didik.tanggal_lahir)', (int) $tahun_lahir);
        if ($usia_awal && $usia_akhir) {
            if ($usia_awal == $usia_akhir) {
                $dateAwal = date('Y-m-d', strtotime('-' . $usia_awal . ' years -6 months'));
                $dateAkhir = date('Y-m-d', strtotime('-' . $usia_awal . ' years +6 months'));
            } else {
                $dateAwal = date('Y-m-d', strtotime('-' . $usia_awal . ' years'));
                $dateAkhir = date('Y-m-d', strtotime('-' . $usia_akhir . ' years'));
            }

            if ($dateAwal < $dateAkhir) {
                [$dateAwal, $dateAkhir] = [$dateAkhir, $dateAwal];
            }

            $this->mPesertaDidik->where('peserta_didik.tanggal_lahir BETWEEN "' . $dateAkhir . '" AND "' . $dateAwal . '"');
        }
        if ($dusun) $this->mPesertaDidik->like('dusun', $dusun);
        if ($desa) $this->mPesertaDidik->like('desa', $desa);
        if ($kecamatan) $this->mPesertaDidik->like('kecamatan', $kecamatan);

        $rows = $this->mPesertaDidik
            ->groupStart()
            ->like('peserta_didik.nama', $this->searchValue)
            ->orLike('nipd', $this->searchValue)
            ->orLike('nisn', $this->searchValue)
            ->orLike('rombongan_belajar.nama', $this->searchValue)
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
            $value['nama'] = strtoupper($value['nama']);
            $value['tempat_lahir'] = ucwords(strtolower($value['tempat_lahir']));
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
