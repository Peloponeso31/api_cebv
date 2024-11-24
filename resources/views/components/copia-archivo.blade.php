<div style="font-size: x-small; margin-top: 2cm">
    C.c.p. Archivo.
    <br>
    @auth
        <mark>FIFC/{{ auth()->user()->empleado->Iniciales() }}</mark>
    @else
        <mark>FIFC/Anónimo</mark>
    @endauth
</div>
