<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaRombelModel extends Model
{
    protected $table      = 'anggota_rombongan_belajar';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'anggota_id',
        'peserta_didik_id',
        'rombel_id',
        'jenis_registrasi_rombel',
    ];
}
