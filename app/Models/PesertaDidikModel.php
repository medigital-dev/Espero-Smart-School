<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaDidikModel extends Model
{
    protected $table      = 'peserta_didik';
    protected $primaryKey = 'id';
    protected $unixKey    = 'peserta_didik_id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'deleted_at',
        'peserta_didik_id',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'nisn',
        'nik',
        'agama_id',
    ];

    /**
     * Menyimpan data peserta didik, insert jika unix key tidak ditemukan, update jika ditemukan.
     *
     * @param array $data
     * @param string|null $whereUnixKey
     * @return bool
     */
    public function saveData(array $data, string|null $whereUnixKey = null)
    {
        helper('string');

        if ($whereUnixKey) {
            $this->where($this->unixKey, $whereUnixKey);
            $result = $this->first();
            if ($result) {
                $data['id'] = $result['id'];
            } else {
                $data[$this->unixKey] = unik($this, $this->unixKey);
            }
        }
        return (bool) $this->save($data);
    }
}
