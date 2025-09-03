<?php

use App\Libraries\baseData\Rombel;

if (!function_exists('saveRombel')) {
    function saveRombel(array $set, string|array|null $keyname)
    {
        return (new Rombel())->save($set, $keyname);
    }
}
