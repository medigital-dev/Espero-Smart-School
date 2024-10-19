<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/data/buku-induk', 'BukuInduk::index');
$routes->get('/data/peserta-didik', 'PesertaDidik::index');
$routes->get('/pengaturan/dapodik', 'Dapodik::index');
