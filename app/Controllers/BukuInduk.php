<?php

namespace App\Controllers;

use App\Libraries\DataPesertaDidik;
use App\Libraries\Export;
use App\Models\KelulusanPdModel;
use App\Models\MutasiPdModel;
use App\Models\PesertaDidikModel;
use CodeIgniter\API\ResponseTrait;

class BukuInduk extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['indonesia', 'files', 'string', 'referensi', 'peserta_didik']);
    }

    public function pesertaDidik(): string
    {
        echo FCPATH, die;
        $page = [
            'title' => 'EsperoSmartSchool - Buku Induk',
            'page' => 'Buku Induk Peserta Didik',
            'breadcrumb' => ['Buku Induk', 'Peserta Didik'],
            'sidebar' => 'buku-induk-pd',
            'data' => [],
        ];
        return view('buku_induk/peserta-didik', $page);
    }

    public function export($type)
    {
        $rows = [];
        switch ($type) {
            case 'pesertaDidik':
                $title = [
                    'heading' => [
                        ['DATA PESERTA DIDIK'],
                        ['SMP Negeri 2 Wonosari'],
                    ],
                    'subHeading' => [
                        ['Tanggal unduh ' . tanggal('now', 'j F Y') . ' Jam ' . tanggal('now', 'H:i:s') . ' WIB']
                    ],
                ];

                $header = [
                    'No',
                    'Rombel Saat Ini',
                    'Nama',
                    'JK',
                    'NIPD',
                    'NISN',
                    'Tempat Lahir',
                    'Tanggal Lahir',
                    'NIK',
                    'Agama',
                    'Alamat',
                    'RT',
                    'RW',
                    'Dusun',
                    'Kelurahan',
                    'Kecamatan',
                    'Kode Pos',
                    'Lintang',
                    'Bujur',
                    'Alat Transportasi',
                    'Telepon',
                    'HP',
                    'E-Mail',
                    'Sekolah Asal',
                    'Jarak Rumah ke Sekolah (KM)',
                    'Nama Ayah',
                    'Jenjang Pendidikan',
                    'Pekerjaan',
                    'Penghasilan',
                    'Nama Ibu',
                    'Jenjang Pendidikan',
                    'Pekerjaan',
                    'Penghasilan',
                    'Nama Wali',
                    'Jenjang Pendidikan',
                    'Pekerjaan',
                    'Penghasilan',
                ];
                $lib = new DataPesertaDidik;
                $data = $lib->select([
                    'rombongan_belajar.nama as kelas',
                    'peserta_didik.nama as nama',
                    'ref_jenis_kelamin.kode as jenis_kelamin',
                    'nipd',
                    'nisn',
                    'peserta_didik.tempat_lahir',
                    'peserta_didik.tanggal_lahir',
                    'peserta_didik.nik',
                    'ref_agama.nama as agama',
                    'alamat_jalan',
                    'rt',
                    'rw',
                    'desa',
                    'dusun',
                    'kecamatan',
                    'kode_pos',
                    'lintang',
                    'bujur',
                    'ref_alat_transportasi.nama as transportasi',
                    'telepon',
                    'hp',
                    'email',
                    'asal_sekolah',
                    'jarak_rumah',
                    'ayah.nama as ayah',
                    'ibu.nama as ibu',
                    'wali.nama as wali',
                    'pendidikan_ayah.nama as ayah_pendidikan',
                    'pekerjaan_ayah.nama as ayah_pekerjaan',
                    'penghasilan_ayah.nama as ayah_penghasilan',
                    'pendidikan_ibu.nama as ibu_pendidikan',
                    'pekerjaan_ibu.nama as ibu_pekerjaan',
                    'penghasilan_ibu.nama as ibu_penghasilan',
                    'pendidikan_wali.nama as wali_pendidikan',
                    'pekerjaan_wali.nama as wali_pekerjaan',
                    'penghasilan_wali.nama as wali_penghasilan',
                ])
                    ->withFilter()
                    ->get();

                $no = 1;
                foreach ($data as $row) {
                    $rows[] = [
                        $no++,
                        $row['kelas'],
                        $row['nama'],
                        $row['jenis_kelamin'],
                        $row['nipd'],
                        $row['nisn'],
                        $row['tempat_lahir'],
                        $row['tanggal_lahir'],
                        $row['nik'],
                        $row['agama'],
                        $row['alamat_jalan'],
                        $row['rt'],
                        $row['rw'],
                        $row['dusun'],
                        $row['desa'],
                        $row['kecamatan'],
                        $row['kode_pos'],
                        $row['lintang'],
                        $row['bujur'],
                        $row['transportasi'],
                        $row['telepon'],
                        $row['hp'],
                        $row['email'],
                        $row['asal_sekolah'],
                        $row['jarak_rumah'],
                        $row['ayah'],
                        $row['ayah_pendidikan'],
                        $row['ayah_pekerjaan'],
                        $row['ayah_penghasilan'],
                        $row['ibu'],
                        $row['ibu_pendidikan'],
                        $row['ibu_pekerjaan'],
                        $row['ibu_penghasilan'],
                        $row['wali'],
                        $row['wali_pendidikan'],
                        $row['wali_pekerjaan'],
                        $row['wali_penghasilan'],
                    ];
                }
                break;

            default:
                # code...
                break;
        }

        $lib = new Export;
        $result =  $lib->excel($title, $header, $rows);

        return $this->respond($result);
    }

    public function importKelulusanPd()
    {
        $mKelulusan = new KelulusanPdModel();
        $mPd = new PesertaDidikModel();
        $mMutasi = new MutasiPdModel();

        $file = $this->request->getFile('file');
        $result = importExcel($file);
        if (!$result['status'])
            return $this->fail($result);
        for ($i = 1; $i < count($result['data']); $i++) {
            $row = $result['data'][$i];
            if ((int)$row[0] > 0) {
                $nipd = $row[1];
                $nisn = $row[2];
                $cPd = $mPd
                    ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
                    ->where('nisn', $nisn)
                    ->where('nipd', $nipd)
                    ->first();
                if (!$cPd) return $this->fail('Peserta didik dengan NIS: ' . $nipd . ' dan NISN: ' . $nisn . ' tidak ditemukan.');
                $cKelulusan = $mKelulusan->where('peserta_didik_id', $cPd['peserta_didik_id'])->first();
                $setKelulusan = [
                    'peserta_didik_id' => $cPd['peserta_didik_id'],
                    'kurikulum' => $row[4],
                    'nomor_ijazah' => $row[5],
                    'penandatangan' => $row[6],
                    'tanggal' => $row[7],
                ];
                if ($cKelulusan) $setKelulusan['id'] = $cKelulusan['id'];
                else $setKelulusan['kelulusan_id'] = idUnik($mKelulusan, 'kelulusan_id');
                if (!$mKelulusan->save($setKelulusan)) return $this->fail('Kelulusan peserta didik an <strong>' . $cPd['nama'] . '</strong> gagal disimpan');

                $setMutasi = [
                    'peserta_didik_id' => $cPd['peserta_didik_id'],
                    'jenis' => saveJenisMutasi('Lulus'),
                    'tanggal' => $row[7],
                    'alasan' => 'Lulus dari satuan pendidikan.',
                ];
                $cMutasi = $mMutasi->where('peserta_didik_id', $cPd['peserta_didik_id'])->first();
                if ($cMutasi) return $this->fail('Peserta Didik an <strong>' . $cPd['nama'] . '</strong> sudah pernah dikeluarkan.');
                $setMutasi['mutasi_id'] = idUnik($mMutasi, 'mutasi_id');
                if (!$mMutasi->save($setMutasi)) return $this->fail('Mutasi peserta didik an <strong>' . $cPd['nama'] . '</strong> gagal disimpan.');
            }
        }
        return $this->respond([
            'message' => count($result['data']) - 1 . ' peserta didik berhasil disimpan.',
            'data' => $result['data']
        ]);
    }
}
