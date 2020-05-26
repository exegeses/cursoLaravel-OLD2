@extends('layouts.plantillaBase')

    @section('contenido')

        <h1>Alta de una región</h1>

        <div class="alert alert-secondary p-4">

            <form action="/agregarRegion" method="post">
                @csrf
                Región: <br>
                <input type="text" name="regNombre" class="form-control">
                <br>
                <button class="btn btn-dark">Agregar</button>
                <a href="/adminRegiones" class="btn btn-outline-secondary ml-3">
                    Volver a panel
                </a>
            </form>

        </div>

    @endsection
