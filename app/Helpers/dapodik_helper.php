<?php

if (!function_exists('syncDapodik')) {
    /**
     * @param string $type Enum ['getPesertaDidik','getSekolah','getRombonganBelajar','get]
     * @return array Response
     */
    function syncDapodik($type)
    {
        $dapodik = service('dapodik');
        return $dapodik->sync($type);
    }
}

if (!function_exists('configDapodik')) {
    /**
     * @return array|null Konfigurasi Koneksi ke Aplikasi Dapodikdasmen
     */
    function configDapodik()
    {
        $dapodik = service('dapodik');
        return $dapodik->config();
    }
}
