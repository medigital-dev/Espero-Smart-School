<?php

namespace App\Libraries;

use App\Models\DapodikSyncModel;
use App\Models\RefJenisKebutuhanKhususModel;
use App\Models\SemesterModel;
use CodeIgniter\HTTP\Files\UploadedFile;

class Dapodik
{
    public function __construct()
    {
        helper(['string', 'indonesia', 'referensi', 'file']);
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
                    'data' => $this->renderDataSync($result['rows'], $type),
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

    private function renderDataSync($data, $type)
    {
        switch ($type) {
            case 'getPesertaDidik':
                $response = [];
                foreach ($data as $row) {
                    $temp = [
                        'peserta_didik_id' => $row["peserta_didik_id"],
                        'nama' => $row["nama"],
                        'nik' => $row["nik"],
                        'nisn' => $row["nisn"],
                        'nipd' => $row["nipd"] ?? null,
                        'identitas' => [
                            'peserta_didik_id' => $row["peserta_didik_id"],
                            'nama' => eyd($row["nama"]),
                            'nisn' => $row["nisn"],
                            'jenis_kelamin' => saveJenisKelamin($row['jenis_kelamin'] == 'L' ? 'Laki-laki' : ($row['jenis_kelamin'] == 'P' ? 'Perempuan' : ''), ['kode' => $row["jenis_kelamin"]]),
                            'nik' => $row["nik"],
                            'tempat_lahir' => $row["tempat_lahir"],
                            'tanggal_lahir' => $row["tanggal_lahir"],
                            'agama_id' => saveAgama($row["agama_id_str"]),
                            'anak_ke' => $row["anak_keberapa"],
                        ],
                        'registrasi_id' => $row["registrasi_id"] ?? null,
                        'registrasi' => null,
                        'kontak' => [
                            'nik' => $row["nik"],
                            'telepon' => $row["nomor_telepon_rumah"],
                            'hp' => $row["nomor_telepon_seluler"],
                            'email' => $row["email"],
                        ],
                        'ayah' => null,
                        'ibu' => [
                            'nama' => eyd($row["nama_ibu"]),
                            'jenis_kelamin' => saveJenisKelamin('Perempuan', ['kode' => 'P']),
                            'pekerjaan_id' => savePekerjaan($row["pekerjaan_ibu_id_str"]),
                        ],
                        'wali' => null,
                        'periodik' => null,
                        'rombel' => null,
                        'anggotaRombel' => null,
                        'difabel' => $this->renderKebutuhanKhusus($row['nik'], $row['kebutuhan_khusus']),
                    ];

                    if (isset($row['registrasi_id'])) $temp['registrasi'] = [
                        'registrasi_id' => $row["registrasi_id"],
                        'peserta_didik_id' => $row["peserta_didik_id"],
                        'jenis_registrasi' => saveJenisRegistrasi($row['jenis_pendaftaran_id_str']),
                        'nipd' => $row["nipd"] ?? '',
                        'tanggal_registrasi' => $row["tanggal_masuk_sekolah"],
                        'asal_Sekolah' => $row["sekolah_asal"],
                    ];

                    if (!empty($row['nama_ayah'])) $temp['ayah'] = [
                        'nama' => eyd($row["nama_ayah"]),
                        'jenis_kelamin' => saveJenisKelamin('Laki-laki', ['kode' => 'L']),
                        'pekerjaan_id' => savePekerjaan($row["pekerjaan_ayah_id_str"]),
                    ];

                    if (isset($row['tinggi_badan']) || isset($row['berat_badan'])) $temp['periodik'] = [
                        'nik' => $row["nik"],
                        'tinggi_badan' => $row["tinggi_badan"],
                        'berat_badan' => $row["berat_badan"],
                    ];

                    if (isset($row['rombongan_belajar_id'])) $temp['rombel'] = [
                        'rombel_id' => $row["rombongan_belajar_id"],
                        'semester_kode' => $row['semester_id'],
                        'tingkat_pendidikan' => $row["tingkat_pendidikan_id"],
                        'nama' => $row["nama_rombel"],
                        'kurikulum_id' => saveKurikulum($row["kurikulum_id_str"],)
                    ];

                    if (isset($row['anggota_rombel_id'])) $temp['anggotaRombel'] = [
                        'anggota_id' => $row["anggota_rombel_id"],
                        'peserta_didik_id' => $row["peserta_didik_id"],
                        'rombel_id' => $row["rombongan_belajar_id"],
                        // 'jenis_registrasi_rombel' => saveJenisRegistrasi($row['jenis_pendaftaran_id_str']),
                    ];
                    $response[] = $temp;
                }
                return $response;
                break;

            default:
                return [];
                break;
        }
    }

    private function renderKebutuhanKhusus($nik, $data): array|string
    {
        $mRef = new RefJenisKebutuhanKhususModel();
        if ($data == 'Tidak ada') return [];
        $array = explode(',', $data);
        $send = [];
        if (count($array) == 1) {
            list($kode, $nama) = array_map('trim', explode(' - ', $data, 2));
            $c = $mRef->where('kode', $kode)->first();
            $temp = ['nama' => $nama, 'kode' => $kode];
            if ($c) {
                $temp['ref_id'] = $c['ref_id'];
                $temp['id'] = $c['id'];
            } else $temp['ref_id'] = idUnik($mRef, 'ref_id');
            if (!$mRef->save($temp)) throw new \Exception('Referensi kebutuhan khusus gagal disimpan.');
            $send[] = ['nik' => $nik, 'ref_id' => $temp['ref_id']];
        } else {
            foreach ($array as $row) {
                $temp = ['kode' => $row];
                $c = $mRef->where('kode', $row)->first();
                if (!$c) {
                    $temp['ref_id'] = idUnik($mRef, 'ref_id');
                    $temp['nama'] = '';
                } else {
                    $temp['ref_id'] = $c['ref_id'];
                    $temp['id'] = $c['id'];
                }
                if (!$mRef->save($temp)) throw new \Exception('Referensi kebutuhan khusus gagal disimpan.');
                $send[] = ['nik' => $nik, 'ref_id' => $temp['ref_id']];
            }
        }
        return $send;
    }

    public function import(UploadedFile $file, $type): array
    {
        $data = [];
        try {
            $result = importExcel($file);

            if (!$result['status']) return $result;

            $rows = $result['data'];
            if ($type == 'pesertaDidik') {
                // validasi file peserta didik dari dapodik
                if ($rows[0][0] !== "Daftar Peserta Didik")
                    return [
                        'success' => false,
                        'http_code' => 400,
                        'status_code' => 'error',
                        'message' => 'File yang di upload bukan hasil unduhan Daftar Peserta Didik di Aplikasi Dapodik',
                        'data' => [],
                    ];

                // validasi header tabel
                $headerFile = $rows[4];
                $header1 = ["No", "Nama", "NIPD", "JK", "NISN", "Tempat Lahir", "Tanggal Lahir", "NIK", "Agama", "Alamat", "RT", "RW", "Dusun", "Kelurahan", "Kecamatan", "Kode Pos", "Jenis Tinggal", "Alat Transportasi", "Telepon", "HP", "E-Mail", "SKHUN", "Penerima KPS", "No. KPS", "Data Ayah", "", "", "", "", "", "Data Ibu", "", "", "", "", "", "Data Wali", "", "", "", "", "", "Rombel Saat Ini", "No Peserta Ujian Nasional", "No Seri Ijazah", "Penerima KIP", "Nomor KIP", "Nama di KIP", "Nomor KKS", "No Registrasi Akta Lahir", "Bank", "Nomor Rekening Bank", "Rekening Atas Nama", "Layak PIP (usulan dari sekolah)", "Alasan Layak PIP", "Kebutuhan Khusus", "Sekolah Asal", "Anak ke-berapa", "Lintang", "Bujur", "No KK", "Berat Badan", "Tinggi Badan", "Lingkar Kepala", "Jml. Saudara\nKandung", "Jarak Rumah\nke Sekolah (KM)"];
                $headerFile2 = $rows[5];
                $header2 = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "Nama", "Tahun Lahir", "Jenjang Pendidikan", "Pekerjaan", "Penghasilan", "NIK", "Nama", "Tahun Lahir", "Jenjang Pendidikan", "Pekerjaan", "Penghasilan", "NIK", "Nama", "Tahun Lahir", "Jenjang Pendidikan", "Pekerjaan", "Penghasilan", "NIK", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
                if (count($header1) !== count($headerFile))
                    return [
                        'success' => false,
                        'http_code' => 400,
                        'status_code' => 'error',
                        'message' => 'Jumlah Header tabel pada file import telah mengalami perubahan.',
                        'data' => [],
                    ];
                $invalid = [];
                foreach ($header1 as $index => $expectedHeader) {
                    $actualHeader = strtolower(trim($headerFile[$index] ?? ''));
                    $expectedHeader = strtolower(trim($expectedHeader));
                    if ($actualHeader !== $expectedHeader) {
                        $invalid[] = "Header Pertama pada kolom ke-{$index} harus '{$expectedHeader}', ditemukan '{$headerFile[$index]}'";
                    }
                }

                foreach ($header2 as $index => $expectedHeader) {
                    $actualHeader = strtolower(trim($headerFile2[$index] ?? ''));
                    $expectedHeader = strtolower(trim($expectedHeader));
                    if ($actualHeader !== $expectedHeader) {
                        $invalid[] = ["Header Kedua pada kolom ke-{$index} harus '{$expectedHeader}', ditemukan '{$headerFile2[$index]}'"];
                    }
                }
                if (count($invalid) > 0)
                    return [
                        'success' => false,
                        'http_code' => 400,
                        'status_code' => 'error',
                        'message' => 'Judul Header tabel pada file import telah mengalami perubahan.',
                        'data' => $invalid,
                    ];

                $data = $this->renderDataImport($rows, $type);
            }
            return  [
                'success' => true,
                'http_code' => 200,
                'status_code' => 'success',
                'message' => 'Data berhasil di import dari file import.',
                'data' => $data,
            ];
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

    public function renderDataImport($data, $type)
    {
        $send = [];
        switch ($type) {
            case 'pesertaDidik':
                foreach ($data as $row) {
                    if ((int)$row[0] > 0) {
                        $temp = [
                            'nama' => eyd($row[1]),
                            'nik' => $row[7],
                            'nisn' => $row[4],
                            'nipd' => $row[2],
                            'identitas' => [
                                'nama' => eyd($row[1]),
                                'jenis_kelamin' => saveJenisKelamin($row[3] == 'L' ? 'Laki-laki' : ($row[3] == 'P' ? 'Perempuan' : ''), ['kode' => $row[3]]),
                                'tempat_lahir' => $row[5],
                                'tanggal_lahir' => $row[6],
                                'nisn' => $row[4],
                                'nik' => $row[7],
                                'agama_id' => saveAgama($row[8]),
                                'nomor_akte' => $row[49],
                                'nomor_kk' => $row[60],
                                'anak_ke' => (int)$row[57],
                                'jumlah_saudara' => (int)$row[64],
                            ],
                            'registrasi' => [
                                'nipd' => $row[2],
                                'asal_sekolah' => $row[56],
                            ],
                            'alamat' => [
                                'alamat_jalan' => $row[9],
                                'rt' => (int)$row[10],
                                'rw' => (int) $row[11],
                                'dusun' => $row[12],
                                'desa' => $row[13],
                                'kecamatan' => $row[14],
                                'kode_pos' => $row[15],
                                'lintang' => $row[58],
                                'bujur' => $row[59],
                                'jarak_rumah' => (int)$row[65],
                                'alat_transportasi_id' => saveTransportasi($row[17]),
                                'jenis_tinggal_id' => saveJenisTinggal($row[16]),
                            ],
                            'kontak' => [
                                'telepon' => $row[18],
                                'hp' => $row[19],
                                'email' => $row[20],
                            ],
                            'ayah' => null,
                            'ibu' => [
                                'nama' => eyd($row[30]),
                                'jenis_kelamin' => saveJenisKelamin('Perempuan', ['kode' => 'P']),
                                'pendidikan_id' => savePendidikan($row[32]),
                                'pekerjaan_id' => savePekerjaan($row[33]),
                                'penghasilan_id' => savePenghasilan($row[34]),
                                'nik' => $row[35],
                            ],
                            'wali' => null,
                            'difabel' => $this->renderKebutuhanKhusus($row[7], $row[55]),
                            'periodik' => [
                                'tinggi_badan' => $row[62],
                                'berat_badan' => $row[61],
                                'lingkar_kepala' => $row[63],
                            ],
                            'kelulusan' => null,
                            'rekening' => null,
                            'layak_pip' => null,
                            'kesejahteraan' => [],
                        ];

                        if ($row[44]) $temp['kelulusan'] = [
                            'nomor_skhun' => $row[21],
                            'nomor_ijazah' => $row[44],
                            'nomor_ujian' => $row[43],
                        ];

                        if (!empty($row[24])) $temp['ayah'] = [
                            'nama' => eyd($row[24]),
                            'jenis_kelamin' => saveJenisKelamin('Laki-laki', ['kode' => 'L']),
                            'pendidikan_id' => savePendidikan($row[26]),
                            'pekerjaan_id' => savePekerjaan($row[27]),
                            'penghasilan_id' => savePenghasilan($row[28]),
                            'nik' => $row[29],
                        ];

                        if (!empty($row[36])) $temp['wali'] = [
                            'nama' => eyd($row[36]),
                            'pendidikan_id' => savePendidikan($row[38]),
                            'pekerjaan_id' => savePekerjaan($row[39]),
                            'penghasilan_id' => savePenghasilan($row[40]),
                            'nik' => $row[41],
                        ];

                        if (!empty($row[51])) $temp['rekening'] = [
                            'bank_id' => saveBank($row[50]),
                            'nomor' => $row[51],
                            'nama' => $row[52],
                        ];

                        if ($row[53] == 'Ya' || !empty($row[54])) $temp['layak_pip'] =                            [
                            'status' => $row[53] == 'Ya' ? 1 : 0,
                            'alasan_id' => saveAlasanPip($row[54]),
                        ];

                        if (!empty($row[23])) $temp['kesejahteraan'][] = [
                            'jenis_id' => saveJenisKesejahteraan('Kartu Perlindungan Sosial', ['kode' => 'KPS']),
                            'nomor_kartu' => $row[23],
                        ];

                        if (!empty($row[46])) $temp['kesejahteraan'][] = [
                            'jenis_id' => saveJenisKesejahteraan('Kartu Indonesia Pintar', ['kode' => 'KIP']),
                            'nomor_kartu' => $row[46],
                            'nama_kartu' => $row[47],
                        ];

                        if (!empty($row[48])) $temp['kesejahteraan'][] = [
                            'jenis_id' => saveJenisKesejahteraan('Kartu Keluarga Sejahtera', ['kode' => 'KKS']),
                            'nomor_kartu' => $row[48]
                        ];
                        $send[] = $temp;
                    }
                }
                break;

            default:
                break;
        }
        return $send;
    }
}
