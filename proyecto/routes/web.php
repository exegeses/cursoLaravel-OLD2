<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function (){
    return 'hola mundo';
});
Route::get('/test', function (){
    return view('test');
});
//Route::view('/blade', 'estructuras');

## Pasar datos a una vista
Route::get('/blade', function(){
    $nombre = 'marcos';
    $numero = 18;
    return view('estructuras',
            [
                'nombre' => $nombre,
                'numero' => $numero
            ]
    );
});



