<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrasiPesertaDidikModel extends Model
{
    protected $table      = 'registrasi_peserta_didik';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'registrasi_id',
        'peserta_didik_id',
        'jenis_registrasi',
        'tanggal_registrasi',
        'nipd',
        'asal_sekolah',
        'sekolah_jenjang_sebelumnya',
    ];
}
