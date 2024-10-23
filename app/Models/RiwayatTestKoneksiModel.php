<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatTestKoneksiModel extends Model
{
    protected $table      = 'riwayat_test_koneksi';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'riwayat_id',
        'dapodik_id',
        'tanggal_waktu',
        'status',
        'pesan',
    ];
}
