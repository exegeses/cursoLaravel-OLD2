@extends('layouts.plantillaBase')

    @section('contenido')

        <h1>Baja de una Región</h1>

        <div class="alert border-danger text-danger col-6 mx-auto">
            Se eliminará la región: {{ $region->regNombre }}
            <form action="/eliminarRegion" method="post">
                @csrf
                <input type="hidden" name="regID" value="{{ $region->regID }}">
                <button class="btn btn-danger btn-block my-3">
                    Confirmar baja
                </button>
                <a href="/adminRegiones" class="btn btn-outline-secondary btn-block">
                    volver a panel
                </a>
            </form>
        </div>

        <script>
            Swal.fire(
                'Advertencia',
                'Se eliminará la region seleccionada',
                'warning'
            )
        </script>

    @endsection
