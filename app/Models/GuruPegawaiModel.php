<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruPegawaiModel extends Model
{
    protected $table = 'guru_pegawai';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'guru_pegawai_id',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'nip',
        'nik',
        'agama_id',
        'golongan_darah',
        'kewarganegaraan',
        'nama_ibu_kandung',
    ];
}
