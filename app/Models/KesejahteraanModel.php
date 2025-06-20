<?php

namespace App\Models;

use CodeIgniter\Model;

class KesejahteraanModel extends Model
{
    protected $table      = 'kesejahteraan';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'kesejahteraan_id',
        'nik',
        'jenis_id',
        'nomor_kartu',
        'nama_kartu',
        'tahun_awal',
        'tahun_akhir',
    ];
}
