<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Libraries\DataPesertaDidik;
use App\Models\DapodikSyncModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

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
                'peserta_didik.peserta_didik_id',
                'peserta_didik.nik',
                'peserta_didik.nama',
                'ref_jenis_kelamin.kode as jk_kode',
                'ref_agama.nama as agama_str',
                'peserta_didik.tempat_lahir',
                'peserta_didik.tanggal_lahir',
                'mutasi_pd.tanggal as mutasi_tanggal',
                'ref_jenis_mutasi.nama as mutasi_nama',
                'ref_jenis_mutasi.kode as mutasi_kode',
                'ref_jenis_mutasi.bg_color as mutasi_warna',
                'peserta_didik.nisn',
                'rombongan_belajar.nama as kelas',
                'registrasi_peserta_didik.nipd',
                'ref_jenis_registrasi.nama as jenis_registrasi',
                'tanggal_registrasi',
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
            ->toDataTable();

        return $this->respond($result);
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

    public function koneksiDapodik(): ResponseInterface
    {
        $model = new DapodikSyncModel();
        $response = $model->select()
            ->findAll();
        return $this->respond($response);
    }
}
