<?php 

namespace App\Controllers\Api\Public\v1;

use App\Controllers\BaseController;
use App\Models\GuruPegawaiModel;
use CodeIgniter\API\ResponseTrait;

class Guru extends BaseController {
    use ResponseTrait;

    private function model() {
        $model = new GuruPegawaiModel();
        $model
        ->select([
            'guru_pegawai.guru_pegawai_id as id',
            'guru_pegawai.nama','guru_pegawai.tempat_lahir','guru_pegawai.tanggal_lahir',
            'guru_pegawai.nik','guru_pegawai.nama_ibu_kandung',
            'ref_jenis_kelamin.kode as jk_kode',
            'ref_jenis_kelamin.nama as jk_nama',
        ])
        ->join()
    }

    public function datatable() {
        
    }
}