<?php

if (!function_exists('saveAgama')) {
    /**
     * Helper menyimpan referensi agama berdasarkan nama agama
     * @param string $nama Nama Agama
     * @return string Mengembalikan id unik agama
     * @return false Jika agama gagal disimpan 
     */
    function saveAgama(string $nama)
    {
        return service('referensi')->saveAgama($nama);
    }
}

if (!function_exists('savePekerjaan')) {
    /**
     * Helper menyimpan referensi Pekerjaan berdasarkan nama Pekerjaan
     * @param string $nama Nama Pekerjaan
     * @return string Mengembalikan id unik Pekerjaan
     * @return false Jika Pekerjaan gagal disimpan 
     */
    function savePekerjaan(string $nama)
    {
        return service('referensi')->savePekerjaan($nama);
    }
}

if (!function_exists('savePendidikan')) {
    /**
     * Helper menyimpan referensi Pendidikan berdasarkan nama Pendidikan
     * @param string $nama Nama Pendidikan
     * @return string Mengembalikan id unik Pendidikan
     * @return false Jika Pendidikan gagal disimpan 
     */
    function savePendidikan(string $nama)
    {
        return service('referensi')->savePendidikan($nama);
    }
}

if (!function_exists('savePenghasilan')) {
    /**
     * Helper menyimpan referensi Penghasilan berdasarkan nama Penghasilan
     * @param string $nama Nama Penghasilan
     * @return string Mengembalikan id unik Penghasilan
     * @return false Jika Penghasilan gagal disimpan 
     */
    function savePenghasilan(string $nama)
    {
        return service('referensi')->savePenghasilan($nama);
    }
}

if (!function_exists('saveTransportasi')) {
    /**
     * Helper menyimpan referensi Transportasi berdasarkan nama Transportasi
     * @param string $nama Nama Transportasi
     * @return string Mengembalikan id unik Transportasi
     * @return false Jika Transportasi gagal disimpan 
     */
    function saveTransportasi(string $nama)
    {
        return service('referensi')->saveTransportasi($nama);
    }
}
