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
<x-header/>
<x-footer/>
<x-watermark/>
@yield('content')
</body>
</html>
