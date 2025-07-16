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

$routes->get('/api/v0/dapodik/sync/peserta-didik/check/new', 'Dapodik::checkNewPd');
$routes->get('/api/v0/dapodik/sync/peserta-didik/check/all', 'Dapodik::checkAllPd');
$routes->get('/api/v0/dapodik/sync/peserta-didik/get', 'Dapodik::getFromDapodik');
$routes->get('/api/v0/dapodik/sync/peserta-didik/get/(:segment)', 'Dapodik::getFromDapodik/$1');

$routes->post('/api/v0/peserta-didik/baru/getTable', 'PesertaDidik::getTablePdBaru');


// $routes->post('/api/v0/buku-induk/getTable', 'BukuInduk::getTable');
// $routes->resource();


$routes->group('/api/v0', ['namespace' => 'App\Controllers\Api'], function ($routes) {
    $routes->get('rombel/get', 'Rombel::get');
    $routes->post('mutasi/peserta-didik/set', 'MutasiPd::set');

    $routes->post('datatables/bukuInduk/pd', 'Datatables::bukuIndukPd');
    // $routes->get('buku-induk/peserta-didik/get', 'PesertaDidik::get');
    // $routes->get('buku-induk/peserta-didik/get/(:segment)', 'PesertaDidik::get/$1');
    // $routes->get('buku-induk/peserta-didik/show/(:segment)', 'PesertaDidik::show/$1');
    // $routes->post('buku-induk/peserta-didik/identitas/save/(:segment)', 'PesertaDidik::saveIdentitas/$1');

    $routes->resource('kelulusan');
    $routes->resource('mutasiPd');
    $routes->resource('referensi');
    $routes->presenter('backgroundColor');
});

// Buku induk
$routes->group('/api/v0/buku-induk', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->post('export/(:segment)', 'BukuInduk::export/$1');
    $routes->post('import/kelulusan-pd', 'BukuInduk::importKelulusanPd');
});

// API Buku Induk Peserta Didik
$routes->group('/api/v0/buku-induk/peserta-didik', ['namespace' => 'App\Controllers\Api\BukuInduk'], function ($routes) {
    $routes->get('profil/(:segment)', 'PesertaDidik::showProfil/$1');
    $routes->get('identitas/(:segment)', 'PesertaDidik::showIdentitas/$1');
    $routes->get('alamat/(:segment)', 'PesertaDidik::showAlamat/$1');
    $routes->get('ortuwaliPd/(:segment)', 'PesertaDidik::showOrtuwaliPd/$1');
    $routes->get('ortuwali/(:segment)', 'PesertaDidik::showOrtuwali/$1');
    $routes->get('kontak/(:segment)', 'PesertaDidik::showKontak/$1');
    $routes->get('beasiswa/(:segment)', 'PesertaDidik::showBeasiswa/$1');
    $routes->get('registrasi/(:segment)', 'PesertaDidik::showRegistrasi/$1');
    $routes->get('mutasi/(:segment)', 'PesertaDidik::showMutasi/$1');
    $routes->get('kelulusan/(:segment)', 'PesertaDidik::showKelulusan/$1');
    $routes->get('kesejahteraan/(:segment)', 'PesertaDidik::showKesejahteraan/$1');
    $routes->get('penyakit/(:segment)', 'PesertaDidik::showPenyakit/$1');
    $routes->get('periodik/(:segment)', 'PesertaDidik::showPeriodik/$1');
    $routes->get('prestasi/(:segment)', 'PesertaDidik::showPrestasi/$1');
    $routes->get('difabel/(:segment)', 'PesertaDidik::showDifabel/$1');

    $routes->post('save/(:segment)', 'PesertaDidik::savePd/$1');

    $routes->post('identitas/(:segment)', 'PesertaDidik::saveIdentitas/$1');
    $routes->post('alamat/(:segment)', 'PesertaDidik::saveAlamat/$1');
    $routes->post('ayah/(:segment)', 'PesertaDidik::saveAyah/$1');
    $routes->post('ibu/(:segment)', 'PesertaDidik::saveIbu/$1');
    $routes->post('wali/(:segment)', 'PesertaDidik::saveWali/$1');
    $routes->post('ortuwali', 'PesertaDidik::saveOrtuwali');
    $routes->post('ortuwali/(:segment)', 'PesertaDidik::saveOrtuwali/$1');
    $routes->post('ortuwalipd', 'PesertaDidik::saveOrtuwaliPd');
    $routes->post('ortuwalipd/(:segment)', 'PesertaDidik::saveOrtuwaliPd/$1');
    $routes->post('kontak/(:segment)', 'PesertaDidik::saveKontak/$1');
    $routes->post('beasiswa/(:segment)', 'PesertaDidik::saveBeasiswa/$1');
    $routes->post('registrasi/(:segment)', 'PesertaDidik::saveRegistrasi/$1');
    $routes->post('mutasi/(:segment)', 'PesertaDidik::saveMutasi/$1');
    $routes->post('kelulusan/(:segment)', 'PesertaDidik::saveKelulusan/$1');
    $routes->post('kesejahteraan/(:segment)', 'PesertaDidik::saveKesejahteraan/$1');
    $routes->post('penyakit/(:segment)', 'PesertaDidik::savePenyakit/$1');
    $routes->post('periodik/(:segment)', 'PesertaDidik::savePeriodik/$1');
    $routes->post('prestasi/(:segment)', 'PesertaDidik::savePrestasi/$1');
    $routes->post('difabel/(:segment)', 'PesertaDidik::saveDifabel/$1');

    $routes->delete('beasiswa/(:segment)', 'PesertaDidik::deleteBeasiswa/$1');
    $routes->delete('registrasi/(:segment)', 'PesertaDidik::deleteRegistrasi/$1');
    $routes->delete('kelulusan/(:segment)', 'PesertaDidik::deleteKelulusan/$1');
    $routes->delete('kesejahteraan/(:segment)', 'PesertaDidik::deleteKesejahteraan/$1');
    $routes->delete('penyakit/(:segment)', 'PesertaDidik::deletePenyakit/$1');
    $routes->delete('periodik/(:segment)', 'PesertaDidik::deletePeriodik/$1');
    $routes->delete('prestasi/(:segment)', 'PesertaDidik::deletePrestasi/$1');
    $routes->delete('ortuwalipd/(:segment)', 'PesertaDidik::deleteOrtuWaliPd/$1');
    $routes->delete('difabel/(:segment)', 'PesertaDidik::deleteDifabel/$1');
});

// public
$routes->group('/api', ['namespace' => 'App\Controllers\Api'], function ($routes) {
    $routes->post('getPd', 'Datatables::publicPd');
});
