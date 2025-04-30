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
$routes->post('/api/v0/dapodik/import/pd', 'Dapodik::importPd');

$routes->post('/api/v0/peserta-didik/baru/getTable', 'PesertaDidik::getTablePdBaru');

$routes->post('/api/v0/buku-induk/getTable', 'BukuInduk::getTable');


$routes->group('/api/v0', ['namespace' => 'App\Controllers\Api'], function ($routes) {
    $routes->get('rombel/get', 'Rombel::get');
    $routes->post('datatables/bukuInduk/pd', 'Datatables::bukuIndukPd');
    $routes->post('peserta-didik/export/public', 'PesertaDidik::exportExcelPublicTable');
});

// public
$routes->group('/api', ['namespace' => 'App\Controllers\Api'], function ($routes) {
    $routes->post('getPd', 'Datatables::publicPd');
});
