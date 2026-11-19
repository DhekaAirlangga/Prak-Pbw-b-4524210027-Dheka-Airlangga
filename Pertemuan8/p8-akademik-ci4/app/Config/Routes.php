<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/mahasiswa', 'MahasiswaController::index');

$routes->get('/mahasiswa/tambah', 'MahasiswaController::tambah');

$routes->post('/mahasiswa/simpan', 'MahasiswaController::simpan');

$routes->get('/mahasiswa/edit/(:segment)', 'MahasiswaController::edit/$1');

$routes->post('/mahasiswa/update/(:segment)', 'MahasiswaController::update/$1');

$routes->get('/mahasiswa/hapus/(:segment)', 'MahasiswaController::hapus/$1');

