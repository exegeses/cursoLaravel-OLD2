@include( 'layouts.header' )

    <main class="container my-4">
        <h1>Directivas Blade</h1>
        Nombre: {{ $nombre }}
        <br>
        @if ( $numero < 10 )
            <div class="alert alert-success">
                es menor
            </div>
        @else
            <div class="alert alert-danger">
                no es menor
            </div>
        @endif
        <br>

        <ul class="list-group col-3">
        @for ( $i=1; $i < $numero; $i++ )
            <li class="list-group-item list-group-item-action">
                {{ $i }}
            </li>
        @endfor
        </ul>

    </main>

@include( 'layouts.footer' )
