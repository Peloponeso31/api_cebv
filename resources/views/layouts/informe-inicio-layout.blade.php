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

        body {
            margin-top: 3cm;
            margin-bottom: 3cm;
            height: 100%;
            width: 100%;
            background-image: url('{{ public_path('reportes/informe_de_inicio/bg.png') }}');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            display: flex;
            flex-direction: column;
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

<body>
<!-- Estos tres componentes van por defecto para membretar el documento -->
<x-header/>
<x-footer/>
<x-watermark/>

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
    búsqueda
    <mark> RANDOM @yield('nombre-completo-desaparecido')</mark>
</p>
<div class="texto-centrado">
    <u>Despliegue Operativo</u>
</div>

<p>
    El mismo día que inició la presente, se alertó a la Secretaría de Seguridad Pública (SSP), sobre la No localización
    <mark> RANDOM @yield('nombre-completo-desaparecido')</mark>
    , a través del grupo habilitado para la
    comunicación con el Centro Estatal de Control, Comando, Comunicaciones y Cómputo (C4), solicitando el despliegue de
    elementos policiales próximos al lugar de No Localización.
</p>

<p>
    Se turna al área jurídica para las acciones inmediatas con apego a los Principios Rectores para la Búsqueda de
    Personas Desaparecidas, las autoridades integrantes de mecanismo, dándose por terminada la presente, siendo las
    <mark>@yield('hora') horas</mark>
    del presente día, firmando al calce los que en ella intervinieron.

</p>

<div style="text-align: center;">
    <br>
    <span style="text-decoration: overline;">Jonatan Luna Franco</span> <br>
    Analista administrativo
</div>

<div style="text-align: right;">
    <p style="text-align: right">Vo. Bo.</p><br>
    <span style="text-decoration: overline;">DR. EVARISTO MENDOZA AMARO</span> <br>
    <span>Jefe De La Oficina De Búsqueda Inmediata</span>
</div>
</body>
</html>

