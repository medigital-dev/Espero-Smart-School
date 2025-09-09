<?php

namespace App\Controllers\Api\Public\v1;

use App\Controllers\BaseController;
use App\Models\SemesterModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class Semester extends BaseController
{
    use ResponseTrait;

    private function model()
    {
        $model = new SemesterModel();
        $model
            ->select(['semester_id as id', 'kode', 'status', 'nama']);
        return $model;
    }

    public function select2(): ResponseInterface
    {
        $model = $this->model();

        $keyword = $this->request->getGet('key') ?? '';
        $start = (int) $this->request->getGet('page') ?: 1;
        $limit = 10;
        $offset = ($start - 1) * $limit;
        $items = $model
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
                'text' => $item['nama'],
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
