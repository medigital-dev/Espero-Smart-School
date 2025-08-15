<?php

namespace App\Libraries\baseData;

use App\Models\KontakModel;

class Kontak
{
    public function get(string|null $nik = null, string|array $select = '*'): array|null
    {
        $model = new KontakModel();
        if ($select == '*')
            $model->select(['kontak_id', 'nik', 'telepon', 'hp', 'email', 'website']);
        else $model->select($select);

        if (is_null($nik))
            return $model->findAll();
        return $model->where('nik', $nik)->first();
    }
}
