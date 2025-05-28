<?php

namespace App\Models;

use CodeIgniter\Model;

class PassFotoModel extends Model
{
    protected $table      = 'pass_foto';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'foto_id',
        'filename',
        'path',
    ];
}
