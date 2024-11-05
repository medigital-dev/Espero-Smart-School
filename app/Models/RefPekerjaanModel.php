<?php

namespace App\Models;

use CodeIgniter\Model;

class RefPekerjaanModel extends Model
{
    protected $table      = 'ref_pekerjaan';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'ref_id',
        'nama',
    ];
}
