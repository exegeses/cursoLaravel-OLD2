@include('layouts.header')

    <main class="container">
        <h1>Mostrar parametros de la petición</h1>

        <p class="alert alert-secondary">
            El parametro es: {{ $curso }}
        </p>

    </main>

@include('layouts.footer')
