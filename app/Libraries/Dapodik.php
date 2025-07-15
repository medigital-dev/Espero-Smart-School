<?php

namespace App\Libraries;

use App\Models\DapodikSyncModel;
use App\Models\SemesterModel;

class Dapodik
{
    public function __construct()
    {
        helper(['string', 'indonesia', 'referensi']);
    }

    public function config(): array|null
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
        return null;
    }

    /**
     * @param string $type Enum ['getPesertaDidik','getSekolah','getRombonganBelajar','get]
     * @return array Response
     */
    public function sync($type): array
    {
        $client = \Config\Services::curlrequest();

        $config = $this->config();
        if (empty($config)) return ['message' => 'Error: Konfigurasi koneksi dapodik belum diset.', 'success' => false];

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
                    'message' => 'Data berhasil ditarik dari Aplikasi Dapodik.',
                    'data' => $this->renderData($result['rows'], $type),
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

    private function renderData($data, $type)
    {
        $mSemester = new SemesterModel();
        switch ($type) {
            case 'getPesertaDidik':
                $response = [];
                foreach ($data as $row) {
                    $setSemester = ['kode' => $row['semester_id']];
                    $cSemester = $mSemester->select(['semester_id', 'id'])->where('kode', $row['semester_id'])->first();
                    if (!$cSemester) $setSemester['semester_id'] = idUnik($mSemester, 'semester_id');
                    else {
                        $setSemester['semester_id'] = $cSemester['semester_id'];
                        $setSemester['id'] = $cSemester['id'];
                    }
                    $response[] = [
                        'peserta_didik_id' => $row["peserta_didik_id"],
                        'nama' => $row["nama"],
                        'nik' => $row["nik"],
                        'nisn' => $row["nisn"],
                        'nipd' => $row["nipd"],
                        'identitas' => [
                            'peserta_didik_id' => $row["peserta_didik_id"],
                            'nama' => eyd($row["nama"]),
                            'nisn' => $row["nisn"],
                            'jenis_kelamin' => $row["jenis_kelamin"],
                            'nik' => $row["nik"],
                            'tempat_lahir' => $row["tempat_lahir"],
                            'tanggal_lahir' => $row["tanggal_lahir"],
                            'agama_id' => saveAgama($row["agama_id_str"]),
                            'anak_ke' => $row["anak_keberapa"],
                        ],
                        'registrasi' => [
                            'registrasi_id' => $row["registrasi_id"],
                            'peserta_didik_id' => $row["peserta_didik_id"],
                            'jenis_registrasi' => saveJenisRegistrasi($row['jenis_pendaftaran_id_str']),
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
                        'ayah' => [
                            'nama' => eyd($row["nama_ayah"]),
                            'pekerjaan_id' => savePekerjaan($row["pekerjaan_ayah_id_str"]),
                        ],
                        'ibu' => [
                            'nama' => eyd($row["nama_ibu"]),
                            'pekerjaan_id' => savePekerjaan($row["pekerjaan_ibu_id_str"]),
                        ],
                        'wali' => [
                            'nama' => eyd($row["nama_wali"]),
                            'pekerjaan_id' => savePekerjaan($row["pekerjaan_wali_id_str"]),
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
                            'kurikulum_id' => saveKurikulum($row["kurikulum_id_str"],)
                        ],
                        'anggota_rombel' => [
                            'peserta_didik_id' => $row["peserta_didik_id"],
                            'anggota_id' => $row["anggota_rombel_id"],
                            'rombel_id' => $row["rombongan_belajar_id"],
                            'jenis_registrasi_rombel' => saveJenisRegistrasi($row['jenis_pendaftaran_id_str']),
                        ],
                        'kebutuhan_khusus' => explode(',', $row["kebutuhan_khusus"]),
                    ];
                }
                return $response;
                break;

            default:
                return [];
                break;
        }
    }
}
