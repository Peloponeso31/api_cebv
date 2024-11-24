<span>
    <mark>
        @auth
            {{ auth()->user()->empleado->nombreCompleto() }}, {{ auth()->user()->empleado->puesto->nombre }}
        @else
            Invitado, Sin puesto
        @endauth
    </mark>
</span>
