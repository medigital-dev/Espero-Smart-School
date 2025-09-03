<?php

namespace App\Controllers\Api\Public;

use App\Controllers\BaseController;
use App\Models\SemesterModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class Webservice extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['peserta_didik', 'semester']);
    }

    public function getPd_select2(): ResponseInterface
    {
        $keyword = $this->request->getGet('key') ?? '';
        $start = (int) $this->request->getGet('page') ?: 1;
        $limit = 10;
        $offset = ($start - 1) * $limit;
        $items = cariPd($keyword, true, ['limit' => $limit + 1, 'offset' => $offset]);

        $hasMore = count($items) > $limit;
        if ($hasMore) {
            array_pop($items);
        }

        $results = array_map(function ($item) {
            $pd = getPd($item['peserta_didik_id']);
            return [
                'id' => $item['peserta_didik_id'],
                'text' => $pd['nama'],
                'nipd' => nis($item['peserta_didik_id']),
                'nisn' => $pd['nisn'],
                'kelas' => rombel($item['peserta_didik_id']),
                'nik' => $pd['nik'],
            ];
        }, $items);

        return $this->respond([
            'items' => $results,
            'hasMore' => $hasMore,
        ]);
    }

    public function select2_getSemester(): ResponseInterface
    {
        $keyword = $this->request->getGet('key') ?? '';
        $start = (int) $this->request->getGet('page') ?: 1;
        $limit = 10;
        $offset = ($start - 1) * $limit;
        $items = (new SemesterModel())
            ->select(['semester_id as id', 'kode', 'status'])
            ->like('kode', $keyword)
            ->orderBy('kode', 'DESC')
            ->findAll($limit + 1, $offset);

        $hasMore = count($items) > $limit;
        if ($hasMore) {
            array_pop($items);
        }

        $results = array_map(function ($item) {
            return [
                'id' => $item['id'],
                'text' => tahunAjaran($item['kode']),
                'kode' => $item['kode'],
                'status' => $item['status'],
            ];
        }, $items);

        return $this->respond([
            'items' => $results,
            'hasMore' => $hasMore,
        ]);
    }
}
