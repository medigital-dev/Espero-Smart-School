<?php

namespace App\Models;

use CodeIgniter\Model;

class RefJenisKebutuhanKhususModel extends Model
{
    protected $table      = 'ref_kebutuhan_khusus';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'ref_id',
        'nama',
        'kode',
        'bg_color',
    ];
}
