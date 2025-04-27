<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\RombonganBelajarModel;
use CodeIgniter\API\ResponseTrait;

class Rombel extends BaseController
{
    use ResponseTrait;

    protected $model;

    public function __construct()
    {
        $this->model = new RombonganBelajarModel();
    }

    public function get()
    {
        $id = $this->request->getVar('id');
        $key = $this->request->getVar('key');

        $this->model->select(['rombel_id as id', 'nama', 'tingkat_pendidikan as tingkat', 'semester_id', 'ptk_id'])
            ->orderBy('tingkat', 'ASC')
            ->orderBy('nama', 'ASC');
        if ($key) $this->model->like('nama');

        if ($id) {
            $this->model->where('rombel_id', $id);
            $result = $this->model->first();
            if (!$result) return $this->failNotFound('Not Found', 404, 'Data rombel tidak ditemukan.');
        } else
            $result = $this->model->findAll();

        return $this->respond($result);
    }
}
