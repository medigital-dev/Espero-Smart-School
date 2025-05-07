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

        $this->default();
        $this->joinTable();
        $this->countAll = $this->countFiltered = $this->query->countAllResults(false);
    }

    private function default()
    {
        $this->query->select('peserta_didik.nama')
            ->select('peserta_didik.jenis_kelamin')
            ->select('peserta_didik.tempat_lahir')
            ->select('peserta_didik.tanggal_lahir')
            ->select('peserta_didik.nisn')
            ->select('registrasi_peserta_didik.nipd')
            ->orderBy('peserta_didik.nama', 'ASC')
        ;
    }

    private function joinTable()
    {
        $this->query
            ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id')
            ->join('anggota_rombongan_belajar', 'peserta_didik.peserta_didik_id = anggota_rombongan_belajar.peserta_didik_id', 'left')
            ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
            ->join('guru_pegawai', 'guru_pegawai.guru_pegawai_id = rombongan_belajar.ptk_id', 'left')
            ->join('semester', 'semester.semester_id = rombongan_belajar.semester_id', 'left')
            ->join('kontak', 'kontak.nik = peserta_didik.nik', 'left')
            ->join('mutasi_pd', 'mutasi_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('ref_jenis_mutasi', 'ref_jenis_mutasi.ref_id = mutasi_pd.jenis', 'left')
            ->join('ref_agama', 'ref_agama.ref_id = peserta_didik.agama_id', 'left')
            ->join('orangtua_wali_pd', 'orangtua_wali_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('orangtua_wali as ayah', 'ayah.orangtua_id = orangtua_wali_pd.ayah_id', 'left')
            ->join('orangtua_wali as ibu', 'ibu.orangtua_id = orangtua_wali_pd.ibu_id', 'left')
            ->join('orangtua_wali as wali', 'wali.orangtua_id = orangtua_wali_pd.wali_id', 'left')
            ->join('alamat_tinggal', 'alamat_tinggal.nik = peserta_didik.nik', 'left')
            ->join('ref_alat_transportasi', 'ref_alat_transportasi.ref_id = alamat_tinggal.alat_transportasi_id', 'left')
            ->join('ref_jenis_registrasi', 'ref_jenis_registrasi.ref_id = registrasi_peserta_didik.jenis_registrasi', 'left')
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

    public function forAdmin()
    {
        $this->query
            ->select(['peserta_didik.peserta_didik_id', 'peserta_didik.nik'])
        ;

        return $this;
    }

    public function withOrtuWali(array $field = [])
    {
        $this->query->select('ayah.nama as ayah')
            ->select('ibu.nama as ibu')
            ->select('wali.nama as wali')
        ;
        return $this;
    }

    /**
     * Mengambil data alamat
     * @param array|string $fields Kolom pada tabel yang akan ditampilkan. Default: array kosong untuk menampilkan semua kolom pada tabel.
     * 
     * Array: Contoh ['id','nama', dst].
     * 
     * String: Gunakan tanda koma (,) untuk memisahkan. Exp: 'id,nama,dst'.
     * @return self|object $this
     */
    public function withAlamat(array|string $fields = [])
    {
        if (empty($field))
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
        else {
            $this->query->select($fields);
        }
        return $this;
    }

    /**
     * Mengambil data kontak peserta didik
     * @param array|string $fields Kolom pada tabel yang akan ditampilkan. Default: array kosong untuk menampilkan semua kolom pada tabel.
     * 
     * Array: Contoh ['id','nama', dst].
     * 
     * String: Gunakan tanda koma (,) untuk memisahkan. Exp: 'id,nama,dst'.
     * @return self|object $this
     */
    public function withContact(array|string $fields = [])
    {
        if (empty($fields)) {
            $this->query->select([
                'telepon',
                'hp',
                'email',
                'website'
            ]);
        } else {
            $this->query->select($fields);
        }
        return $this;
    }

    /**
     * Mengambil data peserta didik aktif
     * @param array|string $fields Kolom pada tabel yang akan ditampilkan. 
     * @return self|object $this
     */
    public function active()
    {
        $this->query->select('rombongan_belajar.nama as kelas');
        $this->query->where('semester.status', true);
        $this->countAll = $this->countFiltered = $this->query->countAllResults(false);
        return $this;
    }

    /**
     * Mengambil data registrasi peserta didik
     * @param array|string $fields Kolom pada tabel yang akan ditampilkan. 
     * 
     * Default: array kosong untuk menampilkan semua kolom pada tabel.
     * 
     * Array: Contoh ['id','nama', dst].
     * 
     * String: Gunakan tanda koma (,) untuk memisahkan. Exp: 'id,nama,dst'.
     * @return self|object $this
     */
    public function withRegistrasi(array|string $fields = [])
    {
        if (empty($fields)) {
            $this->query->select([
                'rombongan_belajar.nama as kelas',
                'tanggal_registrasi',
                'nipd',
                'asal_sekolah',
                'sekolah_jenjang_sebelumnya',
                'ref_jenis_registrasi.nama as jenis_registrasi',
                'ref_jenis_registrasi.warna as warna_registrasi',
            ]);
        } else {
            $this->query->select(trim($fields));
        }

        return $this;
    }

    /**
     * Mengambil data rombongan belajar peserta didik
     * @param array|string $fields Kolom pada tabel yang akan ditampilkan. 
     * 
     * Default: array kosong untuk menampilkan semua kolom pada tabel.
     * 
     * Array: Contoh ['id','nama', dst].
     * 
     * String: Gunakan tanda koma (,) untuk memisahkan. Exp: 'id,nama,dst'.
     * @return self|object $this
     */
    public function withRombel(array|string $fields = [])
    {
        if (empty($fields)) {
            $this->query->select([
                'jenis_registrasi_rombel',
                'tingkat_pendidikan as tingkat',
                'guru_pegawai.nama as wali_kelas',
                'kode_semester as semester'
            ]);
        } else {
            $this->query->select(trim($fields));
        }
        $this->query->where('semester.status', true);
        $this->countAll = $this->countFiltered = $this->query->countAllResults(false);
        return $this;
    }

    /**
     * Mengambil data peserta didik non aktif (lulus/mutasi)
     * @param array|string $fields Kolom pada tabel yang akan ditampilkan. 
     * 
     * Default: array kosong untuk menampilkan semua kolom pada tabel.
     * 
     * Array: Contoh ['id','nama', dst].
     * 
     * String: Gunakan tanda koma (,) untuk memisahkan. Exp: 'id,nama,dst'.
     * @return self|object $this
     */
    public function nonActive(array|string $fields = [])
    {
        if (empty($fields)) {
            $this->query->select([
                'ref_jenis_mutasi.nama as mutasi_jenis',
                'mutasi_pd.tanggal as mutasi_tanggal',
            ]);
        } else $this->query->select($fields);
        $this->query = $this->query->where('mutasi_pd.id !=', null);
        $this->countAll = $this->countFiltered = $this->query->countAllResults(false);
        return $this;
    }

    /**
     * Mengambil data peserta didik non aktif (lulus/mutasi)
     * @param array|string $fields Kolom pada tabel yang akan ditampilkan. 
     * 
     * Default: array kosong untuk menampilkan semua kolom pada tabel.
     * 
     * Array: Contoh ['id','nama', dst].
     * 
     * String: Gunakan tanda koma (,) untuk memisahkan. Exp: 'id,nama,dst'.
     * @return self|object $this
     */
    public function withMutasi(array|string $fields = [])
    {
        if (empty($fields)) {
            $this->query->select([
                'ref_jenis_mutasi.nama as mutasi_jenis',
                'mutasi_pd.tanggal as mutasi_tanggal',
                'mutasi_pd.alasan as mutasi_alasan',
                'mutasi_pd.sekolah_tujuan',
                'mutasi_pd.nomor_ijazah_lulus',
                'ref_jenis_mutasi.warna as mutasi_warna'
            ]);
        } else $this->query->select($fields);

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
        $jenis_registrasi = $this->request->getVar('jenis_registrasi');
        $tahun_registrasi = $this->request->getVar('tahun_registrasi');

        if ($status_pd && $status_pd !== 'all') {
            if ($status_pd == 'aktif') $this->query->where('semester.status', true);
            else if ($status_pd == 'mutasi') $this->query->where('mutasi_pd.id !==', null);
        }
        if ($nik) $this->query->where('peserta_didik.nik', $nik);
        if ($jenis_mutasi) $this->query->where('mutasi_pd.jenis', $jenis_mutasi);
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
