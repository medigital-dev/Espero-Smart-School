<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\RefAgamaModel;
use App\Models\RefJenisKelaminModel;
use App\Models\RefJenisMutasiModel;
use App\Models\RefJenisRegistrasiModel;
use App\Models\RefJenisTinggalModel;
use App\Models\RefPekerjaanModel;
use App\Models\RefPendidikanModel;
use App\Models\RefPenghasilanModel;
use App\Models\RefTransportasiModel;
use CodeIgniter\API\ResponseTrait;

class Referensi extends BaseController
{
    use ResponseTrait;

    protected $dataAgama;

    public function __construct()
    {
        $this->dataAgama = service('referensi');
    }

    public function index()
    {
        $key = $this->request->getGet('key');
        $type = $this->request->getGet('type');
        switch ($type) {
            case 'jenisMutasi':
                $model = new RefJenisMutasiModel();
                break;

            case 'jenisRegistrasi':
                $model = new RefJenisRegistrasiModel();
                break;

            case 'agama':
                $model = new RefAgamaModel();
                break;

            case 'jenisKelamin':
                $model = new RefJenisKelaminModel();
                break;

            case 'alatTransportasi':
                $model = new RefTransportasiModel();
                break;

            case 'pekerjaan':
                $model = new RefPekerjaanModel();
                break;

            case 'pendidikan':
                $model = new RefPendidikanModel();
                break;

            case 'penghasilan':
                $model = new RefPenghasilanModel();
                break;

            case 'jenisTinggal':
                $model = new RefJenisTinggalModel();
                break;

            default:
                return $this->respond(null);
                break;
        }
        $model->select(['ref_id as id', 'nama', 'warna', 'kode']);
        if ($key)
            $model->like('nama', $key);
        return $this->respond($model->findAll());
    }
}
