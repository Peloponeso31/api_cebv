<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informe de inicio</title>
    <style>
        @page {
            margin: 0 0 0 0;
        }

        header {
            text-align: center;
        }

        .imagen-centrada {
            max-width: 50%;
            height: auto;
        }

        mark {
            background-color: #FEF2CD;
        }

    </style>
</head>

<!-- Header -->
<header>
    <div class="contenedor-imagen">
        <img class="imagen-centrada" src="{{ public_path('reportes/informe_de_inicio/header.png') }}"
             alt="header-image">
    </div>
</header>
<body>

<div style="text-align: center">INFORME DE INICIO</div>
<div style="text-align: center">
    <mark>@yield('nombre-completo') - @yield('folio')</mark>
</div>

<p>
    En la Ciudad de Xalapa de Enríquez del Estado de Veracruz, siendo las
    <mark>@yield('hora') horas del día @yield('fecha')</mark>
</p>
</body>

</html>
