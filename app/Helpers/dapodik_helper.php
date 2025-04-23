<?php

if (!function_exists('sync')) {
    /**
     * @param string $type Enum ['getPesertaDidik','getSekolah','getRombonganBelajar','get]
     * @return array Response
     */
    function sync($type)
    {
        $dapodik = service('dapodik');
        return $dapodik->sync($type);
    }
}
