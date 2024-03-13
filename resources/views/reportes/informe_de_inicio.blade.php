<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>INFORME DE INICIO</h1>
    {{ $reporte->desaparecido->first()->nombre }} {{ $reporte->desaparecido->first()->apellido_paterno }} {{ $reporte->desaparecido->first()->apellido_paterno }} - {{$reporte->folio}}

</body>
</html>