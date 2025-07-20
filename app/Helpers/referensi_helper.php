<?php

use App\Libraries\Referensi;

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

if (!function_exists('saveBidangPrestasi')) {
    /**
     * Helper menyimpan referensi bidang prestasi berdasarkan nama bidang prestasi
     * @param string $nama Nama bidang prestasi
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik bidang prestasi
     * @return false Jika bidang prestasi gagal disimpan 
     */
    function saveBidangPrestasi(string $nama, array $set = [])
    {
        return service('referensi')->saveAgama($nama, $set);
    }
}

if (!function_exists('saveHubunganKeluarga')) {
    /**
     * Helper menyimpan referensi hubungan keluarga berdasarkan nama hubungan keluarga
     * @param string $nama Nama hubungan keluarga
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik hubungan keluarga
     * @return false Jika hubungan keluarga gagal disimpan 
     */
    function saveHubunganKeluarga(string $nama, array $set = [])
    {
        return service('referensi')->saveHubunganKeluarga($nama, $set);
    }
}

if (!function_exists('saveJenisBeasiswa')) {
    /**
     * Helper menyimpan referensi jenis beasiswa berdasarkan nama jenis beasiswa
     * @param string $nama Nama jenis beasiswa
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik jenis beasiswa
     * @return false Jika jenis beasiswa gagal disimpan 
     */
    function saveJenisBeasiswa(string $nama, array $set = [])
    {
        return service('referensi')->saveJenisBeasiswa($nama, $set);
    }
}

if (!function_exists('saveSatuan')) {
    /**
     * Helper menyimpan referensi satuan berdasarkan nama satuan
     * @param string $nama Nama satuan
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik satuan
     * @return false Jika satuan gagal disimpan 
     */
    function saveSatuan(string $nama, array $set = [])
    {
        return service('referensi')->saveSatuan($nama, $set);
    }
}

if (!function_exists('saveJenisKebutuhanKhusus')) {
    /**
     * Helper menyimpan referensi jenis kebutuhan khusus berdasarkan nama jenis kebutuhan khusus
     * @param string $nama Nama jenis kebutuhan khusus
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik jenis kebutuhan khusus
     * @return false Jika jenis kebutuhan khusus gagal disimpan 
     */
    function saveJenisKebutuhanKhusus(string $nama, array $set = [])
    {
        return service('referensi')->saveJenisKebutuhanKhusus($nama, $set);
    }
}

if (!function_exists('saveJenisKelamin')) {
    /**
     * Helper menyimpan referensi jenis kelamin berdasarkan nama jenis kelamin
     * @param string $nama Nama jenis kelamin
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik jenis kelamin
     * @return false Jika jenis kelamin gagal disimpan 
     */
    function saveJenisKelamin(string $nama, array $set = [])
    {
        return service('referensi')->saveJenisKelamin($nama, $set);
    }
}

if (!function_exists('saveJenisKesejahteraan')) {
    /**
     * Helper menyimpan referensi jenis kesejahteraan berdasarkan nama jenis kesejahteraan
     * @param string $nama Nama jenis kesejahteraan
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik jenis kesejahteraan
     * @return false Jika jenis kesejahteraan gagal disimpan 
     */
    function saveJenisKesejahteraan(string $nama, array $set = [])
    {
        return service('referensi')->saveJenisKesejahteraan($nama, $set);
    }
}

if (!function_exists('saveJenisTinggal')) {
    /**
     * Helper menyimpan referensi jenis tinggal berdasarkan nama jenis tinggal
     * @param string $nama Nama jenis tinggal
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik jenis tinggal
     * @return false Jika jenis tinggal gagal disimpan 
     */
    function saveJenisTinggal(string $nama, array $set = [])
    {
        return service('referensi')->saveJenisTinggal($nama, $set);
    }
}

if (!function_exists('saveTingkatPrestasi')) {
    /**
     * Helper menyimpan referensi tingkat prestasi berdasarkan nama tingkat prestasi
     * @param string $nama Nama tingkat prestasi
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik tingkat prestasi
     * @return false Jika tingkat prestasi gagal disimpan 
     */
    function saveTingkatPrestasi(string $nama, array $set = [])
    {
        return service('referensi')->saveTingkatPrestasi($nama, $set);
    }
}

if (!function_exists('saveKurikulum')) {
    /**
     * Helper menyimpan referensi kurikulum berdasarkan nama kurikulum
     * @param string $nama Nama kurikulum
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik kurikulum
     * @return false Jika kurikulum gagal disimpan 
     */
    function saveKurikulum(string $nama, array $set = [])
    {
        return service('referensi')->saveKurikulum($nama, $set);
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
     * Helper menyimpan referensi Jenis Registrasi Peserta Didik berdasarkan nama Jenis Registrasi Peserta Didik
     * @param string $nama Nama Jenis Registrasi Peserta Didik
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik Jenis Registrasi Peserta Didik
     * @return false Jika Jenis Registrasi Peserta Didik gagal disimpan 
     */
    function saveJenisRegistrasi(string $nama, array $set = [])
    {
        return service('referensi')->saveJenisRegistrasi($nama, $set);
    }
}

if (!function_exists('saveJenisMutasi')) {
    /**
     * Helper menyimpan referensi Jenis Mutasi Peserta Didik berdasarkan nama Jenis Mutasi Peserta Didik
     * @param string $nama Nama Jenis Mutasi Peserta Didik
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik Jenis Mutasi Peserta Didik
     * @return false Jika Jenis Mutasi Peserta Didik gagal disimpan 
     */
    function saveJenisMutasi(string $nama, array $set = [])
    {
        return service('referensi')->saveJenisMutasi($nama, $set);
    }
}

if (!function_exists('saveAlasanPip')) {
    /**
     * Helper menyimpan referensi Alasan Layak PIP Peserta Didik berdasarkan nama Alasan Layak PIP Peserta Didik
     * @param string $nama Nama Alasan Layak PIP Peserta Didik
     * @param array $set Variable tambahan dalam array
     * @return string Mengembalikan id unik Alasan Layak PIP Peserta Didik
     * @return false Jika Alasan Layak PIP Peserta Didik gagal disimpan 
     */
    function saveAlasanPip(string $nama, array $set = [])
    {
        return service('referensi')->saveAlasanPip($nama, $set);
    }
}
