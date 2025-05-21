<?php

namespace App\Models;

use CodeIgniter\Model;

class MutasiPdModel extends Model
{
    protected $table      = 'mutasi_pd';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'deleted_at',
        'mutasi_id',
        'peserta_didik_id',
        'jenis',
        'tanggal',
        'alasan',
        'sekolah_tujuan',
        'nomor_ijazah_lulus',
    ];
}
