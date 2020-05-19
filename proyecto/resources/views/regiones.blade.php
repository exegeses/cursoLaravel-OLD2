@extends('layouts.plantillaBase')

    @section('contenido')
        <h1>Listado de regiones</h1>

        <ul class="list-group">
        @foreach( $regiones as $region )

            <li class="list-group-item list-group-item-action">
                {{ $region->regID }} -
                {{ $region->regNombre }}
            </li>

        @endforeach
        </ul>


    @endsection
