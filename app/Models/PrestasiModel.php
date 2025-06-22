<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestasiModel extends Model
{
    protected $table      = 'prestasi';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'prestasi_id',
        'tahun',
        'penyelenggara',
        'nik',
        'bidang_id',
        'tingkat_id',
        'nama',
        'hasil'
    ];
}
