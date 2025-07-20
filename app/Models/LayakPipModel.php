<?php

namespace App\Models;

use CodeIgniter\Model;

class LayakPipModel extends Model
{
    protected $table      = 'layak_pip';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'layak_id',
        'status',
        'alasan_id',
        'peserta_didik_id',
    ];
}
