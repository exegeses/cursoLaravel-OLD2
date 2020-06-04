<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Marca;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::with('relMarca', 'relCategoria')->get();

        return view('adminProductos',
                    [ 'productos'=>$productos ]
                );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('formAgregarProducto',
                    [
                        'marcas'=>$marcas,
                        'categorias'=>$categorias
                    ]
                    );

    }

    public function subirImagen(Request $request)
    {
        $prdImagen = 'noDisponible.jpg';
        // original

        //si enviaron un archivo
        if( $request->file('prdImagen') ){
            //$prdImagen = $request->file('prdImagen')->getClientOriginalName();
            $prdImagen = time().'.'.$request->file('prdImagen')->clientExtension();
            $request->file('prdImagen')->move( public_path('productos/'), $prdImagen );
        }
        return $prdImagen;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ## validación
        $validacion = $request->validate(
                           [
                            'prdNombre'=>'required|min:5|max:70',
                            'prdPrecio'=>'required|numeric|min:0',
                            'prdPresentacion'=>'required|min:5|max:150',
                            'prdStock'=>'required|integer|min:0',
                            'prdImagen'=>'mimes:jpg,jpeg,png,svg,gif|max:2048'
                           ]
        );
        ## capturamos datos enviados por el form
        $prdNombre = $request->input('prdNombre');
        ## subir imagen
        $prdImagen = $this->subirImagen($request);
        ## guardar

        return $prdImagen;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
