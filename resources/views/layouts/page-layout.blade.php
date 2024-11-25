<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Document')</title>
    <style>
        @page {
            size: letter;
            margin: 2cm 3cm 1cm 3cm;
        }

        @font-face {
            font-family: 'Verdana';
            src: url("{{ public_path('fonts/Verdana.ttf') }}") format('truetype');
        }

        html {
            font-family: 'Verdana', sans-serif;
            text-align: justify;
            font-weight: normal;
            font-size: 12pt;
            line-height: 14pt;
        }

        .titulo {
            font-weight: bold;
            font-size: 14pt;
            line-height: 14pt;
        }

        /* Subtítulo: Verdana Regular 12 pt; interlineado 11 pt */
        .subtitulo {
            font-weight: normal;
            font-size: 12pt;
            line-height: 11pt;
        }

        body {
            margin-top: 3cm;
            margin-bottom: 3cm;
            height: 100%;
            width: 100%;
            background-image: url('/public/reportes/informe_de_inicio/bg.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            display: flex;
            flex-direction: column;
        }

        p {
            z-index: 2;
        }

        mark {
            background-color: #FEF2CD;
        }
    </style>
</head>
<body>
<x-header/>
<x-footer/>
<x-watermark/>
@yield('content')
</body>
</html>
