<?php

namespace App\Models;

use CodeIgniter\Model;

class RefTingkatPrestasiModel extends Model
{
    protected $table      = 'ref_tingkat_prestasi';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'ref_id',
        'nama',
        'kode',
        'bg_color',
    ];
}
