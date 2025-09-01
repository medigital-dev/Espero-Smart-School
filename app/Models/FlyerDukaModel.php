<?php

namespace App\Models;

use CodeIgniter\Model;

class FlyerDukaModel extends Model
{
    protected $table      = 'flyer_duka';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'flyer_id',
        'kode',
        'foto_id',
        'nama',
        'keterangan',
    ];
}
