<?php
if (!function_exists('ahref')) {
    function ahref($href, $title): string
    {
        return '<a href="' . $href . '">' . $title . '</a>';
    }
}
