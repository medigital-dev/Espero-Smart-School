<?php

namespace App\Controllers;

use App\Libraries\Dapodik as LibrariesDapodik;
use App\Models\DapodikSyncModel;
use App\Models\GuruPegawaiModel;
use App\Models\PesertaDidikModel;
use App\Models\RiwayatTestKoneksiModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class Dapodik extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['string', 'indonesia', 'dapodik', 'files', 'referensi', 'semester']);
    }

    public function koneksi(): string
    {
        $page = [
            'title' => 'SISPADU - Pengaturan Dapodik',
            'sidebar' => 'dapodik',
            'breadcrumb' => ['Pengaturan', 'Dapodik', 'Koneksi'],
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

    public function syncGtk()
    {
        $mGtk = new GuruPegawaiModel();
        $dapodik = new LibrariesDapodik();

        $request = $dapodik->sync('getGtk');
        if (!$request['success']) return $this->fail($request['message']);
        $success = 0;
        foreach ($request['data'] as $row) {
            $setGtk = [
                'nama' => $row['nama'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' => $row['tanggal_lahir'],
                'nik' => $row['nik'],
                'agama_id' => saveAgama($row['agama_id_str']),
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
                $send[] = $row;
            }
        }
        return $this->respond($send);
    }

    public function checkAllPd(): ResponseInterface
    {
        $req = syncDapodik('getPesertaDidik');
        if (!$req['success']) return $this->fail($req['message']);

        return $this->respond($req['data']);
    }

    public function getFromDapodik($id = null): ResponseInterface
    {
        $mPd = new PesertaDidikModel();
        $request = syncDapodik('getPesertaDidik');
        if (!$request['success']) return $this->fail($request['message']);
        $response = [];
        if ($id) {
            $cPd = $mPd->where('peserta_didik_id', $id)->first();
            if ($cPd) {
                foreach ($request['data'] as $row) {
                    if ($row['nik'] == $cPd['nik']) {
                        return $this->respond($row);
                    }
                }
            }
        } else $response = $request['data'];
        return $this->respond($response);
    }

    public function getFromFileImport($type): ResponseInterface
    {
        $mPd = new PesertaDidikModel();
        $file = $this->request->getFile('fileUpload');
        $dataId = explode(',', $this->request->getPost('dataId'));
        $idSemester = $this->request->getPost('idSemester');
        if (!$file) return $this->fail('File untuk di import tidak ditemukan.');
        $result = importDapodik($file, 'pesertaDidik');
        if (!$result['success']) return $this->fail($result['message']);
        $rows = $result['data'];
        $response = [];
        foreach ($rows as $row) {
            $cPd = $mPd->select('peserta_didik_id')
                ->where('nik', $row['nik'])
                ->where('nisn', $row['nisn'])
                ->first();
            $id = $cPd['peserta_didik_id'] ?? null;
            if ($type === 'new' && $id) continue;
            if ($type === 'checked' && (!$id || !in_array($id, $dataId))) continue;
            if ($type === 'database' && !$id) continue;

            $row['peserta_didik_id'] = $id ?: idUnik($mPd, 'peserta_didik_id');
            $row['anggotaRombel']['semester_kode'] = semester($idSemester, 'kode');
            $response[] = $row;
        }
        return $this->respond($response);
    }
}
