<?php

namespace App\Models;

use CodeIgniter\Model;

class KebutuhanKhususModel extends Model
{
    protected $table      = 'kebutuhan_khusus';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'deleted_at',
        'kebutuhan_khusus_id',
        'ref_id',
        'nik',
    ];
}
