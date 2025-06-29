<?php

namespace App\Libraries;

use App\Models\RefAgamaModel;
use App\Models\RefBidangPrestasiModel;
use App\Models\RefHubunganKeluargaModel;
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
use App\Models\RefTingkatPrestasiModel;
use App\Models\RefTransportasiModel;
use InvalidArgumentException;

class Referensi
{
    protected $model;

    public function __construct()
    {
        helper('string');
    }

    // private function model($typeReferensi)
    // {
    //     switch ($typeReferensi) {
    //         case 'jenisMutasi':
    //             $this->model = new RefJenisMutasiModel();
    //             break;

    //         case 'jenisRegistrasi':
    //             $this->model = new RefJenisRegistrasiModel();
    //             break;

    //         case 'agama':
    //             $this->model = new RefAgamaModel();
    //             break;

    //         case 'jenisKelamin':
    //             $this->model = new RefJenisKelaminModel();
    //             break;

    //         case 'alatTransportasi':
    //             $this->model = new RefTransportasiModel();
    //             break;

    //         case 'pekerjaan':
    //             $this->model = new RefPekerjaanModel();
    //             break;

    //         case 'pendidikan':
    //             $this->model = new RefPendidikanModel();
    //             break;

    //         case 'penghasilan':
    //             $this->model = new RefPenghasilanModel();
    //             break;

    //         case 'jenisTinggal':
    //             $this->model = new RefJenisTinggalModel();
    //             break;

    //         case 'satuan':
    //             $this->model = new RefSatuanModel();
    //             break;

    //         case 'jenisBeasiswa':
    //             $this->model = new RefJenisBeasiswaModel();
    //             break;

    //         case 'jenisKebutuhanKhusus':
    //             $this->model = new RefJenisKebutuhanKhususModel();
    //             break;

    //         case 'jenisKesejahteraan':
    //             $this->model = new RefJenisKesejahteraanModel();
    //             break;

    //         case 'kurikulum':
    //             $this->model = new RefKurikulumModel();
    //             break;

    //         case 'bidangPrestasi':
    //             $this->model = new RefBidangPrestasiModel();
    //             break;

    //         case 'tingkatPrestasi':
    //             $this->model = new RefTingkatPrestasiModel();
    //             break;

    //         default:
    //             throw new InvalidArgumentException('Parameter $typeReferensi tidak ditemukan.');
    //             break;
    //     }
    // }

    public function saveTingkatPrestasi(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefTingkatPrestasiModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi tingkat prestasi dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveSatuan(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefSatuanModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi satuan dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveKurikulum(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefKurikulumModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi kurikulum dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveJenisTinggal(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefJenisTinggalModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi jenis tinggal dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveJenisKesejahteraan(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefJenisKesejahteraanModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi jenis kesejahteraan dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveJenisKelamin(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefJenisKelaminModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi jenis kelamin dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveAgama(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefAgamaModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi agama dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveBidangPrestasi(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefBidangPrestasiModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi bidang prestasi dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveJenisKebutuhanKhusus(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefJenisKebutuhanKhususModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi jenis kebutuhan khusus dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveJenisBeasiswa(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefJenisBeasiswaModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi jenis beasiswa dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function savePekerjaan(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefPekerjaanModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi pekerjaan dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function savePendidikan(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefPendidikanModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi pendidikan dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function savePenghasilan(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefPenghasilanModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi penghasilan dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveTransportasi(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefTransportasiModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi alat transportasi dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveJenisRegistrasi(string $nama, array $set = [])
    {
        $model = new RefJenisRegistrasiModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi jenis registrasi dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function getAgama(string $id = null)
    {
        $model = new RefAgamaModel();
        $model->select([
            'ref_id as id',
            'nama'
        ]);
        if ($id)
            return $model->where('ref_id', $id)->first();
        else
            return $model->findAll();
    }

    public function saveJenisMutasi(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefJenisMutasiModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi jenis mutasi dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveHubunganKeluarga(string $nama, array $set = [])
    {
        if ($nama == '') throw new InvalidArgumentException('Parameter $nama tidak boleh kosong.');
        $model = new RefHubunganKeluargaModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi hubungan keluarga dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }
}
