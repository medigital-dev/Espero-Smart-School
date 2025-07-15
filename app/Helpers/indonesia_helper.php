<?php

if (!function_exists('tanggal')) {
    /**
     * Mengonversi tanggal dan waktu ke format bahasa Indonesia.
     *
     * @param string|null $tanggalWaktu Input dalam format US (default: 'now', akan menggunakan waktu saat ini)
     * @param string $format Format keluaran (default: 'd-m-Y')
     * @return string Tanggal dan waktu dalam format bahasa Indonesia
     */
    function tanggal($tanggalWaktu = 'now', $format = 'd-m-Y')
    {
        $namaHariIndonesia = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sun' => 'Min',
            'Mon' => 'Sen',
            'Tue' => 'Sel',
            'Wed' => 'Rab',
            'Thu' => 'Kam',
            'Fri' => 'Jum',
            'Sat' => 'Sab'
        );

        $namaBulanIndonesia = array(
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember',
            'Jan' => 'Jan',
            'Feb' => 'Feb',
            'Mar' => 'Mar',
            'Apr' => 'Apr',
            'May' => 'Mei',
            'Jun' => 'Jun',
            'Jul' => 'Jul',
            'Aug' => 'Agu',
            'Sep' => 'Sep',
            'Oct' => 'Okt',
            'Nov' => 'Nov',
            'Dec' => 'Des'
        );

        $timestamp = strtotime($tanggalWaktu);
        $tanggalWaktuIndonesia = date($format, $timestamp);
        $tanggalWaktuIndonesia = strtr($tanggalWaktuIndonesia, array_merge($namaHariIndonesia, $namaBulanIndonesia));
        return $tanggalWaktuIndonesia;
    }
}

if (!function_exists('terbilang')) {
    /**
     * Mengonversi angka kedalam sebutan angka dalam kalimat bahasa indonesia
     * 
     * @param integer $angka Bilangan bulat (bisa negatif bisa positif) tanpa desimal.
     * @return string terbilang
     */
    function terbilang($angka, $isRupiah = true)
    {
        $angka = abs($angka);
        $huruf = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
        $temp = "";

        if ($angka < 12) {
            $temp = " " . $huruf[$angka];
        } elseif ($angka < 20) {
            $temp = terbilang($angka - 10, false) . " belas ";
        } elseif ($angka < 100) {
            $temp = terbilang($angka / 10, false) . " puluh " . terbilang($angka % 10, false);
        } elseif ($angka < 200) {
            $temp = " seratus " . terbilang($angka - 100, false);
        } elseif ($angka < 1000) {
            $temp = terbilang($angka / 100, false) . " ratus " . terbilang($angka % 100, false);
        } elseif ($angka < 2000) {
            $temp = " seribu " . terbilang($angka - 1000, false);
        } elseif ($angka < 1000000) {
            $temp = terbilang($angka / 1000, false) . " ribu " . terbilang($angka % 1000, false);
        } elseif ($angka < 1000000000) {
            $temp = terbilang($angka / 1000000, false) . " juta " . terbilang($angka % 1000000, false);
        } elseif ($angka < 1000000000000) {
            $temp = terbilang($angka / 1000000000, false) . " milyar " . terbilang(fmod($angka, 1000000000), false);
        } elseif ($angka < 1000000000000000) {
            $temp = terbilang($angka / 1000000000000, false) . " trilyun " . terbilang(fmod($angka, 1000000000000), false);
        }

        $hasil = trim($temp);

        if ($isRupiah) {
            if ($angka < 0) {
                $hasil = "minus " . $hasil;
            }
            return ucwords($hasil) . " Rupiah";
        } else {
            return $hasil;
        }
    }
}

if (!function_exists('rupiah')) {
    /**
     * Memformat angka menjadi mata uang Rupiah.
     *
     * @param float|int $angka Angka yang akan diformat
     * @param string $prefix Prefix mata uang (default: 'Rp.')
     * @param int $decimal Jumlah angka di belakang koma (default: 0)
     * @return string Angka yang telah diformat ke mata uang Rupiah
     */
    function rupiah($angka, $prefix = 'Rp.', $decimal = 0)
    {
        return $prefix . ' ' . number_format($angka, $decimal, ',', '.');
    }
}

if (!function_exists('eyd')) {
    /**
     * Mengubah nama menjadi format sesuai EYD (huruf kapital di awal tiap kata)
     * Menangani spasi berlebih, tanda hubung, dan apostrof
     *
     * @param string $nama Nama yang akan diubah
     * @return string Nama yang sudah diformat
     */
    function eyd(string|null $nama): string|null
    {
        if ($nama == null || $nama == '' || $nama == false) return null;
        $nama = preg_replace("/[^a-zA-Z\s'\-]/", '', $nama);
        $nama = strtolower($nama);
        $nama = preg_replace('/\s+/', ' ', trim($nama));
        $kataArray = explode(' ', $nama);

        foreach ($kataArray as &$kata) {
            $kata = ucfirst($kata);
            $kata = preg_replace_callback("/(')([a-z])/", function ($m) {
                return $m[1] . strtolower($m[2]);
            }, $kata);
            $kata = preg_replace_callback("/(\-)([a-z])/", function ($m) {
                return $m[1] . strtoupper($m[2]);
            }, $kata);
        }

        return implode(' ', $kataArray);
    }
}
