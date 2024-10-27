<?php
if (!function_exists('unik')) {
    /**
     * Fungsi untuk generate ID unik khusus model CI4
     * @param object $model Model
     * @param string $field pada tabel
     * @param int $lenght Jumlah Karakter (Default: 16)
     */
    function unik($model, $field, $lenght = 16)
    {
        helper('text');
        do {
            $uniqueId = random_string('crypto', $lenght / 2) . '-' . random_string('crypto', $lenght / 2);
        } while ($model->where($field, $uniqueId)->first());
        return $uniqueId;
    }
}
