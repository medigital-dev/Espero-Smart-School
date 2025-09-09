<?php 

namespace App\Controllers\Api\Public\v1;

use App\Controllers\BaseController;
use App\Models\GuruPegawaiModel;
use CodeIgniter\API\ResponseTrait;

class Guru extends BaseController {
    use ResponseTrait;

    private function model() {
        $model = new GuruPegawaiModel();
        $model
        ->select([])
        ->join()
    }

    public function datatable() {
        
    }
}