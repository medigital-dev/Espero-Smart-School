<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Libraries\DataPesertaDidik;
use App\Models\AnggotaRombelModel;
use App\Models\MutasiPdModel;
use App\Models\PesertaDidikModel;
use CodeIgniter\API\ResponseTrait;

class Datatables extends BaseController
{
    use ResponseTrait;

    protected $mPesertaDidik;

    public function __construct()
    {
        helper(['indonesia']);

        $this->mPesertaDidik = new PesertaDidikModel();
    }

    public function bukuIndukPd()
    {
        $pdLib = new DataPesertaDidik();
        $mMutasi = new MutasiPdModel();
        $mAnggotaRombel = new AnggotaRombelModel();

        $result = $pdLib
            ->forAdmin()
            ->withAlamat()
            ->withOrtuWali()
            ->withFilter()
            ->withOrder('peserta_didik.nama', 'ASC')
            ->toDataTable();

        $data = [];
        foreach ($result['data'] as $row) {
            $status = ['nama' => '-', 'warna' => 'secondary'];
            $cMutasi = $mMutasi
                ->select(['nama', 'warna'])
                ->join('ref_jenis_mutasi', 'ref_jenis_mutasi.ref_id = mutasi_pd.jenis', 'LEFT')
                ->where('peserta_didik_id', $row['peserta_didik_id'])
                ->first();
            if ($cMutasi) $status = $cMutasi;

            $cAnggota = $mAnggotaRombel
                ->select('nama')
                ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'LEFT')
                ->join('semester', 'semester.semester_id = rombongan_belajar.semester_id', 'LEFT')
                ->where('semester.status', true)
                ->where('peserta_didik_id', $row['peserta_didik_id'])
                ->orderBy('semester.kode', 'DESC')
                ->first();
            if ($cAnggota) $status = ['nama' => $cAnggota['nama'], 'warna' => 'success'];

            $temp = [
                'id' => $row['peserta_didik_id'],
                'nama' => strtoupper($row['nama']),
                'nipd' => $row['nipd'],
                'nisn' => $row['nisn'],
                'jk' => $row['jenis_kelamin'],
                'tempatLahir' => $row['tempat_lahir'],
                'tanggalLahir' => tanggal($row['tanggal_lahir']),
                'jenisRegistrasi' => $row['jenis_registrasi'],
                'tanggalRegistrasi' => tanggal($row['tanggal_registrasi']),
                'status' => $status,
                'ayah' => $row['ayah'],
                'ibu' => $row['ibu'],
                'wali' => $row['wali'],
                'alamat' => $row['dusun'] . ' ' . $row['rt'] . '/' . $row['rw'] . ', ' . $row['desa'] .
                    ', ' . $row['kecamatan']
            ];
            $data[] = $temp;
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
        $pdLib = new DataPesertaDidik();
        $rows = $pdLib
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
