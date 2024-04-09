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
            background-image: url("{{ public_path('reportes/boletin_BI/Logobackground-body.png') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }
        
    table{
        border-collapse:collapse;
            width: 100%;
    }


     th, td{
            border: 1px solid black;
            padding: 6px;
            text-align: left;
            font-size: 1em;
    }
    

    .gray-bg{
        background-color: gray;
    }

    .black-bg{
        background-color: black;
        color: white;
    }

    .img{
        image-orientation:initial;
        
    }

    h1{
        text-align: center;
        color: #AA424D;
        font-size: 1.3em;
    }

    h2{
        text-align: center;
        color:#665041;
        font-size: 1.3em;
    }

    h3{
        text-align: left;
        color: #B79D47;  
        font-size: .8em;
    }

   
</style>

<body>
<table>
    <colgroup>
        <col width="80%">
        <col width="20%">
      </colgroup>
    <th rowspan="2"><img class="img" src="{{ public_path('reportes/boletin_BI/Logos-Cebv.png') }}" width="250" ></th>
    <th><h2>
        {{ $desaparecido->persona->nombre }}
        {{ $desaparecido->persona->apellido_paterno }}
        {{ $desaparecido->persona->apellido_materno }}
    </h2></th>
    <tr>
        <td> NO. FOLIO </td>
    </tr>
    <tr style="height: 10px;">
    <td rowspan="9"> <img src="{{ public_path('reportes/boletin_BI/foto_mia.jpg') }}" width="50%" height="35%" ></td>
        <td><h3>SEXO:</h3> {{ $desaparecido->persona->sexo_al_nacer }} </td>
            <tr>
            <td><h3>EDAD ACTUAL:</h3>
                {{ $desaparecido->persona->edad_anos() }} años 
            </td>
            </tr>
            <tr>
            <td><h3>FECHA DE NACIMIENTO:</h3> 
                {{ $desaparecido->persona->fecha_nacimiento_legible() }}
            </td>  
            </tr>
            <tr>
            <td><h3>ESTATURA:</h3> 1.50</td> 
            </tr> 
            <tr>
            <td><h3>COLOR DE OJOS:</h3> café claro</td>
            </tr>
            <tr>
            <td><h3>COLOR DE PIEL:</h3> morena clara</td>
            </tr>
            <tr>
            <td><h3>CABELLO:</h3> negro, crespo</td>
            </tr>
            <tr>
            <td><h3>LUGAR DE DESAPARICIÓN:</h3> Veracruz, Ver.</td>
            </tr>
            <tr>
            <td><h3>FECHA DE DESAPARICIÓN:</h3> 6 de marzo de 2022</td>
            </tr>
    </tr>
    <tr>
        <th colspan="2"><h3>SEÑAS PARTICULARES:</h3></th>
    </tr>
    <tr>
        <td colspan="2">Requiere trtamiento médico especializado. Cicatriz en la pierna derecha, lunar en el pecho, tatuaje en mano derecha, pieza dental frontal inferior fracturada.</td>
    </tr>
    <tr>
        <th colspan="2"><h1>¡AYÚDALE A VOLVER!</h1></th>
    </tr>
    <tr>
        <td class="gray-bg">Se considera que la integridad fisica de la persona puede encontrarse en riesgo, toda vez que pueda ser victima de la comisión de un delito. <br>
            <br>La búsqueda de una persona puede generar información confusa, para acceder a información fidedigna, favor de referirse a los canales oficiales</td>
        <td class="black-bg">CONTACTO<br>
            228 319 3187 <br>
            busqueda.veracruz@gmail.com <br>
            Emergencias 911 <br>
            segobver.gob.mx/cebv</td>    
    </tr>
</table>
</body>
</html>