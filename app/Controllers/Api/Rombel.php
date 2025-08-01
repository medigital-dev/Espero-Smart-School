<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Libraries\baseData\Rombel as BaseDataRombel;
use App\Models\RombonganBelajarModel;
use CodeIgniter\API\ResponseTrait;

class Rombel extends BaseController
{
    use ResponseTrait;

    protected $model;
    protected $lib;

    public function __construct()
    {
        $this->model = new RombonganBelajarModel();
        $this->lib = new BaseDataRombel();
    }

    public function get()
    {
        $id = $this->request->getVar('id');
        $key = $this->request->getVar('key');

        $this->model->select(['rombel_id as id', 'nama', 'tingkat_pendidikan as tingkat', 'semester_kode', 'ptk_id'])
            ->join('semester', 'semester.kode = rombongan_belajar.semester_kode', 'left')
            ->where('status', true)
            ->orderBy('tingkat', 'ASC')
            ->orderBy('nama', 'ASC');
        if ($key) $this->model->like('nama');

        if ($id) {
            $this->model->where('rombel_id', $id);
            $result = $this->model->first();
            if (!$result) return $this->failNotFound('Not Found', 404, 'Data rombel tidak ditemukan.');
        } else
            $result = $this->model->findAll();

        return $this->respond($this->lib
            // ->withFilter()
            ->getDataRombel(null, true) ?? []);
        return $this->respond($result);
    }
}
