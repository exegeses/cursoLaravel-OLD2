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
# pasar datos como parámetro (desde la URL)
Route::get('/parametro/{curso}', function($curso){
    return view('parametro', ['curso'=>$curso]);
});

# pasar parametros desde un form
    # primero mostrar el form
Route::get('/form', function(){
    return view('form');
});
    # luego cargar la petición
Route::post('/proceso', function(){
    $nombre = $_POST['nombre'];
    return view('procesado', [ 'nombre'=>$nombre ] );
});

###### uso de plantillas blade
Route::view('/inicio', 'inicio');

###########################################
#####   USANDO RAW SQL  #######
Route::get('/rawSelect', function(){
    //imprimir datos de table regiones
    $regiones = DB::select('SELECT regID, regNombre FROM regiones');
    //dd( $regiones );
    return view('regiones', ['regiones'=>$regiones] );
});
#tarea: listar datos de tabla destinos
