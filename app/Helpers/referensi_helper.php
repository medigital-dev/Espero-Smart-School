<?php

if (!function_exists('saveAgama')) {
    /**
     * Helper menyimpan referensi agama berdasarkan nama agama
     * @param string $nama Nama Agama
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik agama
     * @return false Jika agama gagal disimpan 
     */
    function saveAgama(string $nama, array $set = [])
    {
        return service('referensi')->saveAgama($nama, $set);
    }
}

if (!function_exists('savePekerjaan')) {
    /**
     * Helper menyimpan referensi Pekerjaan berdasarkan nama Pekerjaan
     * @param string $nama Nama Pekerjaan
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik Pekerjaan
     * @return false Jika Pekerjaan gagal disimpan 
     */
    function savePekerjaan(string $nama, array $set = [])
    {
        return service('referensi')->savePekerjaan($nama, $set);
    }
}

if (!function_exists('savePendidikan')) {
    /**
     * Helper menyimpan referensi Pendidikan berdasarkan nama Pendidikan
     * @param string $nama Nama Pendidikan
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik Pendidikan
     * @return false Jika Pendidikan gagal disimpan 
     */
    function savePendidikan(string $nama, array $set = [])
    {
        return service('referensi')->savePendidikan($nama, $set);
    }
}

if (!function_exists('savePenghasilan')) {
    /**
     * Helper menyimpan referensi Penghasilan berdasarkan nama Penghasilan
     * @param string $nama Nama Penghasilan
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik Penghasilan
     * @return false Jika Penghasilan gagal disimpan 
     */
    function savePenghasilan(string $nama, array $set = [])
    {
        return service('referensi')->savePenghasilan($nama, $set);
    }
}

if (!function_exists('saveTransportasi')) {
    /**
     * Helper menyimpan referensi Transportasi berdasarkan nama Transportasi
     * @param string $nama Nama Transportasi
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik Transportasi
     * @return false Jika Transportasi gagal disimpan 
     */
    function saveTransportasi(string $nama, array $set = [])
    {
        return service('referensi')->saveTransportasi($nama, $set);
    }
}

if (!function_exists('saveJenisRegistrasi')) {
    /**
     * Helper menyimpan referensi Jenis Transportasi Peserta Didik berdasarkan nama Jenis Transportasi Peserta Didik
     * @param string $nama Nama Jenis Transportasi Peserta Didik
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik Jenis Transportasi Peserta Didik
     * @return false Jika Jenis Transportasi Peserta Didik gagal disimpan 
     */
    function saveJenisRegistrasi(string $nama, array $set = [])
    {
        return service('referensi')->saveJenisRegistrasi($nama, $set);
    }
}
