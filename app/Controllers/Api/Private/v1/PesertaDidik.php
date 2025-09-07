<?php

namespace App\Controllers\Api\Private\v1;

use App\Controllers\BaseController;
use App\Models\PesertaDidikModel;
use CodeIgniter\API\ResponseTrait;

class PesertaDidik extends BaseController
{
    use ResponseTrait;

    private function model()
    {
        $model = new PesertaDidikModel();
        $model
            ->select([
                'peserta_didik.peserta_didik_id',
                'rombongan_belajar.nama as kelas',
                'peserta_didik.nama',
                'nipd',
                'nisn',
                'peserta_didik.nik',
                'ref_agama.nama as agama',
                'ref_jenis_kelamin.kode as jenis_kelamin',
                'peserta_didik.tempat_lahir',
                'peserta_didik.tanggal_lahir',
            ])
            ->join('anggota_rombongan_belajar', 'anggota_rombongan_belajar.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
            ->join('semester', 'semester.kode = anggota_rombongan_belajar.semester_kode', 'left')
            ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('ref_jenis_kelamin', 'ref_jenis_kelamin.ref_id = peserta_didik.jenis_kelamin', 'left')
            ->join('ref_agama', 'ref_agama.ref_id = peserta_didik.agama_id', 'left')
            ->where('semester.status', true)
        ;

        return $model;
    }
}
