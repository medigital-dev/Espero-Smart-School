<?php

namespace App\Models;

use CodeIgniter\Model;

class RefJenisTinggalModel extends Model
{
    protected $table      = 'ref_jenis_tinggal';
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
