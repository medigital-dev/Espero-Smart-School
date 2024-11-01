<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/data/buku-induk', 'BukuInduk::index');
$routes->get('/data/peserta-didik', 'PesertaDidik::aktif');
$routes->get('/pengaturan/dapodik', 'Dapodik::index');

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

$routes->post('/api/v0/peserta-didik/baru/getTable', 'PesertaDidik::getTablePdBaru');

$routes->post('/api/v0/buku-induk/getTable', 'BukuInduk::getTable');
