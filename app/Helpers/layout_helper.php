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

if (!function_exists('offcanvas')) {
    /**
     * Menampilkan view offcanvas
     * @param string|array $filename Nama file view (tanpa .php)
     * @param array $data Data untuk dikirim ke view
     * @return string
     */
    function offcanvas(string|array $filename, array $data = []): string
    {
        $viewPath = 'templates/offcanvas/';
        $output = '';

        $render = function ($file) use ($viewPath, $data) {
            $path = APPPATH . 'Views/' . $viewPath . $file . '.php';
            if (is_file($path)) {
                return view($viewPath . $file, $data);
            } else {
                log_message('error', "Offcanvas view not found: {$viewPath}{$file}");
                return "<!-- Offcanvas view '{$viewPath}{$file}' not found --><script>console.log(`Offcanvas '{$viewPath}{$file}' tidak ditemukan.`)</script>";
            }
        };

        if (is_string($filename)) return $render($filename);
        foreach ($filename as $file) $output .= $render($file);
        return $output;
    }
}

if (!function_exists('modal')) {
    /**
     * Menampilkan view modal
     * @param string|array $filename Nama file view (tanpa .php)
     * @param array $data Data untuk dikirim ke view
     * @return string
     */
    function modal(string|array $filename, array $data = []): string
    {
        $viewPath = 'templates/modal/';
        $output = '';

        $render = function ($file) use ($viewPath, $data) {
            $path = APPPATH . 'Views/' . $viewPath . $file . '.php';
            if (is_file($path)) {
                return view($viewPath . $file, $data);
            } else {
                log_message('error', "Modal view not found: {$viewPath}{$file}");
                return "<!-- Modal view '{$viewPath}{$file}' not found --><script>console.log(`Modal '{$viewPath}{$file}' tidak ditemukan.`)</script>";
            }
        };

        if (is_string($filename)) return $render($filename);
        foreach ($filename as $file) $output .= $render($file);
        return $output;
    }
}
