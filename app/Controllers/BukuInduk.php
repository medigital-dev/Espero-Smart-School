<?php

namespace App\Controllers;

use App\Libraries\DataPesertaDidik;
use App\Libraries\Export;
use App\Models\KelulusanPdModel;
use App\Models\PesertaDidikModel;
use CodeIgniter\API\ResponseTrait;

class BukuInduk extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['indonesia', 'files', 'string']);
    }

    public function pesertaDidik(): string
    {
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
                $data = $lib->withRegistrasi()
                    ->withRombel()
                    ->withAlamat()
                    ->withContact()
                    ->withOrtuWali()
                    ->withFilter()
                    ->forAdmin()
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
                        null,
                        null,
                        null,
                        $row['ibu'],
                        null,
                        null,
                        null,
                        $row['wali'],
                        null,
                        null,
                        null,
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
                $set = [
                    'peserta_didik_id' => $cPd['peserta_didik_id'],
                    'kurikulum' => $row[4],
                    'nomor_ijazah' => $row[5],
                    'penandatangan' => $row[6],
                    'tanggal' => $row[7],
                ];
                if ($cKelulusan) $set['id'] = $cKelulusan['id'];
                else $set['kelulusan_id'] = unik($mKelulusan, 'kelulusan_id');
                if (!$mKelulusan->save($set)) return $this->fail('Kelulusan gagal disimpan');
            }
        }
        return $this->respond([
            'message' => count($result['data']) - 1 . ' peserta didik berhasil disimpan.',
            'data' => $result['data']
        ]);
    }
}
