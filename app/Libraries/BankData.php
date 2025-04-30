<?php

namespace App\Libraries;

use App\Models\PesertaDidikModel;

class BankData
{
    protected $mPesertaDidik;
    protected $mGuru;

    protected $keyword;
    protected $kelas;
    protected $tingkat;
    protected $nama;
    protected $ibu_kandung;
    protected $nipd;
    protected $nisn;
    protected $jk;
    protected $tempat_lahir;
    protected $tanggal_lahir_lengkap;
    protected $tanggal_lahir;
    protected $bulan_lahir;
    protected $tahun_lahir;
    protected $usia_awal;
    protected $usia_akhir;
    protected $dusun;
    protected $desa;
    protected $kecamatan;

    public function __construct()
    {
        $this->mPesertaDidik = new PesertaDidikModel();
    }

    public function get(int $limit = null, int $offset = 0)
    {
        return $this->mPesertaDidik->findAll($limit, $offset);
    }

    public function pesertaDidik()
    {
        $this->mPesertaDidik
            ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('anggota_rombongan_belajar', 'peserta_didik.peserta_didik_id = anggota_rombongan_belajar.peserta_didik_id', 'left')
            ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
            ->join('semester', 'semester.semester_id = rombongan_belajar.semester_id', 'left')
            ->join('alamat_tinggal', 'alamat_tinggal.nik = peserta_didik.nik', 'left')
            ->join('orangtua_wali_pd', 'orangtua_wali_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('orangtua_wali', 'orangtua_wali.orangtua_id = orangtua_wali_pd.orangtua_id', 'left')
            ->where('hubungan_keluarga', 'kandung')
            ->where('orangtua_wali.jenis_kelamin', 'P')
        ;
        return $this->pesertaDidik();
    }

    public function all()
    {
        return $this;
    }

    public function public()
    {
        $this->mPesertaDidik
            ->select([
                'peserta_didik.peserta_didik_id as id',
                'peserta_didik.nama',
                'peserta_didik.jenis_kelamin as jk',
                'nipd as nis',
                'nisn',
                'peserta_didik.tanggal_lahir',
                'peserta_didik.tempat_lahir',
                'rombongan_belajar.nama as kelas',
                'desa',
                'dusun',
                'kecamatan',
                'orangtua_wali.nama as ibu_kandung'
            ]);
        return $this;
    }

    public function active()
    {
        $this->mPesertaDidik->where('semester.status', true);
        return $this;
    }

    public function withFilter()
    {
        $request = request();
        $keyword = $this->keyword = $request->getPost('keyword');
        $kelas = $this->kelas = $request->getPost('kelas');
        $tingkat = $this->tingkat = $request->getPost('tingkat');
        $nama = $this->nama = $request->getPost('nama');
        $ibu_kandung = $this->ibu_kandung = $request->getPost('ibu_kandung');
        $nipd = $this->nipd = $request->getPost('nipd');
        $nisn = $this->nisn = $request->getPost('nisn');
        $jk = $this->jk = $request->getPost('jk');
        $tempat_lahir = $this->tempat_lahir = $request->getPost('tempat_lahir');
        $tanggal_lahir_lengkap = $this->tanggal_lahir_lengkap = $request->getPost('tanggal_lahir_lengkap');
        $tanggal_lahir = $this->tanggal_lahir = $request->getPost('tanggal_lahir');
        $bulan_lahir = $this->bulan_lahir = $request->getPost('bulan_lahir');
        $tahun_lahir = $this->tahun_lahir = $request->getPost('tahun_lahir');
        $usia_awal = $this->usia_awal = $request->getPost('usia_awal');
        $usia_akhir = $this->usia_akhir = $request->getPost('usia_akhir');
        $dusun = $this->dusun = $request->getPost('dusun');
        $desa = $this->desa = $request->getPost('desa');
        $kecamatan = $this->kecamatan = $request->getPost('kecamatan');

        if ($kelas) $this->mPesertaDidik->where('rombongan_belajar.rombel_id', $kelas);
        if ($tingkat) $this->mPesertaDidik->where('tingkat_pendidikan', $tingkat);
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
        $this->mPesertaDidik
            ->groupStart()
            ->like('peserta_didik.nama', $keyword)
            ->orLike('nipd', $keyword)
            ->orLike('nisn', $keyword)
            ->orLike('rombongan_belajar.nama', $keyword)
            ->groupEnd();

        return $this;
    }
}
