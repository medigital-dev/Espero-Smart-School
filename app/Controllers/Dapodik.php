<?php

namespace App\Controllers;

use App\Models\DapodikSyncModel;
use App\Models\PesertaDidikModel;
use App\Models\RegistrasiPesertaDidikModel;
use App\Models\RiwayatTestKoneksiModel;
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
            'name' => 'Koneksi Aplikasi Dapodik',
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

    private function getConfig()
    {
        $mDapodik = new DapodikSyncModel();
        $config = $mDapodik->where('status', true)->first();
        if ($config) {
            return [
                'url' => $config['url'],
                'port' => $config['port'],
                'npsn' => $config['npsn'],
                'token' => $config['token'],
            ];
        }
        return [];
    }
    /**
     * @param string $type Enum ['getPesertaDidik','getSekolah','getRombonganBelajar','get]
     * @return array Response
     */
    private function makeRequest($type, $config = [])
    {
        $client = \Config\Services::curlrequest();
        if (empty($config)) {
            $config = $this->getConfig();
            if (empty($config)) return ['message' => 'Error: Konfigurasi koneksi dapodik belum diset.', 'success' => false];
        }
        $url = 'http://' . $config['url'] . ':' . $config['port'] . '/WebService/' . $type . '?npsn=' . $config['npsn'];
        $token = 'Authorization: Bearer ' . $config['token'];

        $options = [
            'headers' => ['Authorization' => $token],
            'http_errors' => false,
            'debug' => true,
        ];

        try {
            $response = $client->get($url, $options);
            $statusCode = $response->getStatusCode();
            if ($statusCode !== 200) {
                return  [
                    'success' => false,
                    'http_code' => $statusCode,
                    'status_code' => 'error',
                    'message' => $response->getReason(),
                    'data' => [],
                ];
            }
            $hasil = $response->getBody();
            $awal = strpos($hasil, '{');
            $result = json_decode(substr($hasil, $awal), true);
            if (isset($result['results'])) {
                $response = [
                    'success' => true,
                    'http_code' => 200,
                    'status_code' => 'success',
                    'message' => 'Koneksi ke aplikasi Dapodik berhasil.',
                    'data' => $result['rows'],
                ];
            } else {
                $response = $result;
                $response['data'] = [];
            }

            return $response;
        } catch (\Exception $e) {
            return  [
                'success' => false,
                'http_code' => 400,
                'status_code' => 'error',
                'message' => $e->getMessage(),
                'data' => [],
            ];
        }
    }

    public function testKoneksi()
    {
        $mDapodik = new DapodikSyncModel();
        $mRiwayatTest = new RiwayatTestKoneksiModel();
        $id = $this->request->getVar('id');
        $config = $mDapodik->where('dapodik_id', $id)->first();
        if (empty($config))
            return $this->fail('Error: Konfigurasi dapodik belum diset aktif.');

        $result = $this->makeRequest('getSekolah', $config);

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

        $request = $this->makeRequest('getPesertaDidik');
        if (!$request['success']) return $this->fail($request['message']);

        foreach ($request['data'] as $row) {
            $setRegistrasi = [
                'registrasi_id' => $row['registrasi_id'],
                'peserta_didik_id' => $row['peserta_didik_id'],
                'jenis_registrasi' => $row['jenis_pendaftaran_id_str'],
                'tanggal_registrasi' => $row['tanggal_masuk_sekolah'],
                'nipd' => $row['nipd'],
                'asal_sekolah' => $row['sekolah_asal'],
            ];

            $setPd = [
                'peserta_didik_id' => $row['peserta_didik_id'],
                'nama' => $row['nama'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' => $row['tanggal_lahir'],
                'nisn' => $row['nisn'],
                'nik' => $row['nik'],
                'agama' => $row['agama_id'],
            ];

            $setAgama = [
                'agama_id' => $row['agama_id'],
                'nama' => $row['agama_id_str'],
            ];

            $setKontakPd = [
                'peserta_didik_id' => $row['peserta_didik_id'],
                'telepon' => $row['nomor_telepon_rumah'],
                'hp' => $row['nomor_telepon_seluler'],
                'email' => $row['email'],
            ];

            $setOrtuAyah = [
                'nama' => $row['nama_ayah'],
                'pekerjaan_id' => $row['pekerjaan_ayah_id'],
            ];

            $setPekerjaanAyah = [
                'pekerjaan_id' => $row['pekerjaan_ayah_id'],
                'nama' => $row['pekerjaan_ayah_id_str'],
            ];

            $setOrtuIbu = [
                'nama' => $row['nama_ibu'],
                'pekerjaan_id' => $row['pekerjaan_ibu_id'],
            ];

            $setPekerjaanIbu = [
                'pekerjaan_id' => $row['pekerjaan_ibu_id'],
                'nama' => $row['pekerjaan_ibu_id_str'],
            ];

            $setOrtuWali = [
                'nama' => $row['nama_wali'],
                'pekerjaan_id' => $row['pekerjaan_wali_id'],
            ];

            $setPekerjaanWali = [
                'pekerjaan_id' => $row['pekerjaan_wali_id'],
                'nama' => $row['pekerjaan_wali_id_str'],
            ];

            $setPeriodik = [
                'tinggi_badan' => $row['tinggi_badan'],
                'berat_badan' => $row['berat_badan'],
            ];





            $cPd = $mPesertaDidik->where('peserta_didik_id', $row['peserta_didik_id'])->first();
            if ($cPd) $temp['id'] = $cPd['id'];
            if (!$mPesertaDidik->save($temp)) return $this->fail('Error: Peserta Didik an. ' . $row['nama'] . ' gagal disimpan.');

            unset($temp['id']);
            $cRegistrasi = $mRegistrasi->where('peserta_didik_id', $row['peserta_didik_id'])->first();
            if ($cRegistrasi) $temp['id'] = $cRegistrasi['id'];
            if (!$mRegistrasi->save($temp)) return $this->fail('Error: Peserta Didik an. ' . $row['nama'] . ' gagal disimpan.');
        }

        $response = [
            'message' => count($request['data']) . ' Data peserta didik berhasil disinkronkan.',
        ];
        return $this->respond($response);
    }
}
