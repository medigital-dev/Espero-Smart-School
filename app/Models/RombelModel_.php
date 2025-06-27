<?php

namespace App\Models;

use CodeIgniter\Model;

class RombelModel extends Model
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
        'semester_id',
        'ptk_id',
        'kurikulum_id',
    ];
}
