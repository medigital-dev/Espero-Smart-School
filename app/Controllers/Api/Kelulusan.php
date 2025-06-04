<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\AnggotaRombelModel;
use App\Models\KelulusanPdModel;
use App\Models\MutasiPdModel;
use App\Models\PesertaDidikModel;
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
        $mPd = new PesertaDidikModel();
        $mMutasi = new MutasiPdModel();
        $mKelulusan = new KelulusanPdModel();
        $mAnggotaRombel = new AnggotaRombelModel();
        $mAnggotaRombel
            ->select(['tingkat_pendidikan as tingkat'])
            ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
            ->join('semester', 'semester.semester_id = rombongan_belajar.semester_id')
            ->where('semester.status', true);

        $peserta_didik_id = $this->request->getPost('peserta_didik_id');
        $setTagl = date_create_from_format('d/m/Y', $this->request->getPost('tanggal'));
        $tanggal = date_format($setTagl, 'Y-m-d');
        $alasan = $this->request->getPost('alasan');
        $sekolah_tujuan = $this->request->getPost('sekolah_tujuan');
        $kurikulum = $this->request->getPost('kurikulum');
        $nomor_ijazah = $this->request->getPost('nomor_ijazah');
        $penandatangan = $this->request->getPost('penandatangan');

        $cPd = $mPd->where('peserta_didik_id', $peserta_didik_id)->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');

        $setMutasi = [
            'peserta_didik_id' => $peserta_didik_id,
            'tanggal' => $tanggal,
            'alasan' => $alasan,
            'sekolah_tujuan' => $sekolah_tujuan,
            'jenis' => saveJenisMutasi('Lulus'),
        ];
        $mMutasi->join('ref_jenis_mutasi', 'ref_jenis_mutasi.ref_id = mutasi_pd.jenis', 'left');
        $cMutasi = $mMutasi->where('mutasi_pd.peserta_didik_id', $peserta_didik_id)->first();
        if ($cMutasi && $cMutasi['nama'] == 'Lulus') $setMutasi['id'] = $cMutasi['id'];
        else if ($cMutasi && $cMutasi['nama'] !== 'Lulus') return $this->fail('Data kelulusan hanya bisa disimpan jika jenis mutasi <strong>LULUS</strong>. Terdeteksi status mutasi Peserta didik an <strong>' . $cPd['nama'] . '</strong> adalah ' . $cMutasi['nama']);
        else $setMutasi['mutasi_id'] = idUnik($mMutasi, 'mutasi_id');

        $cTingkat = $mAnggotaRombel->where('anggota_rombongan_belajar.peserta_didik_id', $peserta_didik_id)->first();
        if ($cTingkat && (int) $cTingkat['tingkat'] !== 9) return $this->fail('Kelulusan hanya bisa dilakukan pada tingkat pendidikan 9. Terdeteksi peserta didik an. <strong>' . $cPd['nama'] . '</strong> masih berada ditingkat ' . $cTingkat['tingkat']);

        if (!$mMutasi->save($setMutasi)) return $this->fail('Mutasi peserta didik an <strong>' . $cPd['nama'] . '</strong> gagal disimpan.');

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
        else $setKelulusan['kelulusan_id'] = idUnik($mKelulusan, 'kelulusan_id');
        if (!$mKelulusan->save($setKelulusan)) return $this->fail('Kelulusan peserta didik an <strong>' . $cPd['nama'] . '</strong> gagal disimpan.');

        return $this->respond(['status' => true, 'message' => 'Data mutasi peserta didik an <strong>' . $cPd['nama'] . '</strong> berhasil disimpan.']);
    }

    public function delete($id = null)
    {
        $mKelulusan = new KelulusanPdModel();
        $mPd = new PesertaDidikModel();
        if (!$id) return $this->fail('ID Peserta didik dibutuhkan.');
        $cPd = $mPd->where('peserta_didik_id', $id)->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        $cKelulusan = $mKelulusan->where('peserta_didik_id', $id)->first();
        if (!$cKelulusan) return $this->fail('Data kelulusan an <strong>' . $cPd['nama'] . '</strong> tidak ditemukan.');
        if (!$mKelulusan->delete($cKelulusan['id'])) return $this->fail('Penghapusan data kelulusan peserta didik an <strong>' . $cPd['nama'] . '</strong> gagal.');
        return $this->respond([
            'status' => true,
            'data' => [
                'id' => $id
            ],
            'message' => 'Kelulusan peserta didik an <strong>' . $cPd['nama'] . '</strong> berhasil di hapus.'
        ]);
    }
}
