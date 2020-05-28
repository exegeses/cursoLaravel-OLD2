@extends('layouts.plantillaBase')
    @section('contenido')

        <h1>Alta de un nuevo destino</h1>

        <form action="/agregarDestino" method="post">
            @csrf

            Nombre: <br>
            <input type="text" name="destNombre" class="form-control">
            <br>
            Región: <br>
            <select name="regID" class="form-control" required>
                <option value="">Seleccione una Región</option>
            </select>
            <br>
            Precio: <br>
            <input type="text" name="destPrecio" class="form-control">
            <br>
            Asientos Totales: <br>
            <input type="text" name="destAsientos" class="form-control">
            <br>
            Asientos Disponibles: <br>
            <input type="text" name="destDisponibles" class="form-control">
            <br>

            <br>
            <input type="submit" value="enviar" class="btn btn-dark">
        </form>

    @endsection

