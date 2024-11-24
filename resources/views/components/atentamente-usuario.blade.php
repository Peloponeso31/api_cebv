<div style="margin-top: 1cm">
    Sin otro particular, me permito enviarle un atento y cordial saludo.
    <br>
    <br>
    <strong>
        Atentamente
    </strong>
    <br>
    @auth
        <mark>
            {{ auth()->user()->empleado->NombreCompleto() }}
        </mark>
        <br>
        {{ auth()->user()->empleado->puesto->nombre }}
    @else
        <mark>
            Anónimo
        </mark>
        <br>
        Sin puesto
    @endauth
</div>
