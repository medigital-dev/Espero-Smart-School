<?php

namespace App\Models;

use CodeIgniter\Model;

class RefAgamaModel extends Model
{
    protected $table      = 'ref_agama';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'ref_id',
        'nama',
        'kode',
        'warna',
    ];
}
