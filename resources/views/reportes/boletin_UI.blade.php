<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    @page {
        margin: 100px 50px;
    }

    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
        background-image: url("{{ public_path('reportes/ficha de uso interno/Ficha de Uso Interno.png') }}");
        background-repeat: no-repeat;
        background-position: center center;
    }

    #footer {
        position: fixed;
        left: 0px;
        bottom: -100px;
        right: 0px;
        height: 100px;
        display: inline-block;
    }


    #footer .page:after {
        content: counter(page, upper-roman);
    }


    table {
        border-collapse: collapse;
        width: 100%;
        margin-left: 6.8%;
    }


    th, td {
        border: 1px white;
        padding: 0px;
        text-align: justify;
        font-size: 1.4em;
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
        text-align: center;
        color: solid black;
        font-size: 1.6em;
    }

    h3 {
        text-align: left;
        color: solid black;
        font-size: .8em;
    }

    .montserrat-alternates-extrabold {
        font-family: "Montserrat Alternates", sans-serif;
        font-weight: 800;
        font-style: normal;
    }

    .txt {
        color: transparent;
    }

    .montserrat-alternates-thin {
        font-family: "Montserrat Alternates", sans-serif;
        font-weight: 100;
        font-style: normal;
    }

    .montserrat-alternates-extralight {
        font-family: "Montserrat Alternates", sans-serif;
        font-weight: 200;
        font-style: normal;
    }

    .montserrat-alternates-black {
        font-family: "Montserrat Alternates", sans-serif;
        font-weight: 900;
        font-style: normal;
    }

    .montserrat-alternates-black-italic {
        font-family: "Montserrat Alternates", sans-serif;
        font-weight: 900;
        font-style: italic;
    }

    .montserrat-alternates-regular {
        font-family: "Montserrat Alternates", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

</style>

<body>
<table>
    <colgroup>
        <col width="20%">
        <col width="20%">
    </colgroup>
    <tr>
        <td class="txt"><br> <br> <br> <br> <br> <br></td>
    </tr>
</table>
<table>
    <tr>

        <th class="montserrat-alternates-extrabold"><h2>
                <b>
                    {{ $desaparecido->persona->nombre }}
                    {{ $desaparecido->persona->apellido_paterno }}
                    {{ $desaparecido->persona->apellido_materno }}
                </b>
            </h2></th>
    </tr>
    <tr>
        <td class="montserrat-alternates-extrabold"><h2>NO. FOLIO</h2></td>
    </tr>
</table>
<table>
    <tr style="height: 10px;">
        <td rowspan="9"><img src="{{ public_path('reportes/boletin_BI/foto_mia.jpg') }}" width="50%" height="50%"></td>
        <td class="montserrat-alternates-regular"><h3><b>SEXO:</b></h3> {{ $desaparecido->persona->sexo_al_nacer }}
        </td>
    <tr>
        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold"><b>EDAD ACTUAL:</b></h3>
            {{ $desaparecido->persona->edadAnhos() }} años
        </td>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular"><h3><b>FECHA DE NACIMIENTO:</b></h3>
            {{ $desaparecido->persona->fechaNacimientoLegible() }}
        </td>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold"><b>ESTATURA:</b>
            </h3> {{ $desaparecido->persona->estatura }} </td>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold"><b>COLOR DE PIEL:</b>
            </h3> {{ $desaparecido->persona->caracteristicasfisicas->color_piel ->colorpiel }} </td>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold"><b>COLOR DE OJOS:</b>
            </h3> {{ $desaparecido->persona->caracteristicasfisicas->color_ojos->color }} </td>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold"><b>CABELLO:</b>
            </h3> {{ $desaparecido->persona->caracteristicasfisicas->color_cabello ->colorcabellos }}
            , {{ $desaparecido->persona->caracteristicasfisicas->tipo_cabello ->tipocabello }} </td>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold"><b>LUGAR DE
                    DESAPARICIÓN:</b></h3> Veracruz, Ver.
        </td>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular"><h3 class="montserrat-alternates-extrabold"><b>FECHA DE
                    DESAPARICIÓN:</b></h3> 6 de marzo de 2022
        </td>
    </tr>
    </tr>
    <tr>
        <th class="montserrat-alternates-extrabold" colspan="2"><b>SEÑAS PARTICULARES:</b></h3></th>
    </tr>
    <tr>
        <td class="montserrat-alternates-regular" colspan="2">Requiere tratamiento médico especializado. Cicatriz en la
            pierna derecha, lunar en el pecho, tatuaje en mano derecha, pieza dental <br> frontal inferior fracturada.
        </td>
    </tr>

    <tr>
        <th class="montserrat-alternates-extrabold" colspan="2"><br>FE: 27/04/2023</th>
    </tr>
</table>


</body>
</html>
