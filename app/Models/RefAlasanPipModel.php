<?php

namespace App\Models;

use CodeIgniter\Model;

class RefAlasanPipModel extends Model
{
    protected $table      = 'ref_alasan_pip';
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
