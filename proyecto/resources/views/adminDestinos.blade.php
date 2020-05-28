@extends('layouts.plantillaBase')
@section('contenido')
    <h1>Panel de administración de Destinos</h1>
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
        <tr>
            <th>Destino (aeropuerto)</th>
            <th>Región</th>
            <th>Precio</th>
            <th colspan="2">
                <a href="/formAgregarDestino" class="btn btn-dark">
                    Agregar
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach( $destinos as $destino )
            <tr>
                <td>{{$destino->destNombre}}</td>
                <td>{{$destino->regNombre}}</td>
                <td>${{$destino->destPrecio}}</td>
                <td>
                    <a href="/formModificarDestino/{{$destino->destID}}" class="btn btn-outline-secondary">
                        Modificar
                    </a>
                </td>
                <td>
                    <a href="/formEliminarDestino/{{$destino->destID}}" class="btn btn-outline-secondary">
                        Eliminar
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
