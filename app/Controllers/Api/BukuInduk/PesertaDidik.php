<?php

namespace App\Controllers\Api\BukuInduk;

use App\Controllers\BaseController;
use App\Libraries\DataPesertaDidik;
use App\Models\AlamatModel;
use App\Models\BeasiswaModel;
use App\Models\KelulusanPdModel;
use App\Models\KesejahteraanModel;
use App\Models\KontakModel;
use App\Models\MutasiPdModel;
use App\Models\OrangtuaWaliModel;
use App\Models\OrtuWaliPdModel;
use App\Models\PassFotoModel;
use App\Models\PesertaDidikModel;
use App\Models\RegistrasiPesertaDidikModel;
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
                    'foto_id' => idUnik($mPassfoto, 'foto_id'),
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
            $set['alamat_id'] = idUnik($mAlamat, 'alamat_id');
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
            $cOrtuwali = $mOrtuWali->where('orangtua_id', $id)
                ->orWhere('nama', $set['nama'])->first();
            if ($cOrtuwali) $set['id'] = $cOrtuwali['id'];
        } else $set['orangtua_id'] = idUnik($mOrtuWali, 'orangtua_id');

        if (!$mOrtuWali->save($set)) return $this->fail('Data orangtua/wali gagal disimpan');

        return $this->respond(['status' => true, 'message' => 'Data peserta didik berhasil disimpan.', 'id' => $id ?? $set['orangtua_id']]);
    }

    public function saveOrtuwaliPd($id = null): ResponseInterface
    {
        $mOrtuwaliPd = new OrtuWaliPdModel();
        $set = $this->request->getPost();
        $cOrtuwaliPd = $mOrtuwaliPd->where('peserta_didik_id', $set['peserta_didik_id'])->first();
        if (!$cOrtuwaliPd) $set['ortupd_id'] = idUnik($mOrtuwaliPd, 'ortupd_id');
        else {
            $set['id'] = $cOrtuwaliPd['id'];
            $set['ortupd_id'] = $cOrtuwaliPd['ortupd_id'];
        }
        if (!$mOrtuwaliPd->save($set)) return $this->fail('Data orangtua/wali peserta didik gagal disimpan.');
        return $this->respond(['status' => true, 'message' => 'Data orangtua/wali peserta didik berhasil disimpan.', 'id' => $id ?? $set['ortupd_id']]);
    }

    public function showKontak($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $this->baseData->select([
            'telepon',
            'hp',
            'email',
            'website'
        ]);
        return $this->respond($this->baseData->find($id));
    }

    public function saveKontak($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $mKontak = new KontakModel();
        $set = $this->request->getPost();

        $this->mPesertaDidik->select('peserta_didik.nik');
        $result = $this->mPesertaDidik->where('peserta_didik.peserta_didik_id', $id)->first();
        if (!$result) return $this->fail('Peserta didik tidak ditemukan.');
        $cAlamat = $mKontak->where('nik', $result['nik'])->first();
        if ($cAlamat) $set['id'] = $cAlamat['id'];
        else {
            $set['kontak_id'] = idUnik($mKontak, 'kontak_id');
            $set['nik'] = $result['nik'];
        }
        if (!$mKontak->save($set)) return $this->fail('Kontak peserta didik gagal disimpan.');

        return $this->respond(['status' => true, 'message' => 'Kontak peserta didik berhasil disimpan.']);
    }

    public function showBeasiswa($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $cPd = $this->mPesertaDidik->select('peserta_didik.nik')
            ->where('peserta_didik.peserta_didik_id', $id)
            ->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        $mBeasiswa = new BeasiswaModel();
        $dataBeasiswa = $mBeasiswa
            ->select([
                'beasiswa_id as id',
                'nominal',
                'tahun_awal',
                'tahun_akhir',
                'uraian',
                'ref_jenis_beasiswa.nama as jenis_beasiswa',
                'ref_jenis_beasiswa.kode as kode_beasiswa',
                'ref_jenis_beasiswa.bg_color as warna',
                'ref_satuan.nama as satuan'
            ])
            ->join('ref_jenis_beasiswa', 'ref_jenis_beasiswa.ref_id = beasiswa.jenis_id', 'left')
            ->join('ref_satuan', 'ref_satuan.ref_id = beasiswa.satuan_id', 'left')
            ->where('nik', $cPd['nik'])
            ->findAll();
        return $this->respond($dataBeasiswa);
    }

    public function saveBeasiswa($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $cPd = $this->mPesertaDidik->select('peserta_didik.nik')
            ->where('peserta_didik.peserta_didik_id', $id)
            ->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        $mBeasiswa = new BeasiswaModel();
        $set = $this->request->getPost();
        $set['nik'] = $cPd['nik'];
        $set['beasiswa_id'] = idUnik($mBeasiswa, 'beasiswa_id');
        if (!$mBeasiswa->save($set)) return $this->fail('Data beasiswa gagal disimpan.');
        return $this->respond(['message' => 'Data beasiswa berhasil disimpan.', 'id' => $set['beasiswa_id']]);
    }

    public function deleteBeasiswa($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID beasiswa diperlukan.');
        $mBeasiswa = new BeasiswaModel();
        $cBeasiswa = $mBeasiswa->where('beasiswa_id', $id)->first();
        if (!$cBeasiswa) return $this->fail('Data beasiswa tidak ditemukan.');
        if (!$mBeasiswa->delete($cBeasiswa['id'], true)) return $this->fail('Data beasiswa gagal dihapus.');
        return $this->respond(['message' => 'Data beasiswa berhasil dihapus permanen.']);
    }

    public function showRegistrasi($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $cPd = $this->mPesertaDidik->select('peserta_didik.nik')
            ->where('peserta_didik.peserta_didik_id', $id)
            ->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        $mRegistrasi = new RegistrasiPesertaDidikModel();
        $mRegistrasi->select([
            'ref_jenis_registrasi.ref_id as jenis_registrasi_id',
            'ref_jenis_registrasi.nama as jenis_registrasi_str',
            'tanggal_registrasi',
            'nipd',
            'asal_sekolah',
            'sekolah_jenjang_sebelumnya',
        ])
            ->join('ref_jenis_registrasi', 'ref_jenis_registrasi.ref_id = registrasi_peserta_didik.jenis_registrasi', 'left')
            ->where('peserta_didik_id', $id);
        return $this->respond($mRegistrasi->first() ?? false);
    }

    public function saveRegistrasi($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $cPd = $this->mPesertaDidik->select('peserta_didik.peserta_didik_id')
            ->where('peserta_didik.peserta_didik_id', $id)
            ->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        $set = $this->request->getPost();
        $mRegistrasi = new RegistrasiPesertaDidikModel();
        $cRegistrasi = $mRegistrasi->where('peserta_didik_id', $id)->first();
        if (!$cRegistrasi) $set['registrasi_id'] = idUnik($mRegistrasi, 'registrasi_id');
        else $set['id'] = $cRegistrasi['id'];
        if (!$mRegistrasi->save($set)) return $this->fail('Data registrasi peserta didik gagal disimpan.');
        return $this->respond(['message' => 'Data registrasi peserta didik berhasil disimpan.']);
    }

    public function deleteRegistrasi($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $cPd = $this->mPesertaDidik->select('peserta_didik.peserta_didik_id, nama')
            ->where('peserta_didik.peserta_didik_id', $id)
            ->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        $mRegistrasi = new RegistrasiPesertaDidikModel();
        $cRegistrasi = $mRegistrasi->where('peserta_didik_id', $id)->first();
        if (!$cRegistrasi) return $this->fail('Data registrasi peserta didik tidak ditemukan.');
        if (!$mRegistrasi->delete($cRegistrasi['id'], true)) return $this->fail('Registrasi peserta didik gagal dihapus.');
        return $this->respond(['message' => 'Data registrasi an. <strong>' . $cPd['nama'] . '</strong> berhasil dihapus permanen.']);
    }

    public function showMutasi($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $cPd = $this->mPesertaDidik->select('peserta_didik.nik')
            ->where('peserta_didik.peserta_didik_id', $id)
            ->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        $mMutasi = new MutasiPdModel();
        $mMutasi->select([
            'ref_jenis_mutasi.ref_id as jenis_mutasi_id',
            'ref_jenis_mutasi.nama as jenis_mutasi_str',
            'tanggal',
            'alasan',
            'sekolah_tujuan',
        ])
            ->join('ref_jenis_mutasi', 'ref_jenis_mutasi.ref_id = mutasi_pd.jenis', 'left')
            ->where('peserta_didik_id', $id);
        return $this->respond($mMutasi->first() ?? false);
    }

    public function saveMutasi($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $cPd = $this->mPesertaDidik->select('peserta_didik.peserta_didik_id')
            ->where('peserta_didik.peserta_didik_id', $id)
            ->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        $set = $this->request->getPost();
        $mMutasi = new MutasiPdModel();
        $cMutasi = $mMutasi->where('peserta_didik_id', $id)->first();
        if (!$cMutasi) {
            $set['mutasi_id'] = idUnik($mMutasi, 'mutasi_id');
            $set['peserta_didik_id'] = $id;
        } else $set['id'] = $cMutasi['id'];
        if (!$mMutasi->save($set)) return $this->fail('Data mutasi peserta didik gagal disimpan.');
        return $this->respond(['message' => 'Data mutasi peserta didik berhasil disimpan.']);
    }

    public function deleteMutasi($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $cPd = $this->mPesertaDidik->select('peserta_didik.peserta_didik_id, nama')
            ->where('peserta_didik.peserta_didik_id', $id)
            ->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        $mMutasi = new MutasiPdModel();
        $cMutasi = $mMutasi->where('peserta_didik_id', $id)->first();
        if (!$cMutasi) return $this->fail('Data mutasi peserta didik tidak ditemukan.');
        if (!$mMutasi->delete($cMutasi['id'], true)) return $this->fail('Mutasi peserta didik gagal dihapus.');
        return $this->respond(['message' => 'Data mutasi an. <strong>' . $cPd['nama'] . '</strong> berhasil dihapus permanen.']);
    }

    public function showKelulusan($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $cPd = $this->mPesertaDidik->select('peserta_didik.nik')
            ->where('peserta_didik.peserta_didik_id', $id)
            ->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        $mKelulusan = new KelulusanPdModel();
        $mKelulusan->select([
            'ref_kurikulum.ref_id as kurikulum_id',
            'ref_kurikulum.nama as kurikulum_str',
            'tanggal',
            'nomor_ijazah',
            'penandatangan',
        ])
            ->join('ref_kurikulum', 'ref_kurikulum.ref_id = kelulusan.kurikulum', 'left')
            ->where('peserta_didik_id', $id);
        return $this->respond($mKelulusan->first() ?? false);
    }

    public function saveKelulusan($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $cPd = $this->mPesertaDidik->select(['peserta_didik.peserta_didik_id', 'tingkat_pendidikan as tingkat', 'mutasi_pd.mutasi_id'])
            ->join('anggota_rombongan_belajar', 'anggota_rombongan_belajar.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
            ->join('semester', 'semester.semester_id = rombongan_belajar.semester_id', 'left')
            ->join('mutasi_pd', 'mutasi_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->where('semester.status', true)
            ->where('peserta_didik.peserta_didik_id', $id)
            ->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        if ($cPd['mutasi_id'] !== null) return $this->fail('Peserta didik terdeteksi sebagai peserta didik keluar.');
        if ((int)$cPd['tingkat'] !== 9) return $this->fail('Kelulusan hanya hanya pada kelas 9.');
        $set = $this->request->getPost();
        $mKelulusan = new KelulusanPdModel();
        $cKelulusan = $mKelulusan->where('peserta_didik_id', $id)->first();
        if (!$cKelulusan) {
            $set['kelulusan_id'] = idUnik($mKelulusan, 'kelulusan_id');
            $set['peserta_didik_id'] = $id;
        } else $set['id'] = $cKelulusan['id'];
        if (!$mKelulusan->save($set)) return $this->fail('Data kelulusan peserta didik gagal disimpan.');
        return $this->respond(['message' => 'Data kelulusan peserta didik berhasil disimpan.']);
    }

    public function deleteKelulusan($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $cPd = $this->mPesertaDidik->select('peserta_didik.peserta_didik_id, nama')
            ->where('peserta_didik.peserta_didik_id', $id)
            ->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        $mKelulusan = new KelulusanPdModel();
        $cKelulusan = $mKelulusan->where('peserta_didik_id', $id)->first();
        if (!$cKelulusan) return $this->fail('Data kelulusan peserta didik tidak ditemukan.');
        if (!$mKelulusan->delete($cKelulusan['id'], true)) return $this->fail('Kelulusan peserta didik gagal dihapus.');
        return $this->respond(['message' => 'Data kelulusan an. <strong>' . $cPd['nama'] . '</strong> berhasil dihapus permanen.']);
    }

    public function showKesejahteraan($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $cPd = $this->mPesertaDidik->select('peserta_didik.nik')
            ->where('peserta_didik.peserta_didik_id', $id)
            ->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        $mKesejahteraan = new KesejahteraanModel();
        $dataKesejahteraan = $mKesejahteraan
            ->select([
                'kesejahteraan_id as id',
                'tahun_awal',
                'tahun_akhir',
                'nomor_kartu',
                'nama_kartu',
                'ref_jenis_kesejahteraan.nama as jenis_kesejahteraan',
                'ref_jenis_kesejahteraan.kode as kode_kesejahteraan',
                'ref_jenis_kesejahteraan.bg_color as warna',
            ])
            ->join('ref_jenis_kesejahteraan', 'ref_jenis_kesejahteraan.ref_id = kesejahteraan.jenis_id', 'left')
            ->where('nik', $cPd['nik'])
            ->findAll();
        return $this->respond($dataKesejahteraan);
    }

    public function saveKesejahteraan($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID Peserta didik diperlukan.');
        $cPd = $this->mPesertaDidik->select('peserta_didik.nik')
            ->where('peserta_didik.peserta_didik_id', $id)
            ->first();
        if (!$cPd) return $this->fail('Peserta didik tidak ditemukan.');
        $mKesejahteraan = new KesejahteraanModel();
        $set = $this->request->getPost();
        $set['nik'] = $cPd['nik'];
        $set['kesejahteraan_id'] = idUnik($mKesejahteraan, 'kesejahteraan_id');
        if (!$mKesejahteraan->save($set)) return $this->fail('Data kesejahteraan gagal disimpan.');
        return $this->respond(['message' => 'Data kesejahteraan berhasil disimpan.', 'id' => $set['kesejahteraan_id']]);
    }

    public function deleteKesejahteraan($id): ResponseInterface
    {
        if (!$id) return $this->fail('ID kesejahteraan diperlukan.');
        $mKesejahteraan = new KesejahteraanModel();
        $cKesejahteraan = $mKesejahteraan->where('kesejahteraan_id', $id)->first();
        if (!$cKesejahteraan) return $this->fail('Data kesejahteraan tidak ditemukan.');
        if (!$mKesejahteraan->delete($cKesejahteraan['id'], true)) return $this->fail('Data kesejahteraan gagal dihapus.');
        return $this->respond(['message' => 'Data kesejahteraan berhasil dihapus permanen.']);
    }
}
