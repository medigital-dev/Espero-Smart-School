<?php

namespace App\Models;

use CodeIgniter\Model;

class KelulusanPdModel extends Model
{
    protected $table      = 'kelulusan';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'kelulusan_id',
        'peserta_didik_id',
        'kurikulum',
        'nomor_ijazah',
        'penandatangan',
        'tanggal'
    ];
}
