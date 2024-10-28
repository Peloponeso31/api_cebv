<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

    <title>Document</title>
</head>

<style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
        background-image: url("{{ public_path('reportes/boletin_BI/Edit_Busqueda Inmediata.png') }}");
        background-repeat: no-repeat;
        background-position: center center;
        font-family: "Montserrat", sans-serif;
    }

    pre {
        font-family: "Montserrat", sans-serif;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        height: 100%;
    }

    th, td {
        border: 1px transparent;;
        object-fit: cover;
    }

    .desc-vulnerabilidad {
        font-size: 2.9em;
    }

    .desc-nula {
        color: white;
    }

    .img {
        image-orientation: initial;
    }

    h1 {
        text-align: center;
        color: #AA424D;
        font-size: 1.3em;
        margin: 0;
    }

    h2 {
        text-align: left;
        color: #5b352d;
        font-size: 7em;
        display: inline-block;
        line-height: 0.8;
        font-weight: 450;
        margin: 0;
    }

    h3 {
        text-align: left;
        color: #b49313;
        font-size: .8em;
        margin: 0;
    }

    h4 {
        text-align: left;
        color: #312f30;
        font-weight: lighter;
        font-size: 3em;
        margin: 0;
    }

    #imagen-desaparecido {
        position: absolute;
        width: 1200px;
        height: 1200px;
        min-width: 1200px;
        min-height: 1200px;
        max-width: 1200px;
        max-height: 1200px;
        left: 200px;
        top: 500px;
    }

    #nombre-folio {
        position: absolute;
        left: 1500px;
        top: 100px;
    }

    #atributos {
        position: absolute;
        left: 1500px;
        right: 200px;
        top: 500px;
    }

    #aviso-footer {
        position: absolute;
        left: 201px;
        top: 2449px;
        padding: 20px;
        width: 1260px;
        font-size: 2.13em;
        font-weight: 500;
        color: #5e3d38;
    }

    #senas-particulares {
        position: absolute;
        left: 200px;
        right: 200px;
        top: 1750px;
    }

    .resaltado {
        font-weight: bold;
        color: #b49313;
        margin: 0;
        padding: 0;
    }

    .texto {
        font-size: 3.5em;
        margin: 0;
        padding: 0;
    }

</style>

<body>
<!--
Si, tiene que ser una tabla para que jale la imagen, object-fit no funciona.
El div de dentro determina las dimensiones de la imagen.
-->
<table id="imagen-desaparecido">
    <tr style="max-width: 1200px; max-height: 1200px;">
        <td style="max-width: 1200px; max-height: 1200px; background-image: url('{{ $imagen }}'); background-repeat: no-repeat; background-size: cover; background-position: center;">
            <div style="height: 1200px; width: 1200px"></div>
        </td>
    </tr>
</table>

<div id="nombre-folio">
    <h2>
        {{ $desaparecido->persona->nombre }} {{ $desaparecido->persona->apellido_paterno }} {{ $desaparecido->persona->apellido_materno }}
    </h2>
    <h4>
        {{ $folio->folio_cebv }}
    </h4>
</div>

<div id="atributos">
    @isset($desaparecido->persona->sexo->nombre)
        <p class="texto"><b class="resaltado"> Sexo: </b> {{ $desaparecido->persona->sexo->nombre }}. </p>
    @endisset

    @if($desaparecido->persona->fecha_nacimiento != null)
        <p class="texto"><b class="resaltado"> Edad actual: </b> {{ $desaparecido->persona->edadAnhos() }} años. </p>
    @elseif($desaparecido->edad_estimada_anos != null)
        <p class="texto"><b class="resaltado"> Edad actual: </b> {{ $desaparecido->edad_momento_desaparicion_anos }}. </p>
    @endif

    @isset($desaparecido->persona->salud->estatura)
        <p class="texto"><b class="resaltado"> Estatura: </b> {{ $desaparecido->persona->salud->estatura }}.</p>
    @endisset

    @isset($desaparecido->persona->mediaFiliacion->color_ojos_id)
        <p class="texto"><b class="resaltado"> Color de ojos: </b> {{ $desaparecido->persona->mediaFiliacion->colorOjos->nombre }}. </p>
    @endisset

    @isset($desaparecido->persona->mediaFiliacion->color_piel_id)
        <p class="texto"><b class="resaltado"> Color de piel: </b> {{ $desaparecido->persona->mediaFiliacion->colorPiel->nombre }}. </p>
    @endisset
</div>

<div id="senas-particulares">
    @isset($desaparecido->senas_particulares_boletin)
        <pre class="texto"><b class="resaltado">Señas particulares:</b><br>{{ $desaparecido->senas_particulares_boletin }}</pre>
    @endisset
</div>

<div id="aviso-footer">
    <p>
        Se considera que la integridad fisica de la persona puede encontrarse en riesgo,
        toda vez que pueda ser victima de la comisión de un delito.
    </p>

    <p>
        La búsqueda de una persona puede generar información confusa, para acceder a
        información fidedigna, favor de referirse a los canales soficiales.
    </p>
</div>
</body>
</html>
