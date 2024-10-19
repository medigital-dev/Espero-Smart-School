<?php

namespace App\Models;

use CodeIgniter\Model;

class DapodikSyncModel extends Model
{
    protected $table      = 'dapodik_sync';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'dapodik_id',
        'nama',
        'url',
        'port',
        'npsn',
        'token',
        'status'
    ];
}
