<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Libraries\Referensi as LibrariesReferensi;
use App\Models\RefAgamaModel;
use App\Models\RefJenisBeasiswaModel;
use App\Models\RefJenisKebutuhanKhususModel;
use App\Models\RefJenisKelaminModel;
use App\Models\RefJenisKesejahteraanModel;
use App\Models\RefJenisMutasiModel;
use App\Models\RefJenisRegistrasiModel;
use App\Models\RefJenisTinggalModel;
use App\Models\RefPekerjaanModel;
use App\Models\RefPendidikanModel;
use App\Models\RefPenghasilanModel;
use App\Models\RefSatuanModel;
use App\Models\RefTransportasiModel;
use CodeIgniter\API\ResponseTrait;

class Referensi extends BaseController
{
    use ResponseTrait;

    protected $ref;

    public function __construct()
    {
        helper('referensi');
        $this->ref = new LibrariesReferensi();
    }

    private function typeReferensi($typeReferensi)
    {
        switch ($typeReferensi) {
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

            case 'satuan':
                $model = new RefSatuanModel();
                break;

            case 'jenisBeasiswa':
                $model = new RefJenisBeasiswaModel();
                break;

            case 'jenisKebutuhanKhusus':
                $model = new RefJenisKebutuhanKhususModel();
                break;

            case 'jenisKesejahteraan':
                $model = new RefJenisKesejahteraanModel();
                break;

            default:
                return $this->respond(null);
                break;
        }

        return $model;
    }

    public function index()
    {
        $key = $this->request->getGet('key');
        $type = $this->request->getGet('type');
        $model = $this->typeReferensi($type);

        $model->select(['ref_id as id', 'nama', 'warna', 'kode']);
        if ($key)
            $model->like('nama', $key);
        return $this->respond($model->findAll());
    }

    public function show($type, $id = null)
    {
        return $this->respond($this->ref->get($type, $id));
    }
}
