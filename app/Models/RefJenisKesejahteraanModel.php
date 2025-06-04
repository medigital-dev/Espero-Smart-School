<?php

namespace App\Models;

use CodeIgniter\Model;

class RefJenisKesejahteraanModel extends Model
{
    protected $table      = 'ref_jenis_kesejahteraan';
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
