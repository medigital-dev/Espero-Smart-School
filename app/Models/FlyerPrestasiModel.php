<?php

namespace App\Models;

use CodeIgniter\Model;

class FlyerPrestasiModel extends Model
{
    protected $table      = 'flyer_prestasi';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'flyer_id',
        'kode',
        'foto_id',
        'nik',
        'nama',
        'content',
    ];
}
