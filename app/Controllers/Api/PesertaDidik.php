<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Libraries\DataPesertaDidik;
use App\Models\PassFotoModel;
use App\Models\PesertaDidikModel;
use CodeIgniter\API\ResponseTrait;

class PesertaDidik extends BaseController
{
    use ResponseTrait;

    protected $model;

    public function __construct()
    {
        helper(['indonesia', 'string', 'files']);
        $this->model = new PesertaDidikModel();
        $this->model
            ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('anggota_rombongan_belajar', 'anggota_rombongan_belajar.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
            ->join('semester', 'semester.semester_id = rombongan_belajar.semester_id', 'left')
            ->join('pass_foto', 'pass_foto.foto_id = peserta_didik.foto_id', 'left')
            ->join('mutasi_pd', 'mutasi_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('orangtua_wali_pd', 'orangtua_wali_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('orangtua_wali as ayah', 'ayah.orangtua_id = orangtua_wali_pd.ayah_id', 'left')
            ->join('orangtua_wali as ibu', 'ibu.orangtua_id = orangtua_wali_pd.ibu_id', 'left')
            ->join('kontak', 'kontak.nik = peserta_didik.nik', 'left')
            ->join('alamat_tinggal', 'alamat_tinggal.nik = peserta_didik.nik', 'left')
            ->join('ref_agama', 'ref_agama.ref_id = peserta_didik.agama_id', 'left')
            ->join('ref_jenis_kelamin', 'ref_jenis_kelamin.ref_id = peserta_didik.jenis_kelamin', 'left')
            ->join('ref_jenis_mutasi', 'ref_jenis_mutasi.ref_id = mutasi_pd.jenis', 'left')
            ->join('ref_alat_transportasi', 'ref_alat_transportasi.ref_id = alamat_tinggal.alat_transportasi_id', 'left')
            ->join('ref_jenis_tinggal', 'ref_jenis_tinggal.ref_id = alamat_tinggal.jenis_tinggal_id', 'left')
        ;
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
        $type = $this->request->getGet('type');
        if ($id)
            $this->model->where('peserta_didik.peserta_didik_id', $id);

        switch ($type) {
            case 'profil':
                $this->model->select([
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
                break;

            case 'identitas':
                $this->model->select([
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
                break;

            case 'alamat':
                $this->model->select([
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
                break;

            default:
                # code...
                break;
        }

        return $this->respond($this->model->first());
    }

    public function saveIdentitas($id)
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

        $this->model->select('peserta_didik.id');
        $result = $this->model->where('peserta_didik.peserta_didik_id', $id)->first();
        if ($result)
            $set['id'] = $result['id'];

        if (!$this->model->save($set)) return $this->fail('Data peserta didik gagal disimpan.');

        return $this->respond(['status' => true, 'message' => 'Data peserta didik berhasil disimpan.']);
    }
}
