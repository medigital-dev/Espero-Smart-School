<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitModel extends Model
{
    protected $table      = 'penyakit';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'riwayat_id',
        'nik',
        'tahun_riwayat',
        'nama_penyakit',
    ];
}
