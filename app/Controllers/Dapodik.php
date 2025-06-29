<?php

namespace App\Controllers;

use App\Libraries\Dapodik as LibrariesDapodik;
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
use App\Models\RefJenisRegistrasiModel;
use App\Models\RefTransportasiModel;
use App\Models\RegistrasiPesertaDidikModel;
use App\Models\RiwayatTestKoneksiModel;
use App\Models\RombelModel;
use App\Models\SemesterModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class Dapodik extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['string', 'indonesia', 'dapodik', 'files', 'referensi']);
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

        if (!$data) $set['dapodik_id'] = idUnik($mDapodik, 'dapodik_id');
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
            'riwayat_id' => idUnik($mRiwayatTest, 'riwayat_id'),
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

        $request = syncDapodik('getPesertaDidik');

        if (!$request['success']) return $this->fail($request['message']);
        $error = [];
        $success = 0;
        foreach ($request['data'] as $row) {
            $idPd = $row['peserta_didik_id'];
            $nik = $row['nik'];

            $setRegistrasi = [
                'registrasi_id' => $row['registrasi_id'],
                'peserta_didik_id' => $row['peserta_didik_id'],
                'jenis_registrasi' => saveJenisRegistrasi($row['jenis_pendaftaran_id_str'], ['ref_id' => $row['jenis_pendaftaran_id']]),
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
            if (!$mRegistrasi->save($setRegistrasi))
                $error[] = [
                    'created_at' => date('Y-m-d H:i:s'),
                    'peserta_didik_id' => $idPd,
                    'nama' => $row['nama'],
                    'type' => 'saveRegistrasi',
                    'message' => 'Data registrasi gagal disimpan.',
                    'data' => $setRegistrasi,
                ];

            $setPd = [
                'peserta_didik_id' => $row['peserta_didik_id'],
                'nama' => $row['nama'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' => $row['tanggal_lahir'],
                'nisn' => $row['nisn'],
                'nik' => $row['nik'],
                'agama_id' => saveAgama($row['agama_id_str']),
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
            if (!$mPesertaDidik->save($setPd)) $error[] = [
                'created_at' => date('Y-m-d H:i:s'),
                'peserta_didik_id' => $idPd,
                'nama' => $row['nama'],
                'type' => 'savePd',
                'message' => 'Data peserta didik gagal disimpan.',
                'data' => $setPd,
            ];

            $setKontakPd = [
                'nik' => $nik,
                'telepon' => $row['nomor_telepon_rumah'],
                'hp' => $row['nomor_telepon_seluler'],
                'email' => $row['email'],
            ];
            $cKontak = $mKontak->where('nik', $nik)->first();
            if ($cKontak) $setKontakPd['id'] = $cKontak['id'];
            else $setKontakPd['kontak_id'] = idUnik($mKontak, 'kontak_id');
            if (!$mKontak->save($setKontakPd))
                $error[] = [
                    'created_at' => date('Y-m-d H:i:s'),
                    'peserta_didik_id' => $idPd,
                    'nama' => $row['nama'],
                    'type' => 'saveContact',
                    'message' => 'Data kontak gagal disimpan.',
                    'data' => $setKontakPd,
                ];

            // Orangtua
            $idAyah = $idIbu = $idWali = null;
            // Mulai Ortu: Ayah
            if ($row['nama_ayah']) {
                $setOrtuAyah = [
                    'nama' => $row['nama_ayah'],
                    'pekerjaan_id' => savePekerjaan($row['pekerjaan_ayah_id_str']),
                    'jenis_kelamin' => 'L',
                ];
                $cAyah = $mOrtuWali->where('nama', $setOrtuAyah['nama'])->first();
                if (!$cAyah) {
                    $setOrtuAyah['orangtua_id'] = idUnik($mOrtuWali, 'orangtua_id');
                } else {
                    $setOrtuAyah['id'] = $cAyah['id'];
                    $setOrtuAyah['orangtua_id'] = $cAyah['orangtua_id'];
                };
                if (!$mOrtuWali->save($setOrtuAyah))
                    $error[] = [
                        'created_at' => date('Y-m-d H:i:s'),
                        'peserta_didik_id' => $idPd,
                        'nama' => $row['nama'],
                        'type' => 'saveAyah',
                        'message' => 'Data ayah gagal disimpan.',
                        'data' => $setOrtuAyah,
                    ];
                $idAyah = $setOrtuAyah['orangtua_id'];
            }
            // Akhir Ortu: Ayah

            // Mulai Ortu: Ibu
            if ($row['nama_ibu']) {
                $setOrtuIbu = [
                    'nama' => $row['nama_ibu'],
                    'pekerjaan_id' => savePekerjaan($row['pekerjaan_ibu_id_str']),
                    'jenis_kelamin' => 'P',
                ];
                $cIbu = $mOrtuWali->where('nama', $setOrtuIbu['nama'])->first();
                if (!$cIbu) {
                    $setOrtuIbu['orangtua_id'] = idUnik($mOrtuWali, 'orangtua_id');
                } else {
                    $setOrtuIbu['id'] = $cIbu['id'];
                    $setOrtuIbu['orangtua_id'] = $cIbu['orangtua_id'];
                }
                if (!$mOrtuWali->save($setOrtuIbu))
                    $error[] = [
                        'created_at' => date('Y-m-d H:i:s'),
                        'peserta_didik_id' => $idPd,
                        'nama' => $row['nama'],
                        'type' => 'saveIbu',
                        'message' => 'Data ibu gagal disimpan.',
                        'data' => $setOrtuIbu,
                    ];
                $idIbu = $setOrtuIbu['orangtua_id'];
            }
            // Akhir Ortu: Ibu

            // Mulai Ortu: Wali
            if ($row['nama_wali']) {
                $setOrtuWali = [
                    'nama' => $row['nama_wali'],
                    'pekerjaan_id' => savePekerjaan($row['pekerjaan_wali_id_str']),
                ];
                $cWali = $mOrtuWali->where('nama', $setOrtuWali['nama'])->first();
                if (!$cWali) {
                    $setOrtuWali['orangtua_id'] = idUnik($mOrtuWali, 'orangtua_id');
                } else {
                    $setOrtuWali['id'] = $cWali['id'];
                    $setOrtuWali['orangtua_id'] = $cWali['orangtua_id'];
                }
                if (!$mOrtuWali->save($setOrtuWali))
                    $error[] = [
                        'created_at' => date('Y-m-d H:i:s'),
                        'peserta_didik_id' => $idPd,
                        'nama' => $row['nama'],
                        'type' => 'saveWali',
                        'message' => 'Data wali gagal disimpan.',
                        'data' => $setOrtuWali,
                    ];
                $idWali = $setOrtuWali['orangtua_id'];
            }
            // Akhir Ortu: Wali

            // Set Orangtua Wali Pd
            $setOrtuWaliPd = [
                'peserta_didik_id' => $idPd,
                'ayah_id' => $idAyah,
                'ibu_id' => $idIbu,
                'wali_id' => $idWali,
            ];
            $cOrtuWaliPd = $mOrtuWaliPd->where('peserta_didik_id', $idPd)->first();
            if (!$cOrtuWaliPd) $setOrtuWaliPd['ortupd_id'] = idUnik($mOrtuWaliPd, 'ortupd_id');
            else $setOrtuWaliPd['id'] = $cOrtuWaliPd['id'];
            if (!$mOrtuWaliPd->save($setOrtuWaliPd))
                $error[] = [
                    'created_at' => date('Y-m-d H:i:s'),
                    'peserta_didik_id' => $idPd,
                    'nama' => $row['nama'],
                    'type' => 'saveOrtuWaliPd',
                    'message' => 'Data orangtua/wali peserta didik gagal disimpan.',
                    'data' => $setOrtuWaliPd,
                ];

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
                $setPeriodik['periodik_id'] = idUnik($mPeriodik, 'periodik_id');
                if (!$mPeriodik->save($setPeriodik))
                    $error[] = [
                        'created_at' => date('Y-m-d H:i:s'),
                        'peserta_didik_id' => $idPd,
                        'nama' => $row['nama'],
                        'type' => 'savePeriodik',
                        'message' => 'Data periodik peserta didik gagal disimpan.',
                        'data' => $setPeriodik
                    ];
            }

            $setSemester = [
                'kode' => $row['semester_id'],
                'status' => true,
            ];
            $mSemester->where('status', true)->set('status', false)->update();
            $cSemester = $mSemester->where('kode', $row['semester_id'])
                ->first();
            if (!$cSemester)
                $setSemester['semester_id'] = idUnik($mSemester, 'semester_id');
            else {
                $setSemester['id'] = $cSemester['id'];
                $setSemester['semester_id'] = $cSemester['semester_id'];
            };
            if (!$mSemester->save($setSemester))
                $error[] = [
                    'created_at' => date('Y-m-d H:i:s'),
                    'peserta_didik_id' => $idPd,
                    'nama' => $row['nama'],
                    'type' => 'saveSemester',
                    'message' => 'Data semester gagal disimpan.',
                    'data' => $setSemester,
                ];

            $setRombel = [
                'rombel_id' => $row['rombongan_belajar_id'],
                'tingkat_pendidikan' => $row['tingkat_pendidikan_id'],
                'nama' => $row['nama_rombel'],
                'semester_id' => $setSemester['semester_id']
            ];
            $cRombel = $mRombel->where('rombel_id', $setRombel['rombel_id'])->first();
            if ($cRombel)
                $setRombel['id'] = $cRombel['id'];
            if (!$mRombel->save($setRombel))
                $error[] = [
                    'created_at' => date('Y-m-d H:i:s'),
                    'peserta_didik_id' => $idPd,
                    'nama' => $row['nama'],
                    'type' => 'saveRombel',
                    'message' => 'Data rombongan belajar gagal disimpan.',
                    'data' => $setRombel,
                ];

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
                if (!$mAnggotaRombel->save($setAnggotaRombel))
                    $error[] = [
                        'created_at' => date('Y-m-d H:i:s'),
                        'peserta_didik_id' => $idPd,
                        'nama' => $row['nama'],
                        'type' => 'saveAnggotaRombel',
                        'message' => 'Data anggota rombongan belajar gagal disimpan.',
                        'data' => $setAnggotaRombel,
                    ];
            }
        }

        $response = [
            'status' => true,
            'message' => count($request['data']) . ' Data peserta didik berhasil disinkronkan.',
            'errors' => $error
        ];
        return $this->respond($response);
    }

    public function importPd()
    {
        $mPd = new PesertaDidikModel();
        $mRegistrasi = new RegistrasiPesertaDidikModel();
        $mOrangtuaWali = new OrangtuaWaliModel();
        $mOrtuWaliPd = new OrtuWaliPdModel();
        $mAlamat = new AlamatModel();
        $mRefTransportasi = new RefTransportasiModel();

        $file = $this->request->getFile('fileUpload');
        $result = importExcel($file);
        if (!$result['status']) return $this->fail($result);
        $rows = $result['data'];
        if ($rows[0][0] !== 'Daftar Peserta Didik' || $rows[4][0] !== 'No' || $rows[4][1] !== 'Nama' || $rows[4][2] !== 'NIPD' || $rows[4][3] !== 'JK' || $rows[4][4] !== 'NISN' || $rows[4][5] !== 'Tempat Lahir' || $rows[4][6] !== 'Tanggal Lahir' || $rows[4][7] !== 'NIK' || $rows[4][8] !== 'Agama')
            return $this->fail('File yang diupload bukan hasil unduh daftar Peserta Didik di aplikasi dapodik atau file telah mengalami perubahan.');
        $importStatus = [
            'success' => [],
            'error' => [],
        ];
        foreach ($rows as $row) {
            if ((int)$row[0] > 0) {
                $nisn = $row[4];

                // Start Peserta Didik
                $idPd = idUnik($mPd, 'peserta_didik_id');
                $setPd = [
                    'nama' => $row[1],
                    'jenis_kelamin' => $row[3],
                    'tempat_lahir' => $row[5],
                    'tanggal_lahir' => $row[6],
                    'nik' => $row[7],
                    'agama_id' => saveAgama($row[8]),
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

                if (!$mPd->save($setPd)) $importStatus['error'][] = ['nama' => $row[1], 'type' => 'savePd', 'nisn' => $nisn, 'message' => $mPd->errors()];
                else $importStatus['success'][] = ['nama' => $row[1], 'type' => 'savePd', 'nisn' => $nisn, 'message' => 'Import berhasil.'];
                // End Peserta Didik

                // Start Registrasi
                $cRegistrasi = $mRegistrasi
                    ->groupStart()
                    ->where('nipd', $row[2])
                    ->orWhere('peserta_didik_id', $setPd['peserta_didik_id'])
                    ->groupEnd()
                    ->first();
                if (!$cRegistrasi) {
                    $setRegistrasi = [
                        'registrasi_id' => idUnik($mRegistrasi, 'registrasi_id'),
                        'nipd' => $row[2],
                        'peserta_didik_id' => $setPd['peserta_didik_id'],
                        'asal_sekolah' => $row[56],
                    ];
                    if (!$mRegistrasi->save($setRegistrasi)) $importStatus['error'][] = ['nama' => $row[1], 'type' => 'saveRegistrasi', 'nisn' => $nisn, 'message' => $mRegistrasi->errors()];
                    else $importStatus['success'][] = ['nama' => $row[1], 'type' => 'saveRegistrasi', 'nisn' => $nisn, 'message' => 'Import berhasil.'];
                }
                // End Registrasi

                // Start Alat Transportasi
                $setTranspot = ['nama' => $row[17]];
                $cTranspot = $mRefTransportasi
                    ->where('nama', $row[17])
                    ->first();
                if (!$cTranspot) {
                    $setTranspot['ref_id'] = idUnik($mRefTransportasi, 'ref_id');
                    if (!$mRefTransportasi->save($setTranspot)) $importStatus['error'][] = ['nama' => $row[1], 'type' => 'saveTranspot', 'nisn' => $nisn, 'message' => $mRefTransportasi->errors()];
                    else $importStatus['success'][] = ['nama' => $row[1], 'type' => 'saveTranspot', 'nisn' => $nisn, 'message' => 'Import berhasil.'];
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
                    ->where('nik', $row[7])
                    ->first();
                if (!$cAlamat) $setAlamat['alamat_id'] = idUnik($mAlamat, 'alamat_id');
                else {
                    $setAlamat['id'] = $cAlamat['id'];
                    $setAlamat['alamat_id'] = $cAlamat['alamat_id'];
                }
                if (!$mAlamat->save($setAlamat)) $importStatus['error'][] = ['nama' => $row[1], 'type' => 'saveAlamat', 'nisn' => $nisn, 'message' => $mAlamat->errors()];
                else $importStatus['success'][] = ['nama' => $row[1], 'type' => 'saveAlamat', 'nisn' => $nisn, 'message' => 'Import berhasil.'];
                // End Alamat

                $idAyah = $idIbu = $idWali = null;
                // Start Ayah
                if ($row[24]) {
                    $setAyah = [
                        'nama' => $row[24],
                        'jenis_kelamin' => 'L',
                        'pendidikan_id' => savePendidikan($row[26]),
                        'pekerjaan_id' => savePekerjaan($row[27]),
                        'penghasilan_id' => savePenghasilan($row[28]),
                        'nik' => $row[29],
                    ];
                    $mOrangtuaWali->where('nama', $row[30]);
                    if ($row[29] !== null)
                        $mOrangtuaWali->orWhere('nik', $row[35]);
                    $cAyah = $mOrangtuaWali->first();
                    if ($cAyah) {
                        $setAyah['id'] = $cAyah['id'];
                        $setAyah['orangtua_id'] = $cAyah['orangtua_id'];
                    } else $setAyah['orangtua_id'] = idUnik($mOrangtuaWali, 'orangtua_id');
                    if (!$mOrangtuaWali->save($setAyah)) $importStatus['error'][] = ['nama' => $row[1], 'type' => 'saveAyah', 'nisn' => $nisn, 'message' => $mOrangtuaWali->errors()];
                    else $importStatus['success'][] = ['nama' => $row[1], 'type' => 'saveAyah', 'nisn' => $nisn, 'message' => 'Import berhasil.'];
                    $idAyah = $setAyah['orangtua_id'];
                }
                // End Ayah
                // Start Ibu
                if ($row[30]) {
                    $setIbu = [
                        'nama' => $row[30],
                        'jenis_kelamin' => 'P',
                        'pendidikan_id' => savePendidikan($row[32]),
                        'pekerjaan_id' => savePekerjaan($row[33]),
                        'penghasilan_id' => savePenghasilan($row[34]),
                        'nik' => $row[35],
                    ];
                    $mOrangtuaWali->where('nama', $row[30]);
                    if ($row[35] !== null)
                        $mOrangtuaWali->orWhere('nik', $row[35]);
                    $cIbu = $mOrangtuaWali->first();
                    if ($cIbu) {
                        $setIbu['id'] = $cIbu['id'];
                        $setIbu['orangtua_id'] = $cIbu['orangtua_id'];
                    } else $setIbu['orangtua_id'] = idUnik($mOrangtuaWali, 'orangtua_id');
                    if (!$mOrangtuaWali->save($setIbu)) $importStatus['error'][] = ['nama' => $row[1], 'type' => 'saveIbu', 'nisn' => $nisn, 'message' => $mOrangtuaWali->errors()];
                    else $importStatus['success'][] = ['nama' => $row[1], 'type' => 'saveIbu', 'nisn' => $nisn, 'message' => 'Import berhasil.'];
                    $idIbu = $setIbu['orangtua_id'];
                }
                // End Ibu
                // Start Wali
                if ($row[36]) {
                    $setWali = [
                        'nama' => $row[36],
                        'pendidikan_id' => savePendidikan($row[38]),
                        'pekerjaan_id' => savePekerjaan($row[39]),
                        'penghasilan_id' => savePenghasilan($row[40]),
                        'nik' => $row[41],
                    ];
                    $mOrangtuaWali->where('nama', $row[30]);
                    if ($row[41] !== null)
                        $mOrangtuaWali->orWhere('nik', $row[35]);
                    $cWali = $mOrangtuaWali->first();
                    if ($cWali) {
                        $setWali['id'] = $cWali['id'];
                        $setWali['orangtua_id'] = $cWali['orangtua_id'];
                    } else $setWali['orangtua_id'] = idUnik($mOrangtuaWali, 'orangtua_id');
                    if (!$mOrangtuaWali->save($setWali)) $importStatus['error'][] = ['nama' => $row[1], 'type' => 'saveWali', 'nisn' => $nisn, 'message' => $mOrangtuaWali->errors()];
                    else $importStatus['success'][] = ['nama' => $row[1], 'type' => 'saveWali', 'nisn' => $nisn, 'message' => 'Import berhasil.'];
                    $idWali = $setWali['orangtua_id'];
                }
                // End Wali

                // Start Orangtua Wali Pd
                $setOrtuWaliPd = [
                    'peserta_didik_id' => $setPd['peserta_didik_id'],
                    'ayah_id' => $idAyah,
                    'ibu_id' => $idIbu,
                    'wali_id' => $idWali,
                ];
                $cOrtuWaliPd = $mOrtuWaliPd->where('peserta_didik_id', $setPd['peserta_didik_id'])->first();
                if ($cOrtuWaliPd) $setOrtuWaliPd['id'] = $cOrtuWaliPd['id'];
                else $setOrtuWaliPd['ortupd_id'] = idUnik($mOrtuWaliPd, 'ortupd_id');
                if (!$mOrtuWaliPd->save($setOrtuWaliPd)) $importStatus['error'][] = ['nama' => $row[1], 'type' => 'saveOrtuWaliPd', 'nisn' => $nisn, 'message' => $mOrtuWaliPd->errors()];
                else $importStatus['success'][] = ['nama' => $row[1], 'type' => 'saveOrtuWaliPd', 'nisn' => $nisn, 'message' => 'Import berhasil.'];
                // End Orangtua Wali Pd
            }
        }
        $response = [
            'status' => true,
            'message' => 'Data berhasil diimport.',
            'result' => $importStatus,
        ];
        return $this->respond($response);
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
                    'ref_id' => idUnik($mRefAgama, 'ref_id'),
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
                $setGtk['guru_pegawai_id'] = idUnik($mGtk, 'guru_pegawai_id');
            }
            if (!$mGtk->save($setGtk)) return $this->fail('Error: Data GTK gagal disimpan.');
            $success++;
        }
        return $success;
    }

    public function checkNewPd(): ResponseInterface
    {
        $mPd = new PesertaDidikModel();
        $mSemester = new SemesterModel();
        $req = syncDapodik('getPesertaDidik');
        if (!$req['success']) return $this->fail($req['message']);
        $send = [];
        foreach ($req['data'] as $row) {
            $cPd = $mPd
                ->where('peserta_didik_id', $row['peserta_didik_id'])
                ->orWhere('nama', $row['nama'])
                ->orWhere('nik', $row['nik'])
                ->orWhere('nisn', $row['nisn'])
                ->first();
            if (!$cPd) {
                $setSemester = ['kode' => $row['semester_id']];
                $cSemester = $mSemester->select(['semester_id', 'id'])->where('kode', $row['semester_id'])->first();
                if (!$cSemester) $setSemester['semester_id'] = idUnik($mSemester, 'semester_id');
                else {
                    $setSemester['semester_id'] = $cSemester['semester_id'];
                    $setSemester['id'] = $cSemester['id'];
                }
                $send[] = [
                    'peserta_didik_id' => $row["peserta_didik_id"],
                    'nama' => $row["nama"],
                    'nik' => $row["nik"],
                    'nisn' => $row["nisn"],
                    'nipd' => $row["nipd"],
                    'peserta_didik' => [
                        'peserta_didik_id' => $row["peserta_didik_id"],
                        'nama' => eyd($row["nama"]),
                        'nisn' => $row["nisn"],
                        'jenis_kelamin' => $row["jenis_kelamin"],
                        'nik' => $row["nik"],
                        'tempat_lahir' => $row["tempat_lahir"],
                        'tanggal_lahir' => $row["tanggal_lahir"],
                        'agama_id' => saveReferensi('agama', $row["agama_id_str"]),
                    ],
                    'registrasi' => [
                        'registrasi_id' => $row["registrasi_id"],
                        'peserta_didik_id' => $row["peserta_didik_id"],
                        'jenis_registrasi' => saveReferensi('jenisRegistrasi', $row['jenis_pendaftaran_id_str']),
                        'nipd' => $row["nipd"],
                        'tanggal_registrasi' => $row["tanggal_masuk_sekolah"],
                        'asal_Sekolah' => $row["sekolah_asal"],
                    ],
                    'kontak' => [
                        'nik' => $row["nik"],
                        'telepon' => $row["nomor_telepon_rumah"],
                        'hp' => $row["nomor_telepon_seluler"],
                        'email' => $row["email"],
                    ],
                    'orangtua_wali' => [
                        'ayah' => [
                            'nama' => $row["nama_ayah"],
                            'pekerjaan_id' => saveReferensi('pekerjaan', $row["pekerjaan_ayah_id_str"]),
                        ],
                        'ibu' => [
                            'nama' => $row["nama_ibu"],
                            'pekerjaan_id' => saveReferensi('pekerjaan', $row["pekerjaan_ibu_id_str"]),
                        ],
                        'wali' => [
                            'nama' => $row["nama_wali"],
                            'pekerjaan_id' => saveReferensi('pekerjaan', $row["pekerjaan_wali_id_str"]),
                        ],
                        'anak_ke' => $row["anak_keberapa"],
                    ],
                    'periodik' => [
                        'nik' => $row["nik"],
                        'tinggi_badan' => $row["tinggi_badan"],
                        'berat_badan' => $row["berat_badan"],
                    ],
                    'rombongan_belajar' => [
                        'rombel_id' => $row["rombongan_belajar_id"],
                        'semester_id' => $setSemester['semester_id'],
                        'tingkat_pendidikan' => $row["tingkat_pendidikan_id"],
                        'nama' => $row["nama_rombel"],
                        'kurikulum_id' => saveReferensi('kurikulum', $row["kurikulum_id_str"],)
                    ],
                    'anggota_rombel' => [
                        'peserta_didik_id' => $row["peserta_didik_id"],
                        'anggota_id' => $row["anggota_rombel_id"],
                        'rombel_id' => $row["rombongan_belajar_id"],
                        'jenis_registrasi_rombel' => saveReferensi('jenisRegistrasi', $row['jenis_pendaftaran_id_str']),
                    ],
                    'kebutuhan_khusus' => $row["kebutuhan_khusus"],
                ];
            }
        }
        return $this->respond($send);
    }

    public function getNewPd($id): ResponseInterface
    {
        $req = syncDapodik('getPesertaDidik');
        if (!$req['success']) return $this->fail($req['message']);
        foreach ($req['data'] as $row) {
            if ($id == $row['peserta_didik_id']) {
                return $this->respond($row);
            }
        }
        return $this->respond([]);
    }
}
