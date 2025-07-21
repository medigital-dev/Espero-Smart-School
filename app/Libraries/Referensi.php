<?php

namespace App\Libraries;

use App\Models\RefAgamaModel;
use App\Models\RefAlasanPipModel;
use App\Models\RefBankModel;
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
    public function __construct()
    {
        helper('string');
    }

    public function saveTingkatPrestasi(string $nama, array $set = [])
    {
        if ($nama == '') return '';
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
        if ($nama == '') return '';
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
        if ($nama == '') return '';
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
        if ($nama == '') return '';
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
        if ($nama == '') return '';
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
        if ($nama == '') return '';
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
        if ($nama == '') return '';
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
        if ($nama == '') return '';
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
        if ($nama == '') return '';
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
        if ($nama == '') return '';
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
        if ($nama == '') return '';
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
        if ($nama == '') return '';
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
        if ($nama == '') return '';
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
        if ($nama == '') return '';
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
        if ($nama == '') return '';
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

    public function saveJenisMutasi(string $nama, array $set = [])
    {
        if ($nama == '') return '';
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
        if ($nama == '') return '';
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

    public function saveAlasanPip(string $nama, array $set = [])
    {
        if ($nama == '') return '';
        $model = new RefAlasanPipModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi alasan layak PIP dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }

    public function saveBank(string $nama, array $set = [])
    {
        if ($nama == '') return '';
        $model = new RefBankModel();
        $cek = $model->where('nama', $nama)->first();
        if ($cek) $id = $cek['ref_id'];
        else {
            if (!isset($set['ref_id']))
                $set['ref_id'] = idUnik($model, 'ref_id');
            $set['nama'] = $nama;
            if (!$model->save($set)) throw new InvalidArgumentException('Data referensi Bank dengan nama ' . $nama . ' gagal disimpan.');
            $id = $set['ref_id'];
        }
        return $id;
    }
}
