<?php

namespace App\Controllers\Api\Public;

use App\Controllers\BaseController;
use App\Libraries\DataPesertaDidik;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class PesertaDidik extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper(['peserta_didik', 'indonesia']);
    }
}
