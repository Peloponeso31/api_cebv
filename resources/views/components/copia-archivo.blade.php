<div style="font-size: x-small; opacity: 80%;">
    <br>
    C.c.p. Archivo.
    <br>
    @auth
        <mark>FIFC/{{ auth()->user()->empleado->Iniciales() }}</mark>
    @else
        <mark>FIFC/Anónimo</mark>
    @endauth
</div>
