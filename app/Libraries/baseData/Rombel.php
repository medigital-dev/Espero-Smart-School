<?php

namespace App\Libraries\baseData;

use App\Models\RombonganBelajarModel;

class Rombel
{
    protected $model;
    protected $request;

    public function __construct()
    {
        $this->request = service('request');
        $this->model = new RombonganBelajarModel();
    }

    private function baseQuery()
    {
        $this->model
            ->select([
                'rombongan_belajar.rombel_id as id',
                'rombongan_belajar.nama as rombel_nama',
                'tingkat_pendidikan as tingkat',
                'guru_pegawai.nama as gtk_nama',
                'guru_pegawai.guru_pegawai_id as gtk_id',
                'semester.kode as semester_kode',
                'semester.semester_id as semester_id',
                'semester.status',
                'ref_kurikulum.nama as kurikulum_nama',
                'ref_kurikulum.kode as kurikulum_kode',
                'ref_kurikulum.id as kurikulum_id',
                'ref_kurikulum.bg_color as kurikulum_warna',
            ])
            ->join('guru_pegawai', 'guru_pegawai.guru_pegawai_id = rombongan_belajar.ptk_id', 'left')
            ->join('semester', 'semester.kode = rombongan_belajar.semester_kode', 'left')
            ->join('ref_kurikulum', 'ref_kurikulum.ref_id = rombongan_belajar.kurikulum_id', 'left')
            ->orderBy('tingkat', 'ASC')
            ->orderBy('rombongan_belajar.nama', 'ASC')
        ;
    }

    public function getDataRombel(string $id = null, bool $aktif = false)
    {
        $this->baseQuery();
        if ($aktif) $this->model->where('semester.status', true);
        if ($id) return $this->model->where('rombongan_belajar.rombel_id', $id)->first();
        return $this->model->findAll();
    }

    public function getDataRombelPd(string $idPd, bool $aktif = false)
    {
        $this->baseQuery();
        $this->model
            ->select([
                'anggota_rombongan_belajar.peserta_didik_id',
                'ref_jenis_registrasi.nama as registrasi_nama',
                'ref_jenis_registrasi.kode as registrasi_kode',
                'ref_jenis_registrasi.id as registrasi_id',
                'ref_jenis_registrasi.bg_color as registrasi_warna',
            ])
            ->join('anggota_rombongan_belajar', 'anggota_rombongan_belajar.rombel_id = rombongan_belajar.rombel_id', 'left')
            ->join('ref_jenis_registrasi', 'ref_jenis_registrasi.ref_id = anggota_rombongan_belajar.jenis_registrasi_rombel', 'left')
            ->where('anggota_rombongan_belajar.peserta_didik_id', $idPd);
        if ($aktif) $this->model->where('semester.status', true);
        return $this->model->findAll();
    }

    /**
     * Mencari rombel terakhir peserta didik
     * @param string $idPesertaDidik ID Unik peserta didik
     * @return string Nama rombel
     * @return null Jika tidak ditemukan
     */
    public function rombel(string $idPesertaDidik): string|null
    {
        $c = $this->getDataRombelPd($idPesertaDidik, true);
        return $c ? $c[0]['rombel_nama'] : null;
    }
}
