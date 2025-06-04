<?php

namespace App\Models;

use CodeIgniter\Model;

class RefJenisBeasiswaModel extends Model
{
    protected $table      = 'ref_jenis_beasiswa';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'ref_id',
        'nama',
        'kode',
        'warna',
    ];
}
