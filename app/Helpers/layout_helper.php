<?php
if (!function_exists('publicMenubar')) {
    function publicMenu(): array
    {
        return [
            [
                'title' => 'Database',
                'key' => 'database',
                'submenu' => [
                    ['title' => 'Peserta Didik', 'route' => 'peserta-didik', 'key' => 'data-pd'],
                    ['title' => 'Guru', 'route' => 'guru', 'key' => 'data-guru'],
                    ['title' => 'Pegawai', 'route' => 'pegawai', 'key' => 'data-pegawai'],
                ],
            ],
        ];
    }
}
