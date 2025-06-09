<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\RefBackgroundColorModel;
use App\Models\RefTextColorModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class BackgroundColor extends BaseController
{
    use ResponseTrait;

    protected $model;

    public function __construct()
    {
        $this->model = new RefBackgroundColorModel();
        $this->model->select(['ref_id as id', 'nama', 'kode']);
    }

    public function index(): ResponseInterface
    {
        $key = $this->request->getGet('key');
        if ($key)
            $this->model->like('nama', $key);
        return $this->respond($this->model->findAll());
    }
}
