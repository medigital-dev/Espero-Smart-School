<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Libraries\DataPesertaDidik;
use CodeIgniter\API\ResponseTrait;

class PesertaDidik extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['indonesia', 'text']);
    }

    public function get($status = null)
    {
        $data = new DataPesertaDidik;
        if ($status == 'active')
            $data->active();
        return $this->respond($data->withFilter()->toSelect2());
    }
}
