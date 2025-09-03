<?php

use App\Libraries\baseData\Semester;

if (!function_exists('tahunAjaran')) {
    /**
     * Helper mengubah kode semester menjadi Tahun Ajaran
     * @param int|string $kode Kode semester 5 Digit
     * @return string Nama Tahun Ajaran
     * @return false Jika error
     */
    function tahunAjaran(string|int $kode): string|false
    {
        // Pastikan kode adalah 5 digit dan berupa angka
        $kode = (string) $kode;
        if (strlen($kode) !== 5 || !is_numeric($kode)) {
            // Mengembalikan false sesuai dengan deskripsi helper
            return false;
        }

        // Ekstrak tahun dan digit semester
        $year = substr($kode, 0, 4);
        $semester_digit = substr($kode, 4, 1);

        // Tentukan tahun berikutnya
        $next_year = $year + 1;
        $academic_year = $year . "/" . $next_year;

        // Tentukan nama semester berdasarkan digit terakhir
        $semester_name = '';
        if ($semester_digit === '1') {
            $semester_name = "Ganjil";
        } elseif ($semester_digit === '2') {
            $semester_name = "Genap";
        } else {
            // Mengembalikan false jika digit semester tidak valid
            return false;
        }

        // Gabungkan bagian-bagian untuk membuat string akhir
        return $academic_year . " " . $semester_name;
    }
}

if (!function_exists('semester')) {
    function semester(string|bool|null $idOrStatus, array|string $select): string|array|null
    {
        return (new Semester())->get($idOrStatus, $select);
    }
}

if (!function_exists('saveSemester')) {
    function saveSemester(array $set, $keyname)
    {
        return (new Semester())->save($set, $keyname);
    }
}
