<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/aldi', function() {
    return '<h1 style="color: blue">Hello Aldi, selamat belajar lumen </h1>';
});

$router->get('/data', function() {

    $data=[
        [ 
            'id' => 'CUST001',
            'name' => 'Agus',
            'address' => 'Bekasi'
            
        ],
        
        [
            'id' => 'CUST002',
            'name' => 'Budi',
            'address' => 'Jakarta'
        ],

        [
            'id' => 'CUST003',
            'name' => 'Charlie',
            'address' => 'Bandung'
        ]];
        
    return [
        'status' => 200,
        'success' => true,
        'data' => $data
    ];

});
//USER
$router->get('/api/v1/Perpus', 'PerpusController@index');
$router->get('/api/v1/Perpus/{id}', 'PerpusController@getByID');
$router->post('/api/v1/Perpus', 'PerpusController@insert');
$router->put('/api/v1/Perpus/{id}', 'PerpusController@update');
$router->delete('/api/v1/Perpus/{id}', 'PerpusController@delete');
//KATEGORI
$router->get('/api/v1/kategori', 'kategoriController@index');
$router->get('/api/v1/kategori/{id}', 'kategoriController@getByID');
$router->post('/api/v1/kategori', 'kategoriController@insert');
$router->put('/api/v1/kategori/{id}', 'kategoriController@update');
$router->delete('/api/v1/kategori/{id}', 'kategoriController@delete');
//PEMBERITAHUAN
$router->get('/api/v1/pemberitahuan', 'pemberitahuanController@index');
$router->get('/api/v1/pemberitahuan/{id}', 'pemberitahuanController@getByID');
$router->post('/api/v1/pemberitahuan', 'pemberitahuanController@insert');
$router->put('/api/v1/pemberitahuan/{id}', 'pemberitahuanController@update');
$router->delete('/api/v1/pemberitahuan/{id}', 'pemberitahuanController@delete');
//PENERBIT
$router->get('/api/v1/penerbit', 'penerbitController@index');
$router->get('/api/v1/penerbit/{id}', 'penerbitController@getByID');
$router->post('/api/v1/penerbit', 'penerbitController@insert');
$router->put('/api/v1/penerbit/{id}', 'penerbitController@update');
$router->delete('/api/v1/penerbit/{id}', 'penerbitController@delete');
//IDENTITAS
$router->get('/api/v1/identitas', 'identitasController@index');
$router->get('/api/v1/identitas/{id}', 'identitasController@getByID');
$router->post('/api/v1/identitas', 'identitasController@insert');
$router->put('/api/v1/identitas/{id}', 'identitasController@update');
$router->delete('/api/v1/identitas/{id}', 'identitasController@delete');
//buku
$router->get('/api/v1/buku', 'bukuController@index');
$router->get('/api/v1/buku/{id}', 'bukuController@getByID');
$router->post('/api/v1/buku', 'bukuController@insert');
$router->put('/api/v1/buku/{id}', 'bukuController@update');
$router->delete('/api/v1/buku/{id}', 'bukuController@delete');
//peminjaman
$router->get('/api/v1/peminjaman', 'peminjamanController@index');
$router->get('/api/v1/peminjaman/{id}', 'peminjamanController@getByID');
$router->post('/api/v1/peminjaman', 'peminjamanController@insert');
$router->put('/api/v1/peminjaman/{id}', 'peminjamanController@update');
$router->delete('/api/v1/peminjaman/{id}', 'peminjamanController@delete');
//pesan
$router->get('/api/v1/pesan', 'pesanController@index');
$router->get('/api/v1/pesan/{id}', 'pesanController@getByID');
$router->post('/api/v1/pesan', 'pesanController@insert');
$router->put('/api/v1/pesan/{id}', 'pesanController@update');
$router->delete('/api/v1/pesan/{id}', 'pesanController@delete');
$router->post('/api/v1/account/login', 'AccountController@login');