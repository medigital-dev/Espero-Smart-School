<?php

namespace App\Models;

use CodeIgniter\Model;

class RekeningBankModel extends Model
{
    protected $table      = 'rekening_bank';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'rekening_id',
        'nik',
        'bank_id',
        'nomor',
        'nama',
    ];
}
