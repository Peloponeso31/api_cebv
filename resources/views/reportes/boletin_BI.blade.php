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

    html, body, {
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
        line-height: 0.73;
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
        top: 100px;;
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
        {{ $desaparecido->persona->nombre }}
        {{ $desaparecido->persona->apellido_paterno }}
        {{ $desaparecido->persona->apellido_materno }}
    </h2>
    <h4>
        {{ $folio->folio_cebv }}
    </h4>
</div>

<div id="atributos">
    <!--
    isset significa: Si existe, y a su vez no es nulo.
    Refierase a las directivas de blade para mas informacion sobre la utilizacion de directivas.
    https://laravel.com/docs/11.x/blade#blade-directives
    -->
    @isset($desaparecido->persona->sexo->nombre)
        <p class="texto"><b class="resaltado"> Sexo: </b> {{ $desaparecido->persona->sexo->nombre }}. </p>
    @endisset

    @if($desaparecido->persona->fecha_nacimiento != null)
        <p class="texto"><b class="resaltado"> Edad actual: </b> {{ $desaparecido->persona->edadAnhos() }} años. </p>
    @elseif($desaparecido->edad_estimada_anos != null)
        <p class="texto"><b class="resaltado"> Edad actual: </b> {{ $desaparecido->edad_momento_desaparicion_anos }}.
        </p>
    @endif

    @isset($desaparecido->persona->mediaFiliacion->estatura)
        <p class="texto"><b class="resaltado"> Estatura: </b> {{ $desaparecido->persona->mediaFiliacion->estatura }}.
        </p>
    @endisset

    @isset($desaparecido->persona->mediaFiliacion->color_ojos_id)
        <p class="texto"><b class="resaltado"> Color de
                ojos: </b> {{ $desaparecido->persona->mediaFiliacion->colorOjos->nombre }}. </p>
    @endisset

    @isset($desaparecido->persona->mediaFiliacion->color_piel_id)
        <p class="texto"><b class="resaltado"> Color de
                piel: </b> {{ $desaparecido->persona->mediaFiliacion->colorPiel->nombre }}. </p>
    @endisset

    @if($desaparecido->persona->mediaFiliacion->color_cabello_id || $desaparecido->persona->mediaFiliacion->tamano_cabello_id || $desaparecido->persona->mediaFiliacion->tipo_cabello_id)
        <p class="texto"><b class="resaltado">
                Cabello: </b> {{ $desaparecido->persona->mediaFiliacion->colorCabello->nombre . ', ' }}{{ $desaparecido->persona->mediaFiliacion->tamanoCabello->nombre . ', ' }}{{ $desaparecido->persona->mediaFiliacion->tipoCabello->nombre }}
            . </p>
    @endif

</div>

<div id="senas-particulares">
    @isset($senas)
        <pre class="texto"><b class="resaltado">Señas particulares:</b><br>{{ $senas }}</pre>
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

<!--
{{--
<img id="imagen-desaparecido" src="{{ $imagen }}" alt="">
<table>
    <th rowspan="2"></th>
    <th class="montserrat-alternates-extrabold"><h2>
            {{ $desaparecido->persona->nombre }}
            {{ $desaparecido->persona->apellido_paterno }}
            {{ $desaparecido->persona->apellido_materno }}
        </h2></th>
    <tr>
        <td class="montserrat-alternates-extrabold"> {{ $folio->folio_cebv  }} </td>
    </tr>

    <tr style="height: 10px;  margin: 5em;">
        <td style="text-align: center; background-image: url('{{-- $imagen --}}'); background-repeat: no-repeat; background-size: cover; background-position: center;" rowspan="9">
        </td>
        <td>
            <h3>SEXO:</h3> {{--  --}}
</td>
<tr>

<td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold">EDAD ACTUAL:</h3>
{{ $desaparecido->persona->edadAnhos() }} años
        </td>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold">FECHA DE NACIMIENTO:</h3>
            {{ $desaparecido->persona->fechaNacimientoLegible() }}
</td>
</tr>
<tr>
<td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold">
        ESTATURA:</h3> {{ $desaparecido->persona->estatura }} </td>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold">COLOR DE
                OJOS:</h3> {{ $desaparecido->persona->caracteristicasfisicas->color_ojos->color ?? "" }} </td>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold">COLOR DE
                PIEL:</h3> {{ $desaparecido->persona->caracteristicasfisicas->color_piel ->colorpiel ?? "" }} </td>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold">
                CABELLO:</h3> {{ $desaparecido->persona->caracteristicasfisicas->color_cabello ->colorcabellos ?? "" }}
, {{ $desaparecido->persona->caracteristicasfisicas->tipo_cabello ->tipocabello ?? "" }} </td>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold">LUGAR DE
                DESAPARICIÓN:</h3> Veracruz, Ver.
        </td>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold">FECHA DE
                DESAPARICIÓN:</h3> 6 de marzo de 2022
        </td>
    </tr>
    </tr>
    <tr>
        <th colspan="2"><h3 class="montserrat-alternates-extrabold">SEÑAS PARTICULARES:</h3></th>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular" colspan="2">Requiere trtamiento médico especializado. Cicatriz en la
            pierna derecha, lunar en el pecho, tatuaje en mano derecha,<br> pieza dental frontal inferior fracturada.
        </td>
    </tr>
    <tr>
        <td colspan="2" class="desc-nula"><br> <br> <br> <br></td>
    </tr>

    <tr>
        <td colspan="2" class="montserrat-alternates-regular" class="desc-vulnerabilidad">Se considera que la integridad
            fisica de la persona puede encontrarse<br> en riesgo, toda vez que pueda ser victima de la comisión de un
            delito. <br>
            <br>La búsqueda de una persona puede generar información confusa, para<br> acceder a información fidedigna,
            favor de referirse a los canales <br>oficiales.
        </td>
    </tr>
</table>
--}}
-->
</body>
</html>
