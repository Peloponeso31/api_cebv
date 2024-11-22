<div style="text-align: center;">
    <br>
    <span style="text-decoration: overline;">
            @auth
            {{ auth()->user()->empleado->nombreCompleto() }}
        @else
            Invitado del Sistema.
        @endauth
        </span> <br>
    @auth
        {{ auth()->user()->empleado->puesto->nombre }}
    @else
        Sin puesto en la CEBV
    @endauth
</div>
