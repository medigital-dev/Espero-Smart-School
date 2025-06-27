<?php

namespace App\Models;

use CodeIgniter\Model;

class RefHubunganKeluargaModel extends Model
{
    protected $table      = 'ref_hubungan_keluarga';
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
