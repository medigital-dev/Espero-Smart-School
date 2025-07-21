<?php

namespace App\Models;

use CodeIgniter\Model;

class PipModel extends Model
{
    protected $table      = 'pip';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'pip_id',
        'peserta_didik_id',
        'nominal',
        'no_rekening',
        'tahap_id',
        'nomor_sk',
        'tanggal_sk',
        'nama_rekening',
        'nama_bank',
        'virtual_acc',
        'semester_kode',
        'tanggal_cair',
        'status_cair',
        'tahap_keterangan',
        'pengusul',
    ];
}
