<?php

namespace App\Models;

use CodeIgniter\Model;

class RombonganBelajarModel extends Model
{
    protected $table      = 'rombongan_belajar';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'rombel_id',
        'nama',
        'tingkat_pendidikan',
        'ptk_id',
        'kurikulum_id',
        'status',
    ];
}
