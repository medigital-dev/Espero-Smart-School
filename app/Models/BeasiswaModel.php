<?php

namespace App\Models;

use CodeIgniter\Model;

class BeasiswaModel extends Model
{
    protected $table      = 'beasiswa';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'beasiswa_id',
        'nik',
        'nominal',
        'jenis_id',
        'tahun_awal',
        'tahun_akhir',
        'satuan_id',
        'uraian',
    ];
}
