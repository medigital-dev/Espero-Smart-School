<?php

namespace App\Models;

use CodeIgniter\Model;

class RefBackgroundColorModel extends Model
{
    protected $table      = 'ref_background_color';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'ref_id',
        'nama',
        'kode',
    ];
}
