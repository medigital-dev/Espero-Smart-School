<?php

namespace App\Libraries\baseData;

use App\Models\RombonganBelajarModel;

class Rombel
{
    private $model;
    private $request;
    private $query;

    public function __construct()
    {
        $this->model = new RombonganBelajarModel();
        $this->request = service('request');
        $this->query = $this->baseQuery();
    }

    private function baseQuery()
    {
        $this->model
            ->select([
                'rombongan_belajar.rombel_id as id',
                'rombongan_belajar.nama',
                'tingkat_pendidikan as tingkat',
                'guru_pegawai.nama as gtk_nama',
                'guru_pegawai.guru_pegawai_id as gtk_id',
                'semester.kode as semester_kode',
                'semester.semester_id as semester_id',
                'semester.status',
            ])
            ->join('guru_pegawai', 'guru_pegawai.guru_pegawai_id = rombongan_belajar.ptk_id', 'left')
            ->join('semester', 'semester.kode = rombongan_belajar.semester_kode', 'left')
            ->join('ref_kurikulum', 'ref_kurikulum.ref_id = rombongan_belajar.kurikulum_id', 'left')
            ->orderBy('tingkat', 'ASC')
            ->orderBy('nama', 'ASC')
        ;

        $key = $this->request->getVar('key');
        if ($key) $this->model->like('rombongan_belajar.nama', $key);

        return $this->model;
    }

    public function getDataRombel(string $id = null, bool $aktif = false)
    {
        if ($aktif) $this->query->where('semester.status', true);
        if ($id) return $this->query->where('rombongan_belajar.rombel_id', $id)->first();
        return $this->query->findAll();
    }

    public function getDataRombelPd(string $idPd, bool $aktif = false)
    {
        $query = $this->query
            ->select('peserta_didik.peserta_didik_id')
            ->join('anggota_rombongan_belajar', 'anggota_rombongan_belajar.rombel_id = rombongan_belajar.rombel_id', 'left')
            ->join('ref_jenis_registrasi', 'ref_jenis_registrasi.ref_id = anggota_rombongan_belajar.jenis_registrasi_rombel', 'left')
            ->where('peserta_didik_id', $idPd);
        if ($aktif) $query->where('semester.status', true);
        return $query->findAll();
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
        return $c ? $c[0]['nama'] : null;
    }
}
