<?php

namespace App\Models;

use CodeIgniter\Model;

class RefJenisMutasiModel extends Model
{
    protected $table      = 'ref_jenis_mutasi';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'ref_id',
        'nama',
        'warna',
    ];
}
