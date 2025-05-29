<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Libraries\DataPesertaDidik;
use CodeIgniter\API\ResponseTrait;

class Datatables extends BaseController
{
    use ResponseTrait;

    protected $getData;

    public function __construct()
    {
        helper(['indonesia']);
        $this->getData = new DataPesertaDidik;
    }

    public function bukuIndukPd()
    {
        $result = $this->getData
            ->select([
                'peserta_didik.nama',
                'peserta_didik.jenis_kelamin',
                'peserta_didik.tempat_lahir',
                'peserta_didik.tanggal_lahir',
                'mutasi_pd.tanggal as tanggal_mutasi',
                'ref_jenis_mutasi.nama as jenis_mutasi',
                'peserta_didik.nisn',
                'rombongan_belajar.nama as kelas',
                'registrasi_peserta_didik.nipd',
                'ref_jenis_registrasi.nama as jenis_registrasi',
                'tanggal_registrasi',
                'ref_agama.nama as agama',
                'dusun',
                'desa',
                'kecamatan',
                'rt',
                'rw',
                'hp',
                'ayah.nama as ayah',
                'ibu.nama as ibu',
                'kelulusan.tanggal as tanggal_lulus'
            ])
            ->withFilter()
            ->forAdmin()
            ->toDataTable();

        $data = [];
        foreach ($result['data'] as $row) {
            $row['status'] = $row['tanggal_mutasi'] ? 'M' : ($row['tanggal_lulus'] ? 'L' : ($row['kelas'] ?? ''));
            $row['tahun_registrasi'] = $row['tanggal_registrasi'] !== '0000-00-00' ? tanggal($row['tanggal_registrasi'], 'Y') : '';
            $row['tanggal_lahir'] = tanggal($row['tanggal_lahir'], 'd/m/Y');
            $row['tanggal_mutasi'] = $row['tanggal_mutasi'] ? tanggal($row['tanggal_mutasi'], 'd/m/Y') : '';
            $row['tanggal_lulus'] = $row['tanggal_lulus'] ? tanggal($row['tanggal_lulus'], 'd/m/Y') : null;
            $data[] = $row;
        }

        $response = [
            'draw' => intval($result['draw']),
            'recordsTotal' => $result['recordsTotal'],
            'recordsFiltered' => $result['recordsFiltered'],
            'data' => $data,
        ];

        return $this->respond($response);
    }

    public function publicPd()
    {
        $rows = $this->getData
            ->active()
            ->toDataTable();
        $data = [];
        $no = 1 + $rows['paging']['start'];
        foreach ($rows['data'] as $row) {
            $row['no'] = $no++;
            $row['tanggal_lahir'] = tanggal($row['tanggal_lahir'], 'j F Y');
            $row['nama'] = strtoupper($row['nama']);
            $row['tempat_lahir'] = ucwords(strtolower($row['tempat_lahir']));
            $data[] = $row;
        }

        $response = [
            'draw' => intval($rows['draw']),
            'recordsTotal' => $rows['recordsTotal'],
            'recordsFiltered' => $rows['recordsFiltered'],
            'data' => $data,
        ];

        return $this->respond($response);
    }
}
