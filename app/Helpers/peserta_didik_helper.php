<?php

use App\Libraries\baseData\Alamat;
use App\Libraries\baseData\Kontak;
use App\Libraries\baseData\OrangtuaWali;
use App\Libraries\baseData\PesertaDidik;
use App\Libraries\baseData\RegistrasiPd;
use App\Libraries\baseData\Rombel;

if (!function_exists('cariPd')) {
    /**
     * Pencarian peserta didik berdasarkan nama/nipd/nisn/nik
     * @param string $key Kata kunci pencarian
     * @param string $select Output variabel
     * @return array Data peserta didik
     * @return null Jika data tidak ditemukan
     */
    function cariPd(string $key, string|array $select = '*'): array|null
    {
        $libPd = new PesertaDidik();
        return $libPd->search($key, $select);
    }
}

if (!function_exists('getPd')) {
    /**
     * Fungsi untuk menampilkan data peserta didik
     * @param string|bool|null $idOrStatus ID atau status peserta didik.
     * 
     * Default null untuk semua peserta didik. 
     * 
     * true untuk aktif dan false untuk non aktif
     * 
     * @param array|string $select Data yang ingin ditampilkan pada hasil. Default '*' untuk semua data
     * @return array Data peserta didik
     * @return false Jika data tidak ditemukan
     */
    function getPd(string|bool|null $idOrStatus = null, array|string $select = '*'): array|null|false
    {
        $libPd = new PesertaDidik();
        return $libPd->get($idOrStatus, $select);
    }
}

if (!function_exists('rombelPd')) {
    /**
     * Fungsi menampilkan data rombongan belajar peserta didik
     * @param string $id Id unik peserta didik
     * @param boolean $aktif Status rombongan belajar peserta didik
     * @return array Data rombongan belajar peserta didik
     * @return null Jika data tidak ditemukan.
     */
    function rombelPd(string $id, bool $aktif = false): array|null
    {
        $libRombel = new Rombel();
        return $libRombel->rombelPd($id, $aktif);
    }
}

if (!function_exists('rombel')) {
    /**
     * Fungsi menampilkan nama rombongan belajar aktif
     * @param string $id Id Peserta Didik
     * @return string Nama rombongan belajar
     * @return null Jika tidak ditemukan
     */
    function rombel(string $id): string|null
    {
        $libRombel = new Rombel();
        $res = $libRombel->rombelPd($id, true);
        if ($res) {
            $rombel = $libRombel->get($res, 'rombongan_belajar.nama');
            return $rombel['nama'] ?? null;
        }
        return null;
    }
}

if (!function_exists('nis')) {
    /**
     * Fungsi menampilkan Nomor Induk Siswa (NIS)
     * @param string $id Id Peserta Didik
     * @return string Nomor Induk Siswa (NIS)
     * @return null Jika tidak ditemukan
     */
    function nis(string $id): string|null
    {
        $libRegistrasi = new RegistrasiPd();
        $res = $libRegistrasi->registrasiPd($id, ['nipd']);
        return $res[0]['nipd'] ?? null;
    }
}

if (!function_exists('registrasiPd')) {
    /**
     * Fungsi menampilkan registrasi peserta didik
     * @param string $id Id peserta didik
     * @param array|string $select Data yang ingin ditampilkan pada hasil. Default '*' untuk semua data
     * @return array Data registrasi peserta didik
     * @return null Jika data tidak dtemukan
     */
    function registrasiPd(string $id, string|array $select = '*')
    {
        $lib = new RegistrasiPd();
        return $lib->registrasiPd($id, $select);
    }
}

if (!function_exists('hp')) {
    /**
     * Fungsi menampilkan nomor HP
     * @param string $nik Keyword menggunakan Nomor Induk Kependudukan (NIK)
     * @return string Nomor HP
     * @return null Jika tidak ditemukan
     */
    function hp(string $nik): string|null
    {
        $libKontak = new Kontak();
        $result = $libKontak->get($nik, ['hp']);
        return $result['hp'] ?? null;
    }
}

if (!function_exists('alamat')) {
    /**
     * Fungsi menampilkan alamat singkat
     * @param string $nik Keyword menggunakan Nomor Induk Kependudukan (NIK)
     * @return string Alamat singkat: Dusun RT RW, Desa, Kecamatan, Kabupaten, Provinsi
     * @return null Jika tidak ditemukan
     */
    function alamat(string $nik): string|null
    {
        $libAlamat = new Alamat();
        $result = $libAlamat->get($nik, ['dusun', 'rt', 'rw', 'desa', 'kecamatan']);
        if ($result) {
            $str = $result['dusun'] . ' RT ' . $result['rt'] . ' RW ' . $result['rw'] . ', ' . $result['desa'] . ', ' . $result['kecamatan'];
            return $str;
        } else return null;
    }
}

if (!function_exists('maps')) {
    /**
     * Fungsi untuk menampilkan koordinat tempat tinggal
     * @param string $nik Keyword menggunakan Nomor Induk Kependudukan (NIK)
     * @return array Titik koordinat dalam bentuk array log, lat
     * @return null Jika tidak ditemukan
     */
    function maps(string $nik): array|null
    {
        $libAlamat = new Alamat();
        $res = $libAlamat->get($nik, ['lintang', 'bujur']);
        return $res;
    }
}

if (!function_exists('ortuwaliPd')) {
    /**
     * Fungsi menampilkan orangtua/wali peserta didik
     * @param string|null $id Id peserta didik. Default null untuk semua data
     * @param string|array $select Data yang akan ditampilkan. Default '*' untuk semua data
     * @return array Data orangtua/wali peserta didik
     * @return null Jika tidak ditemukan
     */
    function ortuwaliPd(string|null $id, string|array $select = '*'): array|null
    {
        $libOrtuwali = new OrangtuaWali();
        return $libOrtuwali->get($id, $select);
    }
}

if (!function_exists('ibuPd')) {
    /**
     * Fungsi menampilkan nama ibu peserta didik
     * @param string $id Id peserta didik
     * @return string Nama ibu peserta didik
     * @return null Jika tidak ditemukan
     */
    function ibuPd($id): string|null
    {
        $libOrtuwali = new OrangtuaWali();
        $res = $libOrtuwali->get($id, 'ibu.nama as ibu');
        return $res['ibu'] ?? null;
    }
}

if (!function_exists('ayahPd')) {
    /**
     * Fungsi menampilkan nama ibu peserta didik
     * @param string $id Id peserta didik
     * @return string Nama ibu peserta didik
     * @return null Jika tidak ditemukan
     */
    function ayahPd($id): string|null
    {
        $libOrtuwali = new OrangtuaWali();
        $res = $libOrtuwali->get($id, 'ayah.nama as ayah');
        return $res['ayah'] ?? null;
    }
}
