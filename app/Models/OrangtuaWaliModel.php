<?php

namespace App\Models;

use CodeIgniter\Model;

class OrangtuaWaliModel extends Model
{
    protected $table      = 'orangtua_wali';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'orangtua_id',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'nik',
        'kewarganegaraan',
        'agama_id',
        'pekerjaan_id',
        'pendidikan_id',
        'penghasilan_id',
    ];
}
