<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\KelulusanPdModel;
use App\Models\MutasiPdModel;
use CodeIgniter\API\ResponseTrait;

class Kelulusan extends BaseController
{
    use ResponseTrait;

    protected $model;
    public function __construct()
    {
        helper(['indonesia', 'string', 'referensi']);

        $this->model = new KelulusanPdModel();
        $this->model->select([
            'kelulusan_id as id',
            'peserta_didik_id',
            'kurikulum',
            'nomor_ijazah',
            'penandatangan',
            'tanggal'
        ]);
    }

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $data = $this->model->where('peserta_didik_id', $id)->first();
        if (!$data) return $this->respond(false);
        $data['tanggal'] = tanggal($data['tanggal'], 'd/m/Y');
        return $this->respond($data);
    }

    public function create()
    {
        $mMutasi = new MutasiPdModel();
        $mMutasi->join('peserta_didik', 'peserta_didik.peserta_didik_id = mutasi_pd.peserta_didik_id', 'left');
        $mKelulusan = new KelulusanPdModel();
        $mKelulusan->join('peserta_didik', 'peserta_didik.peserta_didik_id = kelulusan.peserta_didik_id', 'left');

        $peserta_didik_id = $this->request->getPost('peserta_didik_id');
        $setTagl = date_create_from_format('d/m/Y', $this->request->getPost('tanggal'));
        $tanggal = date_format($setTagl, 'Y-m-d');
        $alasan = $this->request->getPost('alasan');
        $sekolah_tujuan = $this->request->getPost('sekolah_tujuan');
        $kurikulum = $this->request->getPost('kurikulum');
        $nomor_ijazah = $this->request->getPost('nomor_ijazah');
        $penandatangan = $this->request->getPost('penandatangan');

        $setMutasi = [
            'peserta_didik_id' => $peserta_didik_id,
            'tanggal' => $tanggal,
            'alasan' => $alasan,
            'sekolah_tujuan' => $sekolah_tujuan,
            'jenis' => saveJenisMutasi('Lulus'),
        ];
        $cMutasi = $mMutasi->where('mutasi_pd.peserta_didik_id', $peserta_didik_id)->first();
        if ($cMutasi) $setMutasi['id'] = $cMutasi['id'];
        else $setMutasi['mutasi_id'] = unik($mMutasi, 'mutasi_id');
        if (!$mMutasi->save($setMutasi)) return $this->fail('Mutasi peserta didik an <strong>' . $cMutasi['nama'] . '</strong> gagal disimpan.');

        $setKelulusan = [
            'peserta_didik_id' => $peserta_didik_id,
            'tanggal' => $tanggal,
            'alasan' => $alasan,
            'sekolah_tujuan' => $sekolah_tujuan,
            'kurikulum' => $kurikulum,
            'nomor_ijazah' => $nomor_ijazah,
            'penandatangan' => $penandatangan,
        ];
        $cKelulusan = $mKelulusan->where('kelulusan.peserta_didik_id', $peserta_didik_id)->first();
        if ($cKelulusan) $setKelulusan['id'] = $cKelulusan['id'];
        else $setKelulusan['kelulusan_id'] = unik($mKelulusan, 'kelulusan_id');
        if (!$mKelulusan->save($setKelulusan)) return $this->fail('Kelulusan peserta didik gagal disimpan.');

        return $this->respond(['status' => true, 'message' => 'Data kelulusan peserta didik berhasil disimpan.']);
    }
}
