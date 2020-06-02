@extends('layouts.plantillaBase')

    @section('contenido')

        <h1>Alta de una categoría</h1>

        <div class="alert alert-secondary p-3 col-8 mx-auto">
            <form action="/agregarCategoria" method="post">
                @csrf

                Categoría: <br>
                <input type="text" name="catNombre" class="form-control">
                <br>
                <button class="btn btn-dark">
                    Agregar categoría
                </button>
                <a href="/adminCategorias" class="btn btn-outline-secondary">
                    volver a panel
                </a>
            </form>
        </div>

        @if ( $errors->any() )
            <div class="alert alert-danger col-8 mx-auto">
                <ul>
                    @foreach ( $errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    @endsection
