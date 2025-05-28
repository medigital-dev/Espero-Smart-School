<?php

namespace App\Models;

use CodeIgniter\Model;

class AlamatModel extends Model
{
    protected $table      = 'alamat_tinggal';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'alamat_id',
        'nik',
        'alamat_jalan',
        'rt',
        'rw',
        'dusun',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'lintang',
        'bujur',
        'jarak_rumah',
        'waktu_tempuh',
        'alat_transportasi_id',
        'jenis_tinggal_id',
    ];
}
