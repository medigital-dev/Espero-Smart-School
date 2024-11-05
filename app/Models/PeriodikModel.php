<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriodikModel extends Model
{
    protected $table      = 'kontak';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'periodik_id',
        'nik',
        'tanggal',
        'tinggi_badan',
        'berat_badan',
        'lingkar_kepala',
        'anak_ke',
    ];
}
