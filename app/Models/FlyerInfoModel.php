<?php

namespace App\Models;

use CodeIgniter\Model;

class FlyerInfoModel extends Model
{
    protected $table      = 'flyer_info';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'flyer_id',
        'kode',
        'judul',
        'konten',
    ];
}
