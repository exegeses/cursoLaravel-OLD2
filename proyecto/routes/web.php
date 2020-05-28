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

Route::get('/destinos', function (){
    $destinos = DB::select(
                            'SELECT
                                    destID, destNombre,
                                    d.regID, regNombre,
                                    destPrecio,
                                    destAsientos, destDisponibles
                                FROM destinos d, regiones r
                                WHERE d.regID = r.regID'
                          );
    return view('destinos', [ 'destinos'=>$destinos ]);
});
/*
 * métodos raw SQL
    DB::insert('sql ');
    DB::insert('insert into users (id, name) values (:id, :name)', [1, 'Dayle']);
    DB::update('sql ');
    DB::delete('sql ');
*/
// ejemplo modificación
Route::get('/modificar', function(){
    $precio = 7000;
    DB::update(
            'UPDATE destinos
                    SET destPrecio = ?
                WHERE destID = 8', [$precio]
        );

    return redirect('/destinos');
});

##########
## controladores + fluent queryBuilder
Route::get('/adminRegiones', 'RegionController@index');
Route::get('/formAgregarRegion', 'RegionController@create');
Route::post('/agregarRegion', 'RegionController@store');
Route::get('/formModificarRegion/{regID}', 'RegionController@edit');
Route::post('/editarRegion', 'RegionController@update');
Route::get('/formEliminarRegion/{regID}', 'RegionController@confirmarBaja');
Route::post('/eliminarRegion', 'RegionController@destroy');

Route::get('/adminDestinos', 'DestinoController@index');
Route::get('/formAgregarDestino', 'DestinoController@create');
Route::post('/agregarDestino', 'DestinoController@store');

