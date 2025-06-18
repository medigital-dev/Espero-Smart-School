<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Libraries\DataPesertaDidik;
use App\Models\PassFotoModel;
use App\Models\PesertaDidikModel;
use CodeIgniter\API\ResponseTrait;

class PesertaDidik extends BaseController
{
    use ResponseTrait;

    protected $model;

    public function __construct()
    {
        helper(['indonesia', 'string', 'files']);
        $this->model = new PesertaDidikModel();
        $this->model
            ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('anggota_rombongan_belajar', 'anggota_rombongan_belajar.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
            ->join('semester', 'semester.semester_id = rombongan_belajar.semester_id', 'left')
            ->join('pass_foto', 'pass_foto.foto_id = peserta_didik.foto_id', 'left')
            ->join('mutasi_pd', 'mutasi_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('orangtua_wali_pd', 'orangtua_wali_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('orangtua_wali as ayah', 'ayah.orangtua_id = orangtua_wali_pd.ayah_id', 'left')
            ->join('orangtua_wali as ibu', 'ibu.orangtua_id = orangtua_wali_pd.ibu_id', 'left')
            ->join('kontak', 'kontak.nik = peserta_didik.nik', 'left')
            ->join('alamat_tinggal', 'alamat_tinggal.nik = peserta_didik.nik', 'left')
            ->join('ref_agama', 'ref_agama.ref_id = peserta_didik.agama_id', 'left')
            ->join('ref_jenis_kelamin', 'ref_jenis_kelamin.ref_id = peserta_didik.jenis_kelamin', 'left')
            ->join('ref_jenis_mutasi', 'ref_jenis_mutasi.ref_id = mutasi_pd.jenis', 'left')
            ->join('ref_alat_transportasi', 'ref_alat_transportasi.ref_id = alamat_tinggal.alat_transportasi_id', 'left')
            ->join('ref_jenis_tinggal', 'ref_jenis_tinggal.ref_id = alamat_tinggal.jenis_tinggal_id', 'left')
        ;
    }

    public function index($status = null)
    {
        $data = new DataPesertaDidik;
        if ($status == 'active')
            $data->active();
        return $this->respond($data->withFilter()->toSelect2());
    }

    public function get($status = null)
    {
        $data = new DataPesertaDidik;
        if ($status == 'active')
            $data->active();
        return $this->respond($data->withFilter()->toSelect2());
    }
}
