@extends('layouts.plantillaBase')

    @section('contenido')

        <h1>Listado de destinos</h1>

        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>Destino (aeropuerto)</th>
                    <th>Region</th>
                    <th>Precio</th>
                    <th>Totales</th>
                    <th>Disponibles</th>
                </tr>
            </thead>
            <tbody>
        @foreach( $destinos as $destino )
                <tr>
                    <td>{{$destino->destID}}</td>
                    <td>{{$destino->destNombre}}</td>
                    <td>{{$destino->regNombre}}</td>
                    <td>{{$destino->destPrecio}}</td>
                    <td>{{$destino->destAsientos}}</td>
                    <td>{{$destino->destDisponibles}}</td>
                </tr>
        @endforeach
            </tbody>
        </table>

    @endsection
