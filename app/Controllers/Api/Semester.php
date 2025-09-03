<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\SemesterModel;
use CodeIgniter\API\ResponseTrait;

class Semester extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['string']);
    }

    public function create()
    {
        $model = new SemesterModel();
        $set = $this->request->getPost();
        if (!isset($set['semester_id']))
            $set['semester_id'] = idUnik($model, 'semester_id');
        if (!$model->save($set)) return $this->fail('Error: Semester gagal disimpan');

        return $this->respond($set);
    }
}
