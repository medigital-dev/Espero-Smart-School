<?php

namespace App\Controllers\Api\BukuInduk;

use App\Controllers\BaseController;
use App\Libraries\DataPesertaDidik;
use App\Models\AlamatModel;
use App\Models\OrangtuaWaliModel;
use App\Models\OrtuWaliPdModel;
use App\Models\PassFotoModel;
use App\Models\PesertaDidikModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class PesertaDidik extends BaseController
{
    use ResponseTrait;

    protected $baseData;
    protected $mPesertaDidik;

    public function __construct()
    {
        helper(['indonesia', 'string', 'files']);
        $this->baseData = new DataPesertaDidik();
        $this->mPesertaDidik = new PesertaDidikModel();
    }

    public function showProfil($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $this->baseData->select([
            'peserta_didik.nama',
            'nisn',
            'nipd',
            'peserta_didik.nik',
            'peserta_didik.tanggal_lahir as tanggal_lahir',
            'peserta_didik.tempat_lahir as tempat_lahir',
            'rombongan_belajar.nama as kelas',
            'ibu.nama as ibu',
            'kontak.hp',
            'alamat_tinggal.dusun',
            'alamat_tinggal.rt',
            'alamat_tinggal.rw',
            'alamat_tinggal.desa',
            'alamat_tinggal.kecamatan',
            'pass_foto.path as foto_src',
            'ref_jenis_mutasi.nama as jenis_mutasi',
            'ref_jenis_kelamin.nama as jenis_kelamin',
        ]);
        return $this->respond($this->baseData->find($id));
    }

    public function showIdentitas($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $this->baseData->select([
            'peserta_didik.nama',
            'peserta_didik.tempat_lahir as tempat_lahir',
            'peserta_didik.tanggal_lahir as tanggal_lahir',
            'nisn',
            'nomor_akte',
            'peserta_didik.nik',
            'nomor_kk',
            'ref_agama.ref_id as agama_id',
            'ref_agama.nama as agama_str',
            'ref_jenis_kelamin.ref_id as jenis_kelamin_id',
            'ref_jenis_kelamin.nama as jenis_kelamin_str',
        ]);
        return $this->respond($this->baseData->find($id));
    }

    public function showAlamat($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $this->baseData->select([
            'alamat_jalan',
            'rt',
            'rw',
            'dusun',
            'desa',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'kode_pos',
            'lintang',
            'bujur',
            'jarak_rumah',
            'waktu_tempuh',
            'ref_alat_transportasi.ref_id as transportasi_id',
            'ref_alat_transportasi.nama as transportasi_str',
            'ref_jenis_tinggal.ref_id as tinggal_id',
            'ref_jenis_tinggal.nama as tinggal_str',
        ]);
        return $this->respond($this->baseData->find($id));
    }

    public function saveIdentitas($id): ResponseInterface
    {
        if (!$id) return $this->fail('Id peserta didik diperlukan.');

        $set = $this->request->getVar();
        $files = $this->request->getFile('file');

        if ($files) {
            $passfoto = uploadFile($files, ['jpg', 'jpeg', 'png'], 'pass-foto');
            if ($passfoto) {
                $mPassfoto = new PassFotoModel();
                $setFoto = [
                    'foto_id' => unik($mPassfoto, 'foto_id'),
                    'filename' => $passfoto['data']['filename'],
                    'path' => $passfoto['data']['path'],
                ];
                if (!$mPassfoto->save($setFoto)) return $this->fail('Pass foto gagal disimpan.');
                $set['foto_id'] = $setFoto['foto_id'];
            }
        }

        $this->mPesertaDidik->select('peserta_didik.id');
        $result = $this->mPesertaDidik->where('peserta_didik.peserta_didik_id', $id)->first();
        if ($result)
            $set['id'] = $result['id'];

        if (!$this->mPesertaDidik->save($set)) return $this->fail('Data peserta didik gagal disimpan.');

        return $this->respond(['status' => true, 'message' => 'Data peserta didik berhasil disimpan.']);
    }

    public function saveAlamat($id): ResponseInterface
    {
        $mAlamat = new AlamatModel();

        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $set = $this->request->getPost();

        $this->mPesertaDidik->select('peserta_didik.nik');
        $result = $this->mPesertaDidik->where('peserta_didik.peserta_didik_id', $id)->first();
        if (!$result) return $this->fail('Peserta didik tidak ditemukan.');
        $cAlamat = $mAlamat->where('nik', $result['nik'])->first();
        if ($cAlamat) $set['id'] = $cAlamat['id'];
        else {
            $set['alamat_id'] = unik($mAlamat, 'alamat_id');
            $set['nik'] = $result['nik'];
        }
        if (!$mAlamat->save($set)) return $this->fail('Alamat peserta didik gagal disimpan.');

        return $this->respond(['status' => true, 'message' => 'Alamat peserta didik berhasil disimpan.']);
    }

    public function showOrtuwaliPd($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');

        $this->baseData->select([
            'ayah_id',
            'ibu_id',
            'wali_id'
        ]);
        return $this->respond($this->baseData->find($id));
    }

    public function showOrtuwali($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Orangtua/Wali diperlukan');
        $mOrtuWali = new OrangtuaWaliModel();
        $response = $mOrtuWali
            ->select([
                'orangtua_id',
                'orangtua_wali.nama',
                'nik',
                'tempat_lahir',
                'tanggal_lahir',
                'jenis_kelamin',
                'agama_id',
                'pekerjaan_id',
                'pendidikan_id',
                'penghasilan_id',
                'ref_agama.nama as agama_str',
                'ref_pekerjaan.nama as pekerjaan_str',
                'ref_pendidikan.nama as pendidikan_str',
                'ref_penghasilan.nama as penghasilan_str',
            ])
            ->join('ref_agama', 'ref_agama.ref_id = orangtua_wali.agama_id', 'left')
            ->join('ref_pendidikan', 'ref_pendidikan.ref_id = orangtua_wali.pendidikan_id', 'left')
            ->join('ref_pekerjaan', 'ref_pekerjaan.ref_id = orangtua_wali.pekerjaan_id', 'left')
            ->join('ref_penghasilan', 'ref_penghasilan.ref_id = orangtua_wali.penghasilan_id', 'left')
            ->where('orangtua_id', $id)
            ->first();
        return $this->respond($response);
    }

    public function saveOrtuwali($id = null): ResponseInterface
    {
        $mOrtuWali = new OrangtuaWaliModel();

        $set = $this->request->getPost();

        if ($id) {
            $cOrtuwali = $mOrtuWali->where('orangtua_id', $id)->first();
            if ($cOrtuwali) $set['id'] = $cOrtuwali['id'];
        } else $set['orangtua_id'] = unik($mOrtuWali, 'orangtua_id');

        if (!$mOrtuWali->save($set)) return $this->fail('Data orangtua/wali gagal disimpan');

        return $this->respond(['status' => true, 'message' => 'Data peserta didik berhasil disimpan.', 'id' => $id ?? $set['orangtua_id']]);
    }

    public function saveOrtuwaliPd($id = null): ResponseInterface
    {
        $mOrtuwaliPd = new OrtuWaliPdModel();
        $set = $this->request->getPost();
        $cOrtuwaliPd = $mOrtuwaliPd->where('peserta_didik_id', $set['peserta_didik_id'])->first();
        if (!$cOrtuwaliPd) $set['ortupd_id'] = unik($mOrtuwaliPd, 'ortupd_id');
        else {
            $set['id'] = $cOrtuwaliPd['id'];
            $set['ortupd_id'] = $cOrtuwaliPd['ortupd_id'];
        }
        if (!$mOrtuwaliPd->save($set)) return $this->fail('Data orangtua/wali peserta didik gagal disimpan.');
        return $this->respond(['status' => true, 'message' => 'Data orangtua/wali peserta didik berhasil disimpan.', 'id' => $id ?? $set['ortupd_id']]);
    }
}
