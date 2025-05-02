<?php

namespace App\Models;

use CodeIgniter\Model;

class OrtuWaliPdModel extends Model
{
    protected $table      = 'orangtua_wali_pd';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'ortupd_id',
        'peserta_didik_id',
        'orangtua_id',
        'ayah_id',
        'ibu_id',
        'wali_id',
    ];
}
