<?php
if (!function_exists('unik')) {
    /**
     * Fungsi untuk generate ID unik khusus untuk menambahkan data ke dalam database
     * @param object $model Model
     * @param string $field pada tabel
     * @param int $lenght Jumlah Karakter (Default: 8)
     */
    function unik($model = null, $field = null, $lenght = 8)
    {
        if ($model) {
            helper('text');
            do {
                $uniqueId = random_string('crypto', $lenght);
            } while ($model->where($field, $uniqueId)->first());
        } else $uniqueId = random_string('crypto', $lenght);
        return $uniqueId;
    }
}
