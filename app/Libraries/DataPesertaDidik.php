<?php

namespace App\Libraries;

use App\Models\PesertaDidikModel;

class DataPesertaDidik
{
    protected $model;
    protected $query;
    protected $request;

    protected $draw;
    protected $start;
    protected $length;
    protected $searchValue;
    protected $columns;
    protected $orders;
    protected $filter = [];

    protected int $countAll = 0;
    protected int $countFiltered = 0;

    public function __construct()
    {
        $this->request = service('request');
        $this->model = new PesertaDidikModel();
        $this->query = $this->model;

        $this->selectDefault();
        $this->mainJoin();
        $this->countAll = $this->countFiltered = $this->query->countAllResults(false);
    }

    private function selectDefault()
    {
        $this->query->select('peserta_didik.nama')
            ->select('peserta_didik.jenis_kelamin')
            ->select('peserta_didik.tempat_lahir')
            ->select('peserta_didik.tanggal_lahir')
            ->select('peserta_didik.nisn')
            ->select('registrasi_peserta_didik.nipd')
        ;
    }

    private function mainJoin()
    {
        $this->query
            ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id')
            ->join('anggota_rombongan_belajar', 'peserta_didik.peserta_didik_id = anggota_rombongan_belajar.peserta_didik_id', 'left')
            ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
            ->join('semester', 'semester.semester_id = rombongan_belajar.semester_id', 'left')
            ->join('kontak', 'kontak.nik = peserta_didik.nik', 'left')
            ->join('mutasi_pd', 'mutasi_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('ref_agama', 'ref_agama.ref_id = peserta_didik.agama_id', 'left')
        ;
    }

    private function initDt()
    {
        $this->draw = $this->request->getPost('draw');
        $this->start = (int)$this->request->getPost('start');
        $this->length = (int)$this->request->getPost('length');
        $this->searchValue = $this->request->getPost('search')['value'];
        $this->columns = $this->request->getPost('columns');
        $this->orders = $this->request->getPost('order');
        $this->filter = [];

        $this->query
            ->groupStart()
            ->like('peserta_didik.nama', $this->searchValue)
            ->orLike('nipd', $this->searchValue)
            ->orLike('peserta_didik.nisn', $this->searchValue)
            ->orLike('rombongan_belajar.nama', $this->searchValue)
            ->groupEnd();
        $this->countFiltered = $this->query->countAllResults(false);

        if ($this->orders)
            foreach ($this->orders as $order) {
                $this->query->orderBy($this->columns[$order['column']]['data'], $order['dir']);
            }
    }

    public function toDataTable(): array
    {
        $this->initDt();
        return [
            'draw' => intval($this->draw),
            'paging' => ['length' => $this->length, 'start' => $this->start],
            'recordsTotal' => $this->countAll,
            'recordsFiltered' => $this->countFiltered,
            'data' => $this->query->findAll($this->length, $this->start),
        ];
    }

    public function forPublic()
    {
        $this->query
            ->select('rombongan_belajar.nama as kelas')
        ;

        return $this;
    }

    public function forAdmin()
    {
        $this->query
            ->select('peserta_didik.peserta_didik_id')
            ->select('jenis_registrasi')
            ->select('tanggal_registrasi')
        ;

        return $this;
    }

    public function withOrtuWali()
    {
        $this->query->select('ayah.nama as ayah');
        $this->query->select('ibu.nama as ibu');
        $this->query->select('wali.nama as wali');
        $this->query
            ->join('orangtua_wali_pd', 'orangtua_wali_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('orangtua_wali as ayah', 'ayah.orangtua_id = orangtua_wali_pd.ayah_id', 'left')
            ->join('orangtua_wali as ibu', 'ibu.orangtua_id = orangtua_wali_pd.ibu_id', 'left')
            ->join('orangtua_wali as wali', 'wali.orangtua_id = orangtua_wali_pd.wali_id', 'left');
        return $this;
    }

    public function withAlamat()
    {
        $this->query
            ->join('alamat_tinggal', 'alamat_tinggal.nik = peserta_didik.nik', 'left')
            ->join('ref_alat_transportasi', 'ref_alat_transportasi.ref_id = alamat_tinggal.alat_transportasi_id', 'left')
        ;
        $this->query->select([
            'alamat_jalan',
            'rt',
            'rw',
            'dusun',
            'desa',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'kode_pos',
            'lintang',
            'bujur',
            'jarak_rumah',
            'waktu_tempuh',
            'ref_alat_transportasi.nama as transportasi'
        ]);
        return $this;
    }

    public function aktif()
    {
        $this->query = $this->query
            ->where('semester.status', true);
        $this->countAll =
            $this->countFiltered = $this->query->countAllResults(false);
        return $this;
    }

    public function onlyMutasi()
    {
        $this->query = $this->query->where('mutasi_pd.id !=', null);
        $this->countAll =
            $this->countFiltered = $this->query->countAllResults(false);
        return $this;
    }

    public function withFilter()
    {
        $keyword = $this->request->getPost('keyword');
        $kelas = $this->request->getPost('kelas');
        $tingkat = $this->request->getPost('tingkat');
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

        if ($kelas) $this->query->where('rombongan_belajar.rombel_id', $kelas);
        if ($tingkat) $this->query->where('tingkat_pendidikan', $tingkat);
        if ($nama) $this->query->like('peserta_didik.nama', $nama);
        if ($ibu_kandung) $this->query->like('orangtua_wali.nama', $ibu_kandung);
        if ($nipd) $this->query->like('nipd', $nipd);
        if ($nisn) $this->query->like('nisn', $nisn);
        if ($jk && $jk !== 'all') $this->query->where('peserta_didik.jenis_kelamin', $jk);
        if ($tempat_lahir) $this->query->like('peserta_didik.tempat_lahir', $tempat_lahir);
        if ($tanggal_lahir_lengkap) {
            $setTagl = date_create_from_format('d/m/Y', $tanggal_lahir_lengkap);
            if ($setTagl)
                $this->query->where('peserta_didik.tanggal_lahir', date_format($setTagl, 'Y-m-d'));
        }
        if ($tanggal_lahir) $this->query->where('DAY(peserta_didik.tanggal_lahir)', (int) $tanggal_lahir);
        if ($bulan_lahir) $this->query->where('MONTH(peserta_didik.tanggal_lahir)', $bulan_lahir);
        if ($tahun_lahir) $this->query->where('YEAR(peserta_didik.tanggal_lahir)', (int) $tahun_lahir);
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

            $this->query->where('peserta_didik.tanggal_lahir BETWEEN "' . $dateAkhir . '" AND "' . $dateAwal . '"');
        }
        if ($dusun) $this->query->like('dusun', $dusun);
        if ($desa) $this->query->like('desa', $desa);
        if ($kecamatan) $this->query->like('kecamatan', $kecamatan);
        if ($keyword) {
            $this->query
                ->groupStart()
                ->like('peserta_didik.nama', $keyword)
                ->orLike('nipd', $keyword)
                ->orLike('nisn', $keyword)
                ->orLike('rombongan_belajar.nama', $keyword)
                ->groupEnd();
        }
        $this->countFiltered = $this->query->countAllResults(false);
        return $this;
    }

    public function get(int $limit = null, int $offset = 0)
    {
        return $this->query->findAll($limit, $offset);
    }

    public function withOrder(string $field, string $direction)
    {
        $this->query->orderBy($field, $direction);
        return $this;
    }
}
