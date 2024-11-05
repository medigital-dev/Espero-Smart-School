<?php

namespace App\Models;

use CodeIgniter\Model;

class OrtuWaliPdModel extends Model
{
    protected $table      = 'kontak';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'kontak_id',
        'nik',
        'telepon',
        'hp',
        'email',
        'website',
    ];
}
