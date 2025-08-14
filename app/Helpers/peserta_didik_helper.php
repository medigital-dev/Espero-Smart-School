<?php

use App\Libraries\baseData\Pesertadidik;
use App\Libraries\baseData\RegistrasiPd;
use App\Libraries\baseData\Rombel;

if (!function_exists('cariPd')) {
    /**
     * Pencarian peserta didik berdasarkan nama/nipd/nisn/nik
     * @param string $key Kata kunci pencarian
     * @param string $select $output variabel
     * @return array Data peserta didik
     * @return null Jika data tidak ditemukan
     */
    function cariPd(string $key, string|array $select = '*'): array|null
    {
        $libPd = new Pesertadidik();
        return $libPd->cariPd($key, $select);
    }
}

if (!function_exists('getPd')) {
    /**
     * Fungsi untuk memperoleh data peserta didik
     * @param string|bool|null $idOrStatus ID atau status peserta didik.
     * 
     * Default null untuk semua peserta didik. 
     * 
     * true untuk aktif dan false untuk non aktif
     * 
     * mutasi untuk peserta didik mutasi
     * 
     * @param array|string $select Data yang ingin ditampilkan pada hasil. Default '*' untuk semua data
     * @return array Data peserta didik
     * @return false Jika data tidak ditemukan
     */
    function getPd(string|bool|null $idOrStatus = null, array|string $select = '*'): array|null|false
    {
        $libPd = new Pesertadidik();
        return $libPd->getPd($idOrStatus, $select);
    }
}

if (!function_exists('rombelPd')) {
    /**
     * Pencarian data rombongan belajar peserta didik
     * @param string $id Id unik peserta didik
     * @param boolean $aktif Status rombongan belajar peserta didik
     * @return array Data rombongan belajar peserta didik
     * @return null Jika data tidak ditemukan.
     */
    function rombelPd(string $id, bool $aktif): array|null
    {
        $libRombel = new Rombel();
        return $libRombel->getDataRombelPd($id, $aktif);
    }
}

if (!function_exists('rombel')) {
    /**
     * Fungsi mencari nama rombongan belajar aktif
     * @param string $id Id Peserta Didik
     * @return string Nama rombongan belajar
     * @return null Jika tidak ditemukan
     */
    function rombel(string $id): string|null
    {
        $libRombel = new Rombel();
        return $libRombel->rombel($id);
    }
}

if (!function_exists('nis')) {
    /**
     * Fungsi mencari Nomor Induk Siswa (NIS)
     * @param string $id Id Peserta Didik
     * @return string Nomor Induk Siswa (NIS)
     * @return null Jika tidak ditemukan
     */
    function nis(string $id): string|null
    {
        $libRegistrasi = new RegistrasiPd();
        return $libRegistrasi->nis($id);
    }
}
