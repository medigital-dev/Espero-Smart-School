<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Libraries\DataPesertaDidik;
use App\Models\PesertaDidikModel;
use CodeIgniter\API\ResponseTrait;

class PesertaDidik extends BaseController
{
    use ResponseTrait;

    protected $model;

    public function __construct()
    {
        helper(['indonesia', 'text']);
        $this->model = new PesertaDidikModel();
        $this->model->select(['peserta_didik.peserta_didik_id', 'peserta_didik.nama', 'nisn', 'nipd', 'nik', 'nomor_akte', 'nomor_kk', '']);
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

    public function show($id = null)
    {
        return $this->respond(service('getPesertaDidik')->forAdmin()->find($id));
    }
}
