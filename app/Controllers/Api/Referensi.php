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
use App\Models\RefKurikulumModel;
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
        helper('string');
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

            case 'kurikulum':
                $model = new RefKurikulumModel();
                break;

            default:
                return $this->respond(null);
                break;
        }

        $model->select(['ref_id as id', 'nama', 'bg_color', 'kode']);
        return $model;
    }

    public function index()
    {
        $key = $this->request->getGet('key');
        $type = $this->request->getGet('type');
        $model = $this->typeReferensi($type);

        if ($key)
            $model->like('nama', $key);
        return $this->respond($model->findAll());
    }

    public function show($id = null)
    {
        $type = $this->request->getGet('type');
        if (!$type) return $this->failServerError('Tipe referensi diperlukan.');
        $model = $this->typeReferensi($type);
        return $this->respond($model->where('ref_id', $id)->first());
    }

    public function create()
    {
        $set = $this->request->getPost();
        $type = $this->request->getGet('type');
        if (!$type) return $this->failServerError('Tipe referensi diperlukan.');
        $model = $this->typeReferensi($type);
        if (!isset($set['ref_id']))
            $set['ref_id'] = idUnik($model, 'ref_id');
        if (!$model->save($set)) return $this->failServerError('Referensi gagal disimpan.');
        return $this->respond($set, 201, 'Referensi berhasil disimpan.');
    }
}
