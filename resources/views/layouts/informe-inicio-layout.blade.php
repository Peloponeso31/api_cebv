@php
    $sexoCiudadano = $desaparecido->persona->sexo->id == 1 ? 'del C.' : 'de la C.';
@endphp

    <!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informe de inicio</title>
    <style>
        @page {
            size: letter;
            margin: 2cm 3cm 1cm 3cm;
        }

        @media print {
            table.paging thead td, table.paging tfoot td {
                height: .5in;
            }
        }

        #header {
            position: fixed;
            left: 0px;
            top: -100px;
            right: 0px;
            height: 100px;
            text-align: center;
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

        header {
            height: 3cm;
            width: 15.5cm;
            background-image: url('{{ public_path('reportes/informe_de_inicio/header.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: lightblue;
        }

        .header-image {
            object-fit: contain;
        }

        footer {
            position: absolute;
            height: 3cm;
            bottom: 0;
            width: 15.5cm;
            background-color: lightblue;
        }

        @media print {
            header, footer {
                position: fixed;
            }

            footer {
                bottom: 0;
            }
        }

        body {
            height: 100%;
            width: 100%;
            background-image: url( {{ public_path('reportes/informe_de_inicio/bg.png') }});
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

        .column {
            position: fixed;
            left: 0;
            bottom: 0;
            right: 0;
            height: auto;
            float: left;
            width: 50%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .imagen-centrada {
            width: auto;
            height: 2cm;
        }

        p {
            text-align: justify;
            z-index: 2;
        }

        mark {
            background-color: #FEF2CD;
        }

        .texto-centrado {
            text-align: center;
        }

    </style>
</head>

<!-- Header -->
<header>

</header>

<body>
<div id="header">Hola mundo</div>
<div id="footer">Hola mundo</div>
<div class="texto-centrado">INFORME DE INICIO</div>
<div class="texto-centrado">
    <mark>@yield('nombre-completo-desaparecido') - @yield('folio')</mark>
</div>

<p>
    <br>
    En la Ciudad de Xalapa de Enríquez del Estado de Veracruz, siendo las
    <mark>@yield('hora') horas del día @yield('fecha')</mark>
    el (la) suscrito(a)
    <mark>@yield('nombre-completo-usuario'), @yield('nombre-puesto')</mark>
    adscrito a la Comisión Estatal de Búsqueda, con fundamento en lo dispuesto por los artículos 1, 6, 29 fracción IV,
    30, 33 fracciones I, XXIII, LII y LIV, 62, 63 y demás relativos y aplicables de la Ley Número 677 en Materia de
    Desaparición de Personas para el Estado de Veracruz; así como en lo dispuesto por los diversos 80 y 85 de la Ley
    General en Materia de Desaparición Forzada de Personas, Desaparición Cometida por Particulares y del Sistema
    Nacional de Búsqueda de Personas, así como el numeral 143 Búsqueda Inmediata, apartado 1.5 Detonación y coordinación
    de la Búsqueda Inmediata numeral 165, apartado 1.6 Rastreo remoto y 1.7 Despliegue Operativo contemplados en el
    Protocolo Homologado para la Búsqueda de Personas Desaparecidas y No Localizadas aprobado en el Acuerdo
    SNBP/002/2020 publicado en el Diario Oficial de la Federación en fecha 06 de octubre del 2020:
</p>

<p>
    <br>
    En la Ciudad de Xalapa de Enríquez del Estado de Veracruz, siendo las
    <mark>@yield('hora') horas del día @yield('fecha')</mark>
    el (la) suscrito(a)
    <mark>@yield('nombre-completo-usuario'), @yield('nombre-puesto')</mark>
    adscrito a la Comisión Estatal de Búsqueda, con fundamento en lo dispuesto por los artículos 1, 6, 29 fracción IV,
    30, 33 fracciones I, XXIII, LII y LIV, 62, 63 y demás relativos y aplicables de la Ley Número 677 en Materia de
    Desaparición de Personas para el Estado de Veracruz; así como en lo dispuesto por los diversos 80 y 85 de la Ley
    General en Materia de Desaparición Forzada de Personas, Desaparición Cometida por Particulares y del Sistema
    Nacional de Búsqueda de Personas, así como el numeral 143 Búsqueda Inmediata, apartado 1.5 Detonación y coordinación
    de la Búsqueda Inmediata numeral 165, apartado 1.6 Rastreo remoto y 1.7 Despliegue Operativo contemplados en el
    Protocolo Homologado para la Búsqueda de Personas Desaparecidas y No Localizadas aprobado en el Acuerdo
    SNBP/002/2020 publicado en el Diario Oficial de la Federación en fecha 06 de octubre del 2020:
</p>
<p>
    @yield('sintesis-desaparicion')
</p>
<p>
    <mark>"@yield('hechos-desaparicion')"</mark>
</p>

<p>
    Se lleva a cabo una búsqueda remota en la base de datos del Registro Nacional de Detenciones (RND), consultada en
    <b>consultasdetenciones.sspc.gob.mx</b> obteniendo resultado @yield('resultado-RND'), respecto a la
    búsqueda {{$sexoCiudadano}} @yield('nombre-completo-desaparecido')
</p>
<div class="texto-centrado">
    <u>Despliegue Operativo</u>
</div>

<p>
    El mismo día que inició la presente, se alertó a la Secretaría de Seguridad Pública (SSP), sobre la No localización
    <mark>{{$sexoCiudadano}} @yield('nombre-completo-desaparecido')</mark>, a través del grupo habilitado para la comunicación con el Centro Estatal de
    Control, Comando, Comunicaciones y Cómputo (C4), solicitando el despliegue de elementos policiales próximos al lugar
    de No Localización.

</p>

<footer>
    <p>
        Enríquez s/n, Zona Centro
        <br>
        C.P. 91000 Xalapa, Veracruz
        <br>
        Tel: 01 228 841 7400 ext. 3531
        <br>
        <b>www.segobver.gob.mx</b>
    </p>

    <img
        style="position: absolute;right: -3cm; margin: 0; bottom: -1cm; align-content: end; height: 3.15in; width: 2.01in;"
        src="{{ public_path('reportes/informe_de_inicio/footer_3.png') }}"
        alt="200years">

    <img style="position: absolute; top: .5cm; width: 30%; padding-left: 8cm"
         src="{{ public_path('reportes/informe_de_inicio/footer_2.png') }}"
         alt="footer-image2">
</footer>
</body>
</html>

