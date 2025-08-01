<?php

namespace App\Models;

use CodeIgniter\Model;

class KelulusanPdModel extends Model
{
    protected $table      = 'kelulusan';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'deleted_at',
        'kelulusan_id',
        'peserta_didik_id',
        'kurikulum',
        'nomor_ijazah',
        'penandatangan',
        'tanggal',
        'nama_sekolah',
        'npsn',
        'jenjang_id',
        'nomor_skhun',
        'nomor_ijazah',
        'nomor_ujian',
    ];
}
