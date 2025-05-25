<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\RefAgamaModel;
use App\Models\RefJenisMutasiModel;
use App\Models\RefJenisRegistrasiModel;
use CodeIgniter\API\ResponseTrait;

class Referensi extends BaseController
{
    use ResponseTrait;

    protected $dataAgama;

    public function __construct()
    {
        $this->dataAgama = service('referensi');
    }

    public function get(string $type, string $id = null)
    {
        $key = $this->request->getGet('key');
        switch ($type) {
            case 'jenisMutasi':
                $model = new RefJenisMutasiModel();
                $model->select(['ref_id as id', 'nama', 'warna']);
                break;

            case 'jenisRegistrasi':
                $model = new RefJenisRegistrasiModel();
                $model->select(['ref_id as id', 'nama', 'warna']);
                break;

            case 'agama':
                $model = new RefAgamaModel();
                $model->select(['ref_id as id', 'nama']);
                break;

            case 'jenisKelamin':
                $model = new RefJenisKelaminModel();
                break;

            default:
                return null;
                break;
        }
        if ($id) return $this->respond($model->where('ref_id', $id)->first());
        if ($key)
            $model->like('nama', $key);
        return $this->respond($model->findAll());
    }
}
