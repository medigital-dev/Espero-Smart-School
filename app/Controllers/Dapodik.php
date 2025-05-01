<?php

namespace App\Controllers;

use App\Libraries\Dapodik as LibrariesDapodik;
use App\Libraries\Files;
use App\Libraries\Import;
use App\Models\AlamatModel;
use App\Models\AnggotaRombelModel;
use App\Models\DapodikSyncModel;
use App\Models\GuruPegawaiModel;
use App\Models\KontakModel;
use App\Models\OrangtuaWaliModel;
use App\Models\OrtuWaliPdModel;
use App\Models\PeriodikModel;
use App\Models\PesertaDidikModel;
use App\Models\RefAgamaModel;
use App\Models\RefTransportasiModel;
use App\Models\RefPekerjaanModel;
use App\Models\RegistrasiPesertaDidikModel;
use App\Models\RiwayatTestKoneksiModel;
use App\Models\RombelModel;
use App\Models\SemesterModel;
use CodeIgniter\API\ResponseTrait;

class Dapodik extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['string', 'indonesia']);
    }

    public function index(): string
    {
        $page = [
            'title' => 'SISPADU - Pengaturan Dapodik',
            'sidebar' => 'dapodik',
            'breadcrumb' => [],
            'page' => 'Koneksi Aplikasi Dapodik',
            'data' => [],
        ];
        return view('dapodik/index', $page);
    }

    public function getTable()
    {
        $mDapodik = new DapodikSyncModel();
        $mRiwayatTest = new RiwayatTestKoneksiModel();
        $sendDapodik = [];
        $dataDapodik = $mDapodik
            ->select(['dapodik_id as id', 'nama', 'url', 'port', 'npsn', 'token', 'status'])
            ->orderBy('status', 'DESC')
            ->findAll();
        foreach ($dataDapodik as $dapodik) {
            $color = 'secondary';
            $icon = 'fa-minus-circle';
            $tglWaktu = '--/--/-- --:--';

            $riwayat = $mRiwayatTest->where('dapodik_id', $dapodik['id'])
                ->orderBy('tanggal_waktu', 'DESC')
                ->first();
            if ($riwayat) {
                $color = $riwayat['status'] ? 'success' : 'danger';
                $icon = $riwayat['status'] ? 'fa-check-circle' : $icon;
                $tglWaktu = $riwayat ? tanggal($riwayat['tanggal_waktu'], 'd-m-Y H:i') : $tglWaktu;
            }

            $status = $dapodik['status'] ? '<span class="text-success"><i class="fas fa-check-circle fa-fw"></i></span>' : '<span class="text-secondary"><i class="fas fa-minus-circle fa-fw"></i></span>';
            $temp = [
                'checkbox' => '
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input dtCheckbox" type="checkbox" id="check_' . $dapodik['id'] . '" value="' . $dapodik['id'] . '">
                        <label for="check_' . $dapodik['id'] . '" class="custom-control-label"></label>
                    </div>',
                'nama' => $dapodik['nama'],
                'url' => '<a href="//' . $dapodik['url'] . ':' . $dapodik['port'] . '" target="_blank">' . $dapodik['url'] . ':' . $dapodik['port'] . '</a>',
                'npsn' => $dapodik['npsn'],
                'token' => $dapodik['token'],
                'status' => $status,
                'koneksi' => '<a type="button" class="text-decoration-none btnRiwayatTestKoneksiDapodik" title="Riwayat Koneksi" data-id="' . $dapodik['id'] . '"><span class="badge p-2 bg-' . $color . '"><i class="fas ' . $icon . ' fa-fw"></i> ' . $tglWaktu . '</span></a>',
            ];
            array_push($sendDapodik, $temp);
        }
        return $this->respond($sendDapodik);
    }

    public function set()
    {
        $set = $this->request->getVar('set');
        $id = $this->request->getVar('id');
        $mDapodik = new DapodikSyncModel();
        $data = $mDapodik->where('dapodik_id', $id)->first();

        if (!$data) $set['dapodik_id'] = unik($mDapodik, 'dapodik_id');
        else $set['id'] = $data['id'];

        if (!$mDapodik->save($set)) return $this->fail('Error: Konfigurasi koneksi dapodik tidak dapat disimpan.');

        $response = [
            'message' => 'Konfigurasi koneksi dapodik berhasil disimpan.',
            'data' => $set
        ];
        return $this->respond($response);
    }

    public function get()
    {
        $mDapodik = new DapodikSyncModel();
        $id = $this->request->getVar('id');

        $data = $mDapodik->select(['dapodik_id as id', 'nama', 'url', 'port', 'npsn', 'token'])
            ->where('dapodik_id', $id)
            ->first();
        if (!$data) return $this->fail('Error: Data koneksi dapodik tidak ditemukan.');
        return $this->respond($data);
    }

    public function delete()
    {
        $mDapodik = new DapodikSyncModel();
        $mRiwayatTest = new RiwayatTestKoneksiModel();
        $idDeleted = [];
        $ids = $this->request->getVar('ids');
        foreach ($ids as $id) {
            $data = $mDapodik->where('dapodik_id', $id)
                ->first();
            if (!$data) return $this->fail('Error tidak ditemukan: #' . $id);;
            array_push($idDeleted, $data['id']);
        }
        if (!$mDapodik->delete($idDeleted, true)) return $this->fail('Error: ' . count($idDeleted) . ' data koneksi dapodik gagal dihapus.');
        if (!$mRiwayatTest->where('dapodik_id', $id)->delete()) return $this->fail('Error: Riwayat test koneksi dapodik gagal dihapus.');
        $mRiwayatTest->purgeDeleted();
        $response = [
            'message' => count($idDeleted) . ' profil koneksi dapodik berhasil dihapus.',
            'data' => $ids,
        ];
        return $this->respond($response);
    }

    public function setAktif()
    {
        $mDapodik = new DapodikSyncModel();
        $id = $this->request->getVar('id');
        $data = $mDapodik->where('dapodik_id', $id)->first();
        if (!$data) return $this->fail('Error: Data koneksi dapodik tidak ditemukan.');
        $aktif = $mDapodik->where('status', true)->first();
        if ($aktif) {
            if (!$mDapodik->update($aktif['id'], ['status' => false])) return $this->fail('Error: Penonaktifan data koneksi dapodik gagal.');
        }
        if (!$mDapodik->update($data['id'], ['status' => true])) return $this->fail('Error: Pengaktifan data koneksi dapodik gagal.');
        $response = [
            'message' => 'Profil <strong>' . $data['nama'] . '</strong> berhasil diaktikan.',
            'data' => $data,
        ];
        return $this->respond($response);
    }

    public function testKoneksi()
    {
        $mRiwayatTest = new RiwayatTestKoneksiModel();
        $req = new LibrariesDapodik();
        $id = $this->request->getVar('id');

        $config = $req->config();

        if (empty($config))
            return $this->fail('Error: Konfigurasi dapodik belum diset aktif.');

        $result = $req->sync('getSekolah');

        $temp = [
            'riwayat_id' => unik($mRiwayatTest, 'riwayat_id'),
            'dapodik_id' => $id,
            'tanggal_waktu' => date('Y-m-d H:i:s'),
            'pesan' => $result['message']
        ];

        if (!$result['success']) {
            $temp['status'] =  false;
            if (!$mRiwayatTest->save($temp)) return $this->fail('Error: Riwayat testing koneksi dapodik gagal disimpan.');
            return $this->fail($result['message']);
        }

        $temp['status'] = true;
        if (!$mRiwayatTest->save($temp)) return $this->fail('Error: Riwayat testing koneksi dapodik gagal disimpan.');

        $response = [
            'nama' => $result['data']['nama'],
            'npsn' => $result['data']['npsn'],
        ];
        return $this->respond($response);
    }

    public function getRiwayatTest()
    {
        $mDapodik = new DapodikSyncModel();
        $mRiwayatTest = new RiwayatTestKoneksiModel();
        $id = $this->request->getVar('id');
        $data = $mDapodik->where('dapodik_id', $id)->first();
        if (!$data) return $this->fail('Error: Data koneksi dapodik tidak ditemukan.');
        $riwayat = $mRiwayatTest->where('dapodik_id', $id)->orderBy('tanggal_waktu', 'DESC')
            ->findAll();
        $data['riwayat'] = $riwayat;
        return view('dapodik/riwayat-test', $data);
    }

    public function syncPd()
    {
        $mPesertaDidik = new PesertaDidikModel();
        $mRegistrasi = new RegistrasiPesertaDidikModel();
        $mOrtuWali = new OrangtuaWaliModel();
        $mOrtuWaliPd = new OrtuWaliPdModel();
        $mRombel = new RombelModel();
        $mAnggotaRombel = new AnggotaRombelModel();
        $mSemester = new SemesterModel();
        $mKontak = new KontakModel();
        $mPeriodik = new PeriodikModel();
        $mRefAgama = new RefAgamaModel();
        $mRefPekerjaan = new RefPekerjaanModel();

        $dapodik = new LibrariesDapodik();
        $request = $dapodik->sync('getPesertaDidik');

        if (!$request['success']) return $this->fail($request['message']);

        foreach ($request['data'] as $row) {
            $idPd = $row['peserta_didik_id'];
            $nik = $row['nik'];

            $setRegistrasi = [
                'registrasi_id' => $row['registrasi_id'],
                'peserta_didik_id' => $row['peserta_didik_id'],
                'jenis_registrasi' => $row['jenis_pendaftaran_id_str'],
                'tanggal_registrasi' => $row['tanggal_masuk_sekolah'],
                'nipd' => $row['nipd'],
                'asal_sekolah' => $row['sekolah_asal'],
            ];
            $cReg = $mRegistrasi
                ->groupStart()
                ->where('peserta_didik_id', $idPd)
                ->orWhere('nipd', $row['nipd'])
                ->groupEnd()
                ->first();
            if ($cReg) $setRegistrasi['id'] = $cReg['id'];
            if (!$mRegistrasi->save($setRegistrasi)) return $this->fail('Error: Registrasi Peserta Didik an. ' . $row['nama'] . ' gagal disimpan.');

            $setAgama = [
                'nama' => $row['agama_id_str'],
            ];
            $cRefAgama = $mRefAgama->where('nama', $setAgama['nama'])->first();
            if (!$cRefAgama) {
                $setAgama['ref_id'] = unik($mRefAgama, 'ref_id');
                if (!$mRefAgama->save($setAgama)) return $this->fail('Error: Referensi Agama gagal disimpan.');
            } else
                $setAgama['ref_id'] = $cRefAgama['ref_id'];

            $setPd = [
                'peserta_didik_id' => $row['peserta_didik_id'],
                'nama' => $row['nama'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' => $row['tanggal_lahir'],
                'nisn' => $row['nisn'],
                'nik' => $row['nik'],
                'agama_id' => $setAgama['ref_id'],
            ];
            $cPd = $mPesertaDidik
                ->groupStart()
                ->where('peserta_didik_id', $idPd)
                ->orWhere('nisn', $row['nisn'])
                ->orWhere('nik', $row['nik'])
                ->orWhere('nama', $row['nama'])
                ->groupEnd()
                ->first();
            if ($cPd) $setPd['id'] = $cPd['id'];
            if (!$mPesertaDidik->save($setPd)) return $this->fail('Error: Peserta Didik an. ' . $row['nama'] . ' gagal disimpan.');

            $setKontakPd = [
                'nik' => $nik,
                'telepon' => $row['nomor_telepon_rumah'],
                'hp' => $row['nomor_telepon_seluler'],
                'email' => $row['email'],
            ];
            $cKontak = $mKontak->where('nik', $nik)->first();
            if ($cKontak) $setKontakPd['id'] = $cKontak['id'];
            else $setKontakPd['kontak_id'] = unik($mKontak, 'kontak_id');
            if (!$mKontak->save($setKontakPd)) return $this->fail('Error: Kontak peserta didik gagal disimpan.');

            // Mulai Ortu: Ayah
            if ($row['nama_ayah']) {
                $setPekerjaanAyah = [
                    'nama' => $row['pekerjaan_ayah_id_str'],
                ];
                $cPekerjaan = $mRefPekerjaan->where('nama', $setPekerjaanAyah['nama'])->first();
                if (!$cPekerjaan) {
                    $setPekerjaanAyah['ref_id'] = unik($mRefPekerjaan, 'ref_id');
                    if (!$mRefPekerjaan->save($setPekerjaanAyah)) return $this->fail('Error: Referensi pekerjaan gagal disimpan.');
                } else $setPekerjaanAyah['ref_id'] = $cPekerjaan['ref_id'];

                $setOrtuAyah = [
                    'nama' => $row['nama_ayah'],
                    'pekerjaan_id' => $setPekerjaanAyah['ref_id'],
                    'jenis_kelamin' => 'L',
                ];
                $cOrtuWali = $mOrtuWali->where('nama', $setOrtuAyah['nama'])->first();
                if (!$cOrtuWali) {
                    $setOrtuAyah['orangtua_id'] = unik($mOrtuWali, 'orangtua_id');
                } else {
                    $setOrtuAyah['id'] = $cOrtuWali['id'];
                    $setOrtuAyah['orangtua_id'] = $cOrtuWali['orangtua_id'];
                };
                if (!$mOrtuWali->save($setOrtuAyah)) return $this->fail('Error: Orangtua/Wali an ' . $setOrtuAyah['nama'] . ' gagal disimpan.');

                $idAyah = $setOrtuAyah['orangtua_id'];
                $setOrtuPd = [
                    'peserta_didik_id' => $idPd,
                    'orangtua_id' => $idAyah,
                    'hubungan_keluarga' => 'kandung',
                ];
                $cOrtuWaliAyah = $mOrtuWaliPd->where('peserta_didik_id', $idPd)->where('orangtua_id', $idAyah)->first();
                if (!$cOrtuWaliAyah) {
                    $setOrtuPd['ortupd_id'] = unik($mOrtuWaliPd, 'ortupd_id');
                } else {
                    $setOrtuPd['id'] = $cOrtuWaliAyah['id'];
                }
                if (!$mOrtuWaliPd->save($setOrtuPd)) return $this->fail('Error: Data orangtua/wali peserta didik gagal disimpan.');
            }
            // Akhir Ortu: Ayah

            // Mulai Ortu: Ibu
            if ($row['nama_ibu']) {
                $setPekerjaanIbu = [
                    'nama' => $row['pekerjaan_ibu_id_str'],
                ];
                $cPekerjaan = $mRefPekerjaan->where('nama', $setPekerjaanIbu['nama'])->first();
                if (!$cPekerjaan) {
                    $setPekerjaanIbu['ref_id'] = unik($mRefPekerjaan, 'ref_id');
                    if (!$mRefPekerjaan->save($setPekerjaanIbu)) return $this->fail('Error: Referensi pekerjaan gagal disimpan.');
                } else $setPekerjaanIbu['ref_id'] = $cPekerjaan['ref_id'];

                $setOrtuIbu = [
                    'nama' => $row['nama_ibu'],
                    'pekerjaan_id' => $setPekerjaanIbu['ref_id'],
                    'jenis_kelamin' => 'P',
                ];
                $cOrtuWali = $mOrtuWali->where('nama', $setOrtuIbu['nama'])->first();
                if (!$cOrtuWali) {
                    $setOrtuIbu['orangtua_id'] = unik($mOrtuWali, 'orangtua_id');
                } else {
                    $setOrtuIbu['id'] = $cOrtuWali['id'];
                    $setOrtuIbu['orangtua_id'] = $cOrtuWali['orangtua_id'];
                }
                if (!$mOrtuWali->save($setOrtuIbu)) return $this->fail('Error: Orangtua/Wali an ' . $setOrtuIbu['nama'] . ' gagal disimpan.');
                $idIbu = $setOrtuIbu['orangtua_id'];
                $setOrtuPd = [
                    'peserta_didik_id' => $idPd,
                    'orangtua_id' => $idIbu,
                    'hubungan_keluarga' => 'kandung',
                ];
                $cOrtuWaliIbu = $mOrtuWaliPd->where('peserta_didik_id', $idPd)->where('orangtua_id', $idIbu)->first();
                if (!$cOrtuWaliIbu) {
                    $setOrtuPd['ortupd_id'] = unik($mOrtuWaliPd, 'ortupd_id');
                } else {
                    $setOrtuPd['id'] = $cOrtuWaliIbu['id'];
                }
                if (!$mOrtuWaliPd->save($setOrtuPd)) return $this->fail('Error: Data orangtua/wali peserta didik gagal disimpan.');
            }
            // Akhir Ortu: Ibu

            // Mulai Ortu: Wali
            if ($row['nama_wali']) {
                $setPekerjaanWali = [
                    'nama' => $row['pekerjaan_wali_id_str'],
                ];
                $cPekerjaan = $mRefPekerjaan->where('nama', $setPekerjaanWali['nama'])->first();
                if (!$cPekerjaan) {
                    $setPekerjaanWali['ref_id'] = unik($mRefPekerjaan, 'ref_id');
                    if (!$mRefPekerjaan->save($setPekerjaanWali)) return $this->fail('Error: Referensi pekerjaan gagal disimpan.');
                } else $setPekerjaanWali['ref_id'] = $cPekerjaan['ref_id'];

                $setOrtuWali = [
                    'nama' => $row['nama_wali'],
                    'pekerjaan_id' => $setPekerjaanWali['ref_id'],
                ];
                $cOrtuWali = $mOrtuWali->where('nama', $setOrtuWali['nama'])->first();
                if (!$cOrtuWali) {
                    $setOrtuWali['orangtua_id'] = unik($mOrtuWali, 'orangtua_id');
                } else {
                    $setOrtuWali['id'] = $cOrtuWali['id'];
                    $setOrtuWali['orangtua_id'] = $cOrtuWali['orangtua_id'];
                }
                if (!$mOrtuWali->save($setOrtuWali)) return $this->fail('Error: Orangtua/Wali an ' . $setOrtuWali['nama'] . ' gagal disimpan.');
                $idWali = $setOrtuWali['orangtua_id'];
                $cOrtuWaliWali = $mOrtuWaliPd->where('peserta_didik_id', $idPd)->where('orangtua_id', $idWali)->first();
                $setOrtuPd = [
                    'peserta_didik_id' => $idPd,
                    'orangtua_id' => $idWali,
                    'hubungan_keluarga' => 'wali',
                ];
                if (!$cOrtuWaliWali) {
                    $setOrtuPd['ortupd_id'] = unik($mOrtuWaliPd, 'ortupd_id');
                } else {
                    $setOrtuPd['id'] = $cOrtuWaliWali['id'];
                }
                if (!$mOrtuWaliPd->save($setOrtuPd)) return $this->fail('Error: Data orangtua/wali peserta didik gagal disimpan.');
            }
            // Akhir Ortu: Wali

            $cPeriodik = $mPeriodik
                ->where('nik', $nik)
                ->where('tinggi_badan', $row['tinggi_badan'])
                ->where('berat_badan', $row['berat_badan'])
                ->where('anak_ke', $row['anak_keberapa'])
                ->first();

            $setPeriodik = [
                'tinggi_badan' => $row['tinggi_badan'],
                'berat_badan' => $row['berat_badan'],
                'anak_ke' => $row['anak_keberapa'],
                'nik' => $nik,
                'tanggal' => date('Y-m-d'),
            ];
            if (!$cPeriodik) {
                $setPeriodik['periodik_id'] = unik($mPeriodik, 'periodik_id');
                if (!$mPeriodik->save($setPeriodik)) return $this->fail('Error: Data periodik an. ' . $setPd['nama'] . ' gagal disimpan.');
            }

            $setSemester = [
                'kode' => $row['semester_id'],
                'status' => true,
            ];
            $mSemester->where('status', true)->set('status', false)->update();
            $cSemester = $mSemester->where('kode', $row['semester_id'])
                ->first();
            if (!$cSemester)
                $setSemester['semester_id'] = unik($mSemester, 'semester_id');
            else {
                $setSemester['id'] = $cSemester['id'];
                $setSemester['semester_id'] = $cSemester['semester_id'];
            };
            if (!$mSemester->save($setSemester)) return $this->fail('Error: Data semester gagal disimpan.');

            $setRombel = [
                'rombel_id' => $row['rombongan_belajar_id'],
                'tingkat_pendidikan' => $row['tingkat_pendidikan_id'],
                'nama' => $row['nama_rombel'],
                'semester_id' => $setSemester['semester_id']
            ];
            $cRombel = $mRombel->where('rombel_id', $setRombel['rombel_id'])->first();
            if ($cRombel)
                $setRombel['id'] = $cRombel['id'];
            if (!$mRombel->save($setRombel)) return $this->fail('Error: Data rombongan belajar gagal disimpan.');

            $cAnggotaRombel = $mAnggotaRombel->where('rombel_id', $row['rombongan_belajar_id'])
                ->where('peserta_didik_id', $idPd)
                ->first();
            if (!$cAnggotaRombel) {
                $setAnggotaRombel = [
                    'anggota_id' => $row['anggota_rombel_id'],
                    'rombel_id' => $row['rombongan_belajar_id'],
                    'jenis_registrasi_rombel' => $row['jenis_pendaftaran_id_str'],
                    'peserta_didik_id' => $idPd,
                ];
                if (!$mAnggotaRombel->save($setAnggotaRombel)) return $this->fail('Error: Data anggota rombel gagal disimpan.');
            }
        }

        $response = [
            'message' => count($request['data']) . ' Data peserta didik berhasil disinkronkan.',
        ];
        return $this->respond($response);
    }

    public function importPd()
    {
        $mPd = new PesertaDidikModel();
        $mRegistrasi = new RegistrasiPesertaDidikModel();
        $mRefAgama = new RefAgamaModel();
        $mAlamat = new AlamatModel();
        $mRefTransportasi = new RefTransportasiModel();

        $file = $this->request->getFile('fileUpload');
        $filesLib = new Files();
        $fileExcel = $filesLib->upload($file);
        if (!$fileExcel['status']) return $this->fail($fileExcel);
        $import = new Import();
        $result = $import->excel($fileExcel['data']['path']);
        if (!$result['status']) return $this->fail($result);
        $rows = $result['data'];
        if ($rows[0][0] !== 'Daftar Peserta Didik' || $rows[4][0] !== 'No' || $rows[4][1] !== 'Nama' || $rows[4][2] !== 'NIPD' || $rows[4][3] !== 'JK' || $rows[4][4] !== 'NISN' || $rows[4][5] !== 'Tempat Lahir' || $rows[4][6] !== 'Tanggal Lahir' || $rows[4][7] !== 'NIK' || $rows[4][8] !== 'Agama')
            return $this->fail('File yang diupload bukan hasil unduh daftar Peserta Didik di aplikasi dapodik atau file telah mengalami perubahan.');

        $countSuccess = $countError = 0;
        foreach ($rows as $row) {
            if ((int)$row[0] > 0) {
                $nisn = $row[4];

                // Start Agama
                $cAgama = $mRefAgama->where('nama', $row[8])->first();
                if ($cAgama) $idAgama = $cAgama['ref_id'];
                else {
                    $setAgama['ref_id'] = unik($mRefAgama, 'ref_id');
                    $setAgama['nama'] = $row[8];
                    if (!$mRefAgama->save($setAgama)) return $this->fail('Error: Referensi Agama gagal disimpan.');
                    $idAgama = $setAgama['ref_id'];
                }
                // End Agama

                // Start Peserta Didik
                $idPd = unik($mPd, 'peserta_didik_id');
                $setPd = [
                    'nama' => $row[1],
                    'jenis_kelamin' => $row[3],
                    'tempat_lahir' => $row[5],
                    'tanggal_lahir' => $row[6],
                    'nik' => $row[7],
                    'agama_id' => $idAgama,
                    'nisn' => $nisn,
                ];

                $cPd = $mPd
                    ->groupStart()
                    ->where('nisn', $nisn)
                    ->orWhere('nik', $row[7])
                    ->orWhere('nama', $row[1])
                    ->groupEnd()
                    ->first();
                if ($cPd) {
                    $setPd['id'] = $cPd['id'];
                    $setPd['peserta_didik_id'] = $cPd['peserta_didik_id'];
                } else $setPd['peserta_didik_id'] = $idPd;

                $mPd->save($setPd);
                // End Peserta Didik

                // Start Registrasi
                $cRegistrasi = $mRegistrasi
                    ->groupStart()
                    ->where('nipd', $row[2])
                    ->orWhere('peserta_didik_id', $idPd)
                    ->groupEnd()
                    ->first();
                if (!$cRegistrasi) {
                    $setRegistrasi = [
                        'registrasi_id' => unik($mRegistrasi, 'registrasi_id'),
                        'nipd' => $row[2],
                        'peserta_didik_id' => $setPd['peserta_didik_id'],
                        'asal_sekolah' => $row[56],
                    ];
                    $mRegistrasi->save($setRegistrasi);
                }
                // End Registrasi

                // Start Alat Transportasi
                $setTranspot = ['nama' => $row[17]];
                $cTranspot = $mRefTransportasi
                    ->where('nama', $row[17])
                    ->first();
                if (!$cTranspot) {
                    $setTranspot['ref_id'] = unik($mRefTransportasi, 'ref_id');
                    if (!$mRefTransportasi->save($setTranspot)) return $this->fail('Error: Referensi transportasi gagal disimpan.');
                } else {
                    $setTranspot['id'] = $cTranspot['id'];
                    $setTranspot['ref_id'] = $cTranspot['ref_id'];
                }
                // End Alat Transportasi

                // Start Alamat
                $setAlamat = [
                    'nik' => $row[7],
                    'alamat_jalan' => $row[9],
                    'rt' => $row[10],
                    'rw' => $row[11],
                    'dusun' => $row[12],
                    'desa' => str_replace('Desa/Kel. ', '', $row[13]),
                    'kecamatan' => str_replace('Kec. ', '', $row[14]),
                    'kode_pos' => $row[15],
                    'lintang' => $row[58],
                    'bujur' => $row[59],
                    'jarak_rumah' => $row[65],
                    'alat_transportasi_id' => $setTranspot['ref_id'],
                ];
                $cAlamat = $mAlamat
                    ->groupStart()
                    ->where('nik', $row[7])
                    ->where('lintang', $row[58])
                    ->where('bujur', $row[59])
                    ->groupEnd()
                    ->orderBy('updated_at', 'DESC')
                    ->first();
                if (!$cAlamat) $setAlamat['alamat_id'] = unik($mAlamat, 'alamat_id');
                else {
                    $setAlamat['id'] = $cAlamat['id'];
                    $setAlamat['alamat_id'] = $cAlamat['alamat_id'];
                }
                if (!$mAlamat->save($setAlamat)) return $this->fail('Error: Alamat tempat tinggal gagal disimpan.');
                // End Alamat
            }
        }
        unlink($fileExcel['data']['path']);
        return $this->respond(['success' => $countSuccess, 'error' => $countError]);
    }

    public function syncGtk()
    {
        $mGtk = new GuruPegawaiModel();
        $dapodik = new LibrariesDapodik();
        $mRefAgama = new RefAgamaModel();

        $request = $dapodik->sync('getGtk');
        if (!$request['success']) return $this->fail($request['message']);
        $success = 0;
        foreach ($request['data'] as $row) {
            $cAgama = $mRefAgama->where('nama', $row['agama_id_str'])->first();
            if ($cAgama) $idAgama = $cAgama['ref_id'];
            else {
                $setAgama = [
                    'ref_id' => unik($mRefAgama, 'ref_id'),
                    'nama' => $row['agama_id_str'],
                ];
                if (!$mRefAgama->save($setAgama)) return $this->fail('Error: Referensi Agama gagal disimpan.');
                $idAgama = $setAgama['ref_id'];
            }
            $setGtk = [
                'nama' => $row['nama'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' => $row['tanggal_lahir'],
                'nik' => $row['nik'],
                'agama_id' => $idAgama,
            ];
            $cGtk = $mGtk
                ->groupStart()
                ->where('nik', $row['nik'])
                ->orWhere('nama', $row['nama'])
                ->groupEnd()
                ->first();
            if ($cGtk) {
                $setGtk['id'] = $cGtk['id'];
            } else {
                $setGtk['guru_pegawai_id'] = unik($mGtk, 'guru_pegawai_id');
            }
            if (!$mGtk->save($setGtk)) return $this->fail('Error: Data GTK gagal disimpan.');
            $success++;
        }
        return $success;
    }
}
