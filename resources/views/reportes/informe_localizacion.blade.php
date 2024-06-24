<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    @page { margin: 100px 50px; }
    #header { 
        position: fixed; left: 0px; 
        top: -100px; 
        right: 0px; 
        height: 100px; 
        text-align: center; 
    }
    #footer { 
        position: fixed; 
        left: 0px; bottom: -100px; 
        right: 0px; height: 100px;  
        display: inline-block; 
    }
    #footer .page:after { content: counter(page, upper-roman); }
    p {
        text-align: justify;
    }
    h1 {
        text-align: center;
        font-size: 18px;
        font-weight: bolder;
    }

    .encabezado1{
        text-align: right;
    }

    .encabezado2{
        text-align: left;
    }

    .texto{
        text-align: justify;
    }

    .texto2{
        text-align: justify;
    }

    .texto3{
        text-align: justify;
    }

    #centrado{
        text-align: center;
    }
    
    
    #derecha{
        text-align: right;
    }

    table{
        border-collapse:collapse;
            width: 100%;
    }

    td{
        border: 1px white;
            padding: 8px;
            text-align: center;
    }

    .montserrat-alternates-extrabold {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 800;
  font-style: normal;
  text-align: center;
}


.montserrat-alternates-regular {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 400;
  font-style: normal;
}

.montserrat-alternates-regular-2 {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 400;
  font-style: normal;
  text-align: right;
}

.montserrat-alternates-regular-3 {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 400;
  font-style: normal;
  text-align: center;
}

    body{
        background-image: url("{{ public_path('reportes/informe_localizacion/fondo.jpg') }}");
            background-repeat: no-repeat;
            background-position: center;
    }
</style>
<body>
    <div id="header">
        <img src="{{ public_path("reportes/informe_de_inicio/header.png") }}" width="472">
    </div>

    <div id="footer">
        <p>
            Enríquez s/n, Zona Centro <br>
            C.P. 91000 Xalapa, Veracruz <br>
            Tel: 01 228 841 7400 ext. 3531 <br>
            <b>www.segobver.gob.mx</b>
        </p>
        
        <p> 
            <img src="{{ public_path("reportes/informe_de_inicio/footer_3.png") }}" alt="" width="30%">
        </p>
    </div>

    <p class="montserrat-alternates-extrabold">
        INFORME DE LOCALIZACIÓN (AV) <br>
        {{ $desaparecido->persona->nombre }}
        {{ $desaparecido->persona->apellido_paterno }}
        {{ $desaparecido->persona->apellido_materno }}- 24/SB 0665-24ZC

    </p>
    <p class="montserrat-alternates-regular">
        En la Ciudad de Xalapa de Enríquez del Estado de Veracruz, siendo las 16:11 horas del día 6 de Mayo de 2024, la que suscribe, Lic. Marleny Berenice Rojo García , Analista Administrativo adscrita a la Comisión Estatal de Búsqueda, con fundamento en lo dispuesto por los artículos 1, 6, 29 fracción IV, 30, 33 fracciones I, XXIII, LII y LIV, 62, 63 y demás relativos y aplicables de la Ley Número 677 en Materia de Desaparición de Personas para el Estado de Veracruz; así como en lo dispuesto por los diversos 80 y 85 de la Ley General en Materia de Desaparición Forzada de Personas, Desaparición Cometida por Particulares y del Sistema Nacional de Búsqueda de Personas, así como el numeral 143 Búsqueda Inmediata, apartado 1.5 Detonación y coordinación de la Búsqueda Inmediata numeral 165, apartado 1.6 Rastreo remoto y 1.7 Despliegue Operativo contemplados en el Protocolo Homologado para la Búsqueda de Personas Desaparecidas y No Localizadas aprobado en el Acuerdo SNBP/002/2020 publicado en el Diario Oficial de la Federación en fecha 06 de octubre del 2020, informo los siguientes hechos: </p>
    <p class="montserrat-alternates-regular">
        Se recibe llamada telefónica del número 2961064518 perteneciente al <b>C. ANA ALEYDA BARRADAS CORTES (Madre)</b> del <b>C. {{ $desaparecido->persona->nombre }} {{ $desaparecido->persona->apellido_paterno }} {{ $desaparecido->persona->apellido_materno }}</b>, desaparecido el día 01 de mayo de 2024, en el municipio Veracruz, Veracruz, Ver, quién manifiesta lo siguiente: </p>
    <p class="montserrat-alternates-regular">
        “Buenas tardes, mi hijo llegó el día sábado 04 de mayo de 2024 a nuestra casa, en compañía de su amiga Miriam. “Sic. </p>
        <section id="morfologia">
            <div class="Morfologica">
                <div class="L">
                    <table>
                   <td> 
                    <img src="{{ public_path("reportes/informe_localizacion/localizado.jpeg") }}"
                    width="200"
                    height="200"/> 
                </td>
                <td>
                    <img src="{{ public_path("reportes/informe_localizacion/ine2.png") }}"
                    width="200"
                    height="200"/> 
                </td>
                </table><br>
                </div> 
                 </div><br>
        </section>
    <p class="montserrat-alternates-regular">
        <br>
        <br>Por lo cual, se procede a la cancelación del folio <b>24/SB 0665U-24ZC</b> por la desaparición del <b>C. {{ $desaparecido->persona->nombre }} {{ $desaparecido->persona->apellido_paterno }} {{ $desaparecido->persona->apellido_materno }}</b>. Sin otro particular, me permito enviarle un atento y cordial saludo. <br>
        <section id="morfologia">
            <div class="Morfologica">
                <div class="L">
                    <table>
                   <td> 
                    <img src="{{ public_path("reportes/informe_localizacion/boletin.png") }}"
                    width="200"
                    height="200"/> 
                </td>
                </table>
                </div> 
                 </div><br>
        </section>
        <br>Se da por terminado el presente, siendo 16:20horas del presente día, firmando al calce los que en ella intervinieron.<br>
        <br>
        <br>
        <br>
        <div id="centrado">
        <p class="montserrat-alternates-regular-3">Elaboro <br>
        Lic. Marleny Berenice Rojo García<br>
        Analista Administrativa<br></p></div>
        <br>
        <br>
        <div id="derecha">
        <p class="montserrat-alternates-regular-2">Vo. Bo.<br>
        Mtra. Fernanda Isabel Figueroa Cruz <br>
        Jefa del Departamento Especializado de Búsqueda  <br>
        <br>
        ...................................................................................... <br></p></div>
        <br>
        FIFC/EMA/JCG

    </p>


</body>
</html>