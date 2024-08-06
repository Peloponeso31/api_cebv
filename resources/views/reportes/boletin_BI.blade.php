<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-left: 6.8%;
    }

    img {
        object-fit: cover;
        width: 20em;
    }

    th, td {
        border: 1px transparent;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 30px;
        padding-right: 30px;
        text-align: left;
        font-size: 3em;
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
    }

    h2 {
        text-align: left;
        color: #665041;
        font-size: 1.3em;
    }

    h3 {
        text-align: left;
        color: #B79D47;
        font-size: .8em;
    }

    .montserrat-alternates-extrabold {
        font-family: "Montserrat Alternates", sans-serif;
        font-weight: 800;
        font-style: normal;
    }

    .montserrat-alternates-regular {
        font-family: "Montserrat Alternates", sans-serif;
        font-weight: 400;
        font-style: normal;
    }
</style>

<body>
<table>
    <tr>
        <td class="txt"><br> <br> <br> </td>
    </tr>

    <th rowspan="2"></th>
    <th class="montserrat-alternates-extrabold"><h2>
            {{ $desaparecido->persona->nombre }}
            {{ $desaparecido->persona->apellido_paterno }}
            {{ $desaparecido->persona->apellido_materno }}
        </h2></th>
    <tr>
        <td class="montserrat-alternates-extrabold"> NO. FOLIO</td>
    </tr>

    <tr style="height: 10px;  margin: 5em;">

        <td style="text-align: center; background-image: url('{{ $imagen }}'); background-repeat: no-repeat; background-size: cover; background-position: center;" rowspan="9">
            <!-- <img src="{{-- $imagen --}}"> -->
        </td>
        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold">
                SEXO:</h3> {{ $desaparecido->persona->sexo_al_nacer }}   </td>
    <tr>

        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold">EDAD ACTUAL:</h3>
            {{ $desaparecido->persona->edad_anos() }} años
        </td>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold">FECHA DE NACIMIENTO:</h3>
            {{ $desaparecido->persona->fecha_nacimiento_legible() }}
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
</body>
</html>
