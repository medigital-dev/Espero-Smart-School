<?php

namespace App\Models;

use CodeIgniter\Model;

class LoggingModel extends Model
{
    protected $table      = 'logging';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'log_id',
        'nik',
        'status',
        'title',
        'detail',
    ];
}
