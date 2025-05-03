<?php

namespace App\Models;

use CodeIgniter\Model;

class RefPenghasilanModel extends Model
{
    protected $table      = 'ref_penghasilan';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'ref_id',
        'nama',
    ];
}
