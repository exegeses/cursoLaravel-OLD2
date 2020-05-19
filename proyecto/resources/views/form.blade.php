@include('layouts.header')

    <main class="container">

        <h1>Formulario de envío</h1>
        <div class="alert alert-secondary">
            <form action="/proceso" method="post">
                @csrf
                Nombre: <br>
                <input type="text" name="nombre" class="form-control">
                <br>
                <button class="btn btn-dark">enviar dato</button>

            </form>
        </div>

    </main>

@include('layouts.footer')
