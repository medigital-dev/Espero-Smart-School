<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\MutasiPdModel;
use CodeIgniter\API\ResponseTrait;

class MutasiPd extends BaseController
{
    use ResponseTrait;

    protected $model;

    public function __construct()
    {
        helper('string');
        $this->model = new MutasiPdModel();
    }

    public function set()
    {
        $set = [
            'mutasi_id' => unik($this->model, 'mutasi_id'),
            'peserta_didik_id' => $this->request->getPost('peserta_didik_id'),
            'jenis' => $this->request->getPost('jenis'),
            'tanggal' => date_format(date_create_from_format('d/m/Y', $this->request->getPost('tanggal')), 'Y-m-d'),
            'alasan' => $this->request->getPost('alasan'),
            'sekolah_tujuan' => $this->request->getPost('sekolah_tujuan'),
            'nomor_ijazah_lulus' => $this->request->getPost('nomor_ijazah_lulus'),
        ];
        if (!$this->model->save($set)) return $this->fail('Error: Mutasi gagal disimpan.');
        return $this->respond(['message' => 'Mutasi berhasil disimpan.', 'data' => $set]);
    }
}
