<?php

namespace App\Models;

use CodeIgniter\Model;

class FilesModel extends Model
{
    protected $table      = 'files';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'file_id',
        'clientname',
        'filename',
        'extension',
        'path',
        'size',
        'type',
    ];
}
