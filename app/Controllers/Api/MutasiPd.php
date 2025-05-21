<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\KelulusanPdModel;
use App\Models\MutasiPdModel;
use App\Models\PesertaDidikModel;
use CodeIgniter\API\ResponseTrait;

class MutasiPd extends BaseController
{
    use ResponseTrait;

    protected $model;

    public function __construct()
    {
        helper(['string', 'indonesia']);
        $this->model = new MutasiPdModel();
        $this->model
            ->select(['peserta_didik.nama as nama', 'nisn', 'nipd', 'ref_jenis_mutasi.nama as jenis_mutasi', 'mutasi_pd.tanggal as tanggal_mutasi', 'alasan', 'sekolah_tujuan'])
            ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = mutasi_pd.peserta_didik_id', 'left')
            ->join('peserta_didik', 'peserta_didik.peserta_didik_id = mutasi_pd.peserta_didik_id', 'left')
            ->join('ref_jenis_mutasi', 'ref_jenis_mutasi.ref_id = mutasi_pd.jenis', 'left');
    }

    public function set()
    {
        $set = [
            'mutasi_id' => unik($this->model, 'mutasi_id'),
            'peserta_didik_id' => $this->request->getPost('peserta_didik_id'),
            'jenis' => $this->request->getPost('jenis'),
            'tanggal' => date_format(date_create_from_format('d/m/Y', $this->request->getPost('tanggal')), 'Y-m-d'),
            'alasan' => $this->request->getPost('alasan'),
            'sekolah_tujuan' => $this->request->getPost('sekolah_tujuan'),
            'nomor_ijazah_lulus' => $this->request->getPost('nomor_ijazah_lulus'),
        ];

        if (!$this->model->save($set)) return $this->fail('Error: Mutasi gagal disimpan.');
        return $this->respond(['message' => 'Mutasi berhasil disimpan.', 'data' => $set]);
    }

    public function show($id = null)
    {
        $mPd = new PesertaDidikModel();
        $cPd = $mPd->where('peserta_didik_id', $id)->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        if ($id) {
            $result = $this->model->where('peserta_didik.peserta_didik_id', $id)->first();
            if (!$result) return $this->fail('Mutasi peserta didik an <strong>' . $cPd['nama'] . '</strong> tidak ditemukan.');
            $result['nama'] = strtoupper($result['nama']);
            $result['tanggal_mutasi'] = tanggal($result['tanggal_mutasi'], 'd/m/Y');
            return $this->respond($result);
        }
    }

    public function delete($id)
    {
        $mPd = new PesertaDidikModel();
        $mMutasi = new MutasiPdModel();
        $mKelulusan = new KelulusanPdModel();

        $cPd = $mPd->where('peserta_didik_id', $id)->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        $mMutasi
            ->select('mutasi_pd.id')
            ->join('ref_jenis_mutasi', 'ref_jenis_mutasi.ref_id = mutasi_pd.jenis', 'left');
        $cMutasi = $mMutasi->where('peserta_didik_id', $id)->first();
        if (!$cMutasi) return $this->fail('Mutasi peserta didik an <strong>' . $cPd['nama'] . '</strong> tidak ditemukan.');
        if (!$mMutasi->delete($cMutasi['id'])) return $this->fail('Mutasi peserta didik an <strong>' . $cPd['nama'] . '</strong> gagal dibatalkan.');
        $mKelulusan->select('kelulusan.id');
        $cKelulusan = $mKelulusan->where('peserta_didik_id', $id)->first();
        if ($cKelulusan)
            if (!$mKelulusan->delete($cKelulusan['id'])) return $this->fail('Data kelulusan an <strong>' . $cPd['nama'] . '</strong> gagal dihapus.');

        return $this->respond(['status' => true, 'message' => 'Data kelulusan an <strong>' . $cPd['nama'] . '</strong> berhasil dihapus.']);
    }
}
