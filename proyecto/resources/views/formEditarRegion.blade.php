@extends('layouts.plantillaBase')

    @section('contenido')

        <h1>Modificación de una región</h1>

        <div class="alert alert-secondary p-4">

            <form action="/editarRegion" method="post">
                @csrf
                Región: <br>
                <input type="text" value="{{ $region->regNombre }}" name="regNombre" class="form-control">
                <input type="hidden" name="regID" value="{{ $region->regID }}">
                <br>
                <button class="btn btn-dark">Modificar</button>
                <a href="/adminRegiones" class="btn btn-outline-secondary ml-3">
                    Volver a panel
                </a>
            </form>

        </div>

    @endsection
