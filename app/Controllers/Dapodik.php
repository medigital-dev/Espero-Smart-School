<?php

namespace App\Controllers;

use App\Models\DapodikSyncModel;
use CodeIgniter\API\ResponseTrait;

class Dapodik extends BaseController
{
    use ResponseTrait;

    public function index(): string
    {
        $mDapodik = new DapodikSyncModel();
        $sendDapodik = [];
        $dataDapodik = $mDapodik
            ->select(['dapodik_id as id', 'nama', 'url', 'port', 'npsn', 'token', 'status'])
            ->orderBy('status', 'DESC')
            ->findAll();
        foreach ($dataDapodik as $dapodik) {
            $status = $dapodik['status'] ? '<span class="text-success"><i class="fas fa-check-circle fa-fw"></i></span>' : '<span class="text-secondary"><i class="fas fa-minus-circle fa-fw"></i></span>';
            $temp = [
                'checkbox' => '
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input dtCheckbox" type="checkbox" id="check_' . $dapodik['id'] . '" value="' . $dapodik['id'] . '">
                        <label for="check_' . $dapodik['id'] . '" class="custom-control-label"></label>
                    </div>',
                'nama' => $dapodik['nama'],
                'url' => '<a href="http://' . $dapodik['url'] . ':' . $dapodik['port'] . '" target="_blank">http://' . $dapodik['url'] . ':' . $dapodik['port'] . '</a>',
                'npsn' => $dapodik['npsn'],
                'token' => $dapodik['token'],
                'status' => $status
            ];
            array_push($sendDapodik, $temp);
        }
        $page = [
            'title' => 'SISPADU - Pengaturan Dapodik',
            'sidebar' => 'dapodik',
            'name' => 'Koneksi Aplikasi Dapodik',
            'data' => [
                'dapodik' => $sendDapodik
            ],
        ];
        return view('dapodik/index', $page);
    }
}
