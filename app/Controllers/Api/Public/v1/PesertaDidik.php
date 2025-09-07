<?php

namespace App\Controllers\Api\Public\v1;

use App\Controllers\BaseController;
use App\Libraries\DataPesertaDidik;
use App\Models\PesertaDidikModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class PesertaDidik extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['indonesia']);
    }

    private function model()
    {
        $model = new PesertaDidikModel();
        $model
            ->select([
                'rombongan_belajar.nama as kelas',
                'peserta_didik.nama',
                'nipd',
                'nisn',
                'ref_jenis_kelamin.kode as jenis_kelamin',
                'peserta_didik.tempat_lahir',
                'peserta_didik.tanggal_lahir',
            ])
            ->join('anggota_rombongan_belajar', 'anggota_rombongan_belajar.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
            ->join('semester', 'semester.kode = anggota_rombongan_belajar.semester_kode', 'left')
            ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('ref_jenis_kelamin', 'ref_jenis_kelamin.ref_id = peserta_didik.jenis_kelamin', 'left')
            ->where('semester.status', true)
        ;

        return $model;
    }

    public function datatable(): ResponseInterface
    {
        $model = $this->model();
        $draw = $this->request->getPost('draw');
        $start = (int)$this->request->getPost('start');
        $length = (int)$this->request->getPost('length');
        $searchValue = $this->request->getPost('search')['value'];
        $columns = $this->request->getPost('columns');
        $orders = $this->request->getPost('order') ?? [];
        $filter = [];
        $countAll = $model->countAllResults(false);
        $model
            ->groupStart()
            ->like('peserta_didik.nama', $searchValue)
            ->orLike('nipd', $searchValue)
            ->orLike('nisn', $searchValue)
            ->orLike('rombongan_belajar.nama', $searchValue)
            ->groupEnd();
        $countFiltered = $model->countAllResults(false);

        if (!empty($orders))
            foreach ($orders as $order) {
                $field = $columns[$order['column']]['name'];
                $dir = $order['dir'];
                $model->orderBy($field, $dir);
            }
        else $model->orderBy('peserta_didik.nama', 'ASC');

        return $this->respond([
            'draw' => $draw,
            'recordsTotal' => $countAll,
            'recordsFiltered' => $countFiltered,
            'paging' => ['length' => $length, 'start' => $start],
            'data' => $model->findAll($length, $start)
        ]);
    }

    public function select2()
    {
        // $keyword = $this->request->getGet('key') ?? '';
        // $start = (int) $this->request->getGet('page') ?: 1;
        // $limit = 10;
        // $offset = ($start - 1) * $limit;
        // $items = cariPd($keyword, true, ['limit' => $limit + 1, 'offset' => $offset]);

        // $hasMore = count($items) > $limit;
        // if ($hasMore) {
        //     array_pop($items);
        // }

        // $results = array_map(function ($item) {
        //     $pd = getPd($item['peserta_didik_id']);
        //     return [
        //         'id' => $item['peserta_didik_id'],
        //         'text' => $pd['nama'],
        //         'nipd' => nis($item['peserta_didik_id']),
        //         'nisn' => $pd['nisn'],
        //         'kelas' => rombel($item['peserta_didik_id']),
        //         'nik' => $pd['nik'],
        //     ];
        // }, $items);

        // return $this->respond([
        //     'items' => $results,
        //     'hasMore' => $hasMore,
        // ]);
        $raw = (new DataPesertaDidik())->active()->toSelect2();
        foreach ($data as $row) {
        }
        return $this->respond();
    }
}
