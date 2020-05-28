<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $destinos = DB::table('destinos')
                    ->join('regiones',
                            'destinos.regID',
                            '=',
                        'regiones.regID')
                    ->get();
        return view('adminDestinos',
                    ['destinos'=>$destinos]
                );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // listado de regiones para el combo
        $regiones = DB::table('regiones')->get();
        return view('formAgregarDestino',
                    [ 'regiones' => $regiones ]
                );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $destNombre = $_POST["destNombre"];
        $regId = $_POST['regID'];
        $destPrecio = $_POST['destPrecio'];
        $destAsientos = $_POST['destAsientos'];
        $destDisponibles = $_POST['destDisponibles'];
        DB::table('destinos')
                ->insert(
                    [
                        'destNombre' => $destNombre,
                        'regID' => $regId,
                        'destPrecio' => $destPrecio,
                        'destAsientos' => $destAsientos,
                        'destDisponibles' => $destDisponibles
                    ]
                );
        return redirect('/adminDestinos')
                    ->with('mensaje', 'Destino: '.$destNombre.' agregado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
