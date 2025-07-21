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
        $this->query->orderBy('peserta_didik.nama', 'ASC');
        $this->joinTable();
    }

    private function joinTable()
    {
        $this->query
            ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('anggota_rombongan_belajar', 'peserta_didik.peserta_didik_id = anggota_rombongan_belajar.peserta_didik_id', 'left')
            ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
            ->join('guru_pegawai', 'guru_pegawai.guru_pegawai_id = rombongan_belajar.ptk_id', 'left')
            ->join('semester', 'semester.semester_id = rombongan_belajar.semester_id', 'left')
            ->join('kontak', 'kontak.nik = peserta_didik.nik', 'left')
            ->join('mutasi_pd', 'mutasi_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('kelulusan', 'kelulusan.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('orangtua_wali_pd', 'orangtua_wali_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('orangtua_wali as ayah', 'ayah.orangtua_id = orangtua_wali_pd.ayah_id', 'left')
            ->join('orangtua_wali as ibu', 'ibu.orangtua_id = orangtua_wali_pd.ibu_id', 'left')
            ->join('orangtua_wali as wali', 'wali.orangtua_id = orangtua_wali_pd.wali_id', 'left')
            ->join('alamat_tinggal', 'alamat_tinggal.nik = peserta_didik.nik', 'left')
            ->join('pass_foto', 'pass_foto.foto_id = peserta_didik.foto_id', 'left')
            ->join('ref_jenis_mutasi', 'ref_jenis_mutasi.ref_id = mutasi_pd.jenis', 'left')
            ->join('ref_agama', 'ref_agama.ref_id = peserta_didik.agama_id', 'left')
            ->join('ref_alat_transportasi', 'ref_alat_transportasi.ref_id = alamat_tinggal.alat_transportasi_id', 'left')
            ->join('ref_jenis_registrasi', 'ref_jenis_registrasi.ref_id = registrasi_peserta_didik.jenis_registrasi', 'left')
            ->join('ref_jenis_kelamin', 'ref_jenis_kelamin.ref_id = peserta_didik.jenis_kelamin', 'left')
            ->join('ref_jenis_tinggal', 'ref_jenis_tinggal.ref_id = alamat_tinggal.jenis_tinggal_id', 'left')
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
        $this->countAll = $this->countFiltered = $this->query->countAllResults(false);
        $this->query
            ->groupStart()
            ->like('peserta_didik.nama', $this->searchValue)
            ->orLike('nipd', $this->searchValue)
            ->orLike('nisn', $this->searchValue)
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

    public function toSelect2(): array
    {
        $this->length = 10;
        $this->start = (int) $this->request->getGet('page') ?: 1;
        $offset = ($this->start - 1) * $this->length;

        $this->query->select(['peserta_didik.peserta_didik_id', 'peserta_didik.nama', 'rombongan_belajar.nama as kelas', 'nisn', 'nipd']);
        $items = $this->query->findAll($this->length + 1, $offset);

        $hasMore = count($items) > $this->length;
        if ($hasMore) {
            array_pop($items);
        }

        $results = array_map(function ($item) {
            return [
                'id' => $item['peserta_didik_id'],
                'text' => $item['nama'],
                'nipd' => $item['nipd'],
                'nisn' => $item['nisn'],
                'kelas' => $item['kelas']
            ];
        }, $items);

        return [
            'items' => $results,
            'hasMore' => $hasMore,
        ];
    }

    public function select(array|string $fields = '*')
    {
        $this->query->select($fields);
        return $this;
    }

    /**
     * Mengambil data peserta didik aktif
     * @param array|string $fields Kolom pada tabel yang akan ditampilkan. 
     * @return self|object $this
     */
    public function active()
    {
        $this->query
            ->where('semester.status', true)
            ->where('mutasi_pd.id');
        $this->countAll = $this->countFiltered = $this->query->countAllResults(false);
        return $this;
    }

    public function withFilter()
    {
        $keyword = $this->request->getVar('key');
        $status_pd = $this->request->getVar('status_pd');
        $kelas = $this->request->getVar('kelas');
        $tingkat = $this->request->getVar('tingkat');
        $nama = $this->request->getVar('nama');
        $nipd = $this->request->getVar('nipd');
        $nisn = $this->request->getVar('nisn');
        $nik = $this->request->getVar('nik');
        $agama = $this->request->getVar('agama');
        $ayah = $this->request->getVar('ayah');
        $ibu_kandung = $this->request->getVar('ibu_kandung');
        $jk = $this->request->getVar('jk');
        $tempat_lahir = $this->request->getVar('tempat_lahir');
        $tanggal_lahir_lengkap = $this->request->getVar('tanggal_lahir_lengkap');
        $tanggal_lahir = $this->request->getVar('tanggal_lahir');
        $bulan_lahir = $this->request->getVar('bulan_lahir');
        $tahun_lahir = $this->request->getVar('tahun_lahir');
        $usia_awal = $this->request->getVar('usial_awal');
        $usia_akhir = $this->request->getVar('usia_akhir');
        $dusun = $this->request->getVar('dusun');
        $desa = $this->request->getVar('desa');
        $kecamatan = $this->request->getVar('kecamatan');
        $jenis_mutasi = $this->request->getVar('jenis_mutasi');
        $tahun_mutasi = $this->request->getVar('tahun_mutasi');
        $jenis_registrasi = $this->request->getVar('jenis_registrasi');
        $tahun_registrasi = $this->request->getVar('tahun_registrasi');

        if ($status_pd && $status_pd !== 'all') {
            if ($status_pd == 'aktif') $this->query->where('semester.status', true)->where('mutasi_pd.id');
            else if ($status_pd == 'mutasi') $this->query->where('mutasi_pd.id !=');
        }
        if ($nik) $this->query->where('peserta_didik.nik', $nik);
        if ($jenis_mutasi) $this->query->where('mutasi_pd.jenis', $jenis_mutasi);
        if ($tahun_mutasi) $this->query->where('YEAR(mutasi_pd.tanggal)', $tahun_mutasi);
        if ($jenis_registrasi) $this->query->where('registrasi_peserta_didik.jenis_registrasi', $jenis_registrasi);
        if ($tahun_registrasi) $this->query->where('YEAR(registrasi_peserta_didik.tanggal_registrasi)', $tahun_registrasi);
        if ($kelas) $this->query->where('rombongan_belajar.rombel_id', $kelas);
        if ($tingkat) $this->query->where('tingkat_pendidikan', $tingkat);
        if ($nama) $this->query->like('peserta_didik.nama', $nama);
        if ($ibu_kandung) $this->query->like('ibu.nama', $ibu_kandung);
        if ($ayah) $this->query->like('ayah.nama', $ayah);
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
        if ($agama) $this->query->where('ref_agama.ref_id', $agama);
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

    public function find($id)
    {
        $this->query->where('peserta_didik.peserta_didik_id', $id);
        return $this->query->first();
    }

    public function where($field, $value = null)
    {
        $this->query->where($field, $value);
        return $this;
    }
}
