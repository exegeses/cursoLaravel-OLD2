<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $regiones = DB::table('regiones')->get();
        return view('adminRegiones', ['regiones'=>$regiones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('formAgregarRegion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $regNombre = $_POST['regNombre'];
        DB::table('regiones')
            ->insert(
                [ 'regNombre' => $regNombre ]
            );

        return redirect('/adminRegiones')
                ->with('mensaje', 'Región '.$regNombre.' agregada correctamente');
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
        $region = DB::table('regiones')
                    ->where('regID', $id)
                    ->first();
        return view('formEditarRegion', [ 'region'=>$region ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $regID = $_POST['regID'];
        $regNombre = $_POST['regNombre'];
        DB::table('regiones')
                ->where('regID', $regID)
                ->update(
                    [ 'regNombre'=>$regNombre ]
                );
        return redirect('/adminRegiones')
                    ->with('mensaje', 'Región '.$regNombre.' modificada correctamente');
    }

    public function confirmarBaja($regID)
    {
        // detalle para confirmar baja
        $Region = DB::table('regiones')
                    ->where('regID', $regID)
                        ->first();
        return view('formEliminarRegion',
                    [ 'region' => $Region ]
                );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $regID = $_POST["regId"];
        DB::table('regiones')
            ->where('regId', $regID)
            ->delete();
        return redirect('/adminRegiones')->with('mensaje', 'Región eliminada correctamente');
    }
}
