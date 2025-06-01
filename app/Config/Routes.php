<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/buku-induk/pd', 'BukuInduk::pesertaDidik');
// $routes->get('/peserta-didik', 'PesertaDidik::aktif');
$routes->get('/pengaturan/dapodik', 'Dapodik::index');

$routes->group('', ['namespace' => 'App\Controllers\Public'], function ($routes) {
    $routes->get('peserta-didik', 'Homepage::pesertaDidik');
    $routes->get('guru', 'Homepage::guru');
});

// API
// Private
$routes->post('/api/v0/dapodik/getTable', 'Dapodik::getTable');
$routes->post('/api/v0/dapodik/set', 'Dapodik::set');
$routes->post('/api/v0/dapodik/get', 'Dapodik::get');
$routes->post('/api/v0/dapodik/delete', 'Dapodik::delete');
$routes->post('/api/v0/dapodik/setAktif', 'Dapodik::setAktif');
$routes->post('/api/v0/dapodik/test', 'Dapodik::testKoneksi');
$routes->post('/api/v0/dapodik/riwayat-test/get', 'Dapodik::getRiwayatTest');
$routes->post('/api/v0/dapodik/sync/pd', 'Dapodik::syncPd');
$routes->post('/api/v0/dapodik/sync/gtk', 'Dapodik::syncGtk');
$routes->post('/api/v0/dapodik/import/pd', 'Dapodik::importPd');

$routes->post('/api/v0/peserta-didik/baru/getTable', 'PesertaDidik::getTablePdBaru');


// $routes->post('/api/v0/buku-induk/getTable', 'BukuInduk::getTable');
// $routes->resource();


$routes->group('/api/v0', ['namespace' => 'App\Controllers\Api'], function ($routes) {
    $routes->get('rombel/get', 'Rombel::get');
    $routes->post('mutasi/peserta-didik/set', 'MutasiPd::set');

    $routes->post('datatables/bukuInduk/pd', 'Datatables::bukuIndukPd');
    $routes->get('buku-induk/peserta-didik/get', 'PesertaDidik::get');
    $routes->get('buku-induk/peserta-didik/get/(:segment)', 'PesertaDidik::get/$1');
    $routes->get('buku-induk/peserta-didik/show/(:segment)', 'PesertaDidik::show/$1');
    // $routes->post('buku-induk/peserta-didik/identitas/save/(:segment)', 'PesertaDidik::saveIdentitas/$1');

    $routes->resource('kelulusan');
    $routes->resource('mutasiPd');
    $routes->resource('referensi');
    // $routes->presenter('pesertaDidik');
});

// Buku induk
$routes->group('/api/v0/buku-induk', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->post('export/(:segment)', 'BukuInduk::export/$1');
    $routes->post('import/kelulusan-pd', 'BukuInduk::importKelulusanPd');
});

// API Buku Induk Peserta Didik
$routes->group('/api/v0/buku-induk/peserta-didik', ['namespace' => 'App\Controllers\Api\BukuInduk'], function ($routes) {
    $routes->get('profil/show/(:segment)', 'PesertaDidik::showProfil/$1');
    $routes->get('identitas/show/(:segment)', 'PesertaDidik::showIdentitas/$1');
    $routes->get('alamat/show/(:segment)', 'PesertaDidik::showAlamat/$1');
    $routes->get('ortuwaliPd/show/(:segment)', 'PesertaDidik::showOrtuwaliPd/$1');
    $routes->get('ortuwali/show/(:segment)', 'PesertaDidik::showOrtuwali/$1');
    $routes->get('kontak/show/(:segment)', 'PesertaDidik::showKontak/$1');

    $routes->post('identitas/save/(:segment)', 'PesertaDidik::saveIdentitas/$1');
    $routes->post('alamat/save/(:segment)', 'PesertaDidik::saveAlamat/$1');
    $routes->post('ortuwali/save', 'PesertaDidik::saveOrtuwali');
    $routes->post('ortuwali/save/(:segment)', 'PesertaDidik::saveOrtuwali/$1');
    $routes->post('ortuwalipd/save', 'PesertaDidik::saveOrtuwaliPd');
    $routes->post('ortuwalipd/save/(:segment)', 'PesertaDidik::saveOrtuwaliPd/$1');
    $routes->post('kontak/save/(:segment)', 'PesertaDidik::saveKontak/$1');
});

// public
$routes->group('/api', ['namespace' => 'App\Controllers\Api'], function ($routes) {
    $routes->post('getPd', 'Datatables::publicPd');
});
