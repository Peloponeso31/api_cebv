<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        font-size: .85em;
    }
    h1 {
        text-align: center;
        font-size: 18px;
        font-weight: bolder;
    }

    .encabezado1{
        text-align: left;
    }

    .encabezado2{
        text-align: left;
    }

    .encabezado3{
        text-align: left;
    }

    .encabezado4{
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

    body{
        background-image: url("{{ public_path('reportes/tarjeta_de_folio/Logobackground-body.png') }}");
            background-repeat: no-repeat;
            background-position: center;
            
    }

    .montserrat-alternates-thin {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 100;
  font-style: normal;
}

.montserrat-alternates-thin-italic {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 100;
  font-style: italic;
}

.montserrat-alternates-extralight {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 200;
  font-style: normal;
}

.montserrat-alternates-extralight-italic {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 200;
  font-style: italic;
}

.montserrat-alternates-light {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 300;
  font-style: normal;
}

.montserrat-alternates-light-italic {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 300;
  font-style: italic;
}

.montserrat-alternates-regular {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 400;
  font-style: normal;
}

.montserrat-alternates-regular-italic {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 400;
  font-style: italic;
}

.montserrat-alternates-medium {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 500;
  font-style: normal;
}

.montserrat-alternates-medium-italic {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 500;
  font-style: italic;
}

.montserrat-alternates-semibold {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 600;
  font-style: normal;
}

.montserrat-alternates-semibold-italic {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 600;
  font-style: italic;
}

.montserrat-alternates-bold {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 700;
  font-style: normal;
}

.montserrat-alternates-bold-italic {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 700;
  font-style: italic;
}

.montserrat-alternates-extrabold {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 800;
  font-style: normal;
}

.montserrat-alternates-extrabold-italic {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 800;
  font-style: italic;
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

   
</style>
<body>
    <div id="header">
        <img src="{{ public_path("reportes/tarjeta_de_folio/header.png") }}" width="472">
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

    <p class="montserrat-alternates-regular">
      Para: <mark style="background-color: yellow;"><b>ARQLGO. JOSE CASAS CHAVEZ</b></mark><br>
      JEFE DE OFICINA DE BÚSQUEDA DE LARGA DATA<br>

  </p>
  
  <p class="montserrat-alternates-regular">
      DE:  MTRA. LUZ MARÍA URIBE VARGAS<br>
      JEFA DE OFICINA DE GESTIÓN Y PROCESAMIENTO DE INFORMACIÓN <br>   
  </p>
  <p class="montserrat-alternates-regular">
      ASUNTO: <b style="color: red">ASIGNACIÓN DE FOLIO PARA INVESTIGACIÓN MINISTERIAL </b> <br>
  </p>
  <p class="montserrat-alternates-regular">
      FECHA:<mark style="background-color: yellow;"><b style="color: red">09/04/2024</b></mark><br>   
      </p>
  <p class="montserrat-alternates-regular">
      Con la finalidad de dar cumplimiento a lo dispuesto en el artículo 87 de la Ley General en Materia de Desaparición Forzada de Personas, Desaparición Cometida por Particulares y del Sistema Nacional de Búsqueda Personas, así como los diversos 38 fracción III y 62 de la Ley Número 677 en Materia de Desaparición de Personas para el Estado de Veracruz de Ignacio de la Llave, por esta vía me permito convalidar que en fecha <b style="color: red">14 de marzo de 2024</b> se asignó el folio número <mark style="background-color: yellow;"> <b style="color: red">24/IM 0009U-11ZN</b></mark> relativo a <mark style="background-color: yellow;"><b style="color: red">LAZARO PACHECO LAZCANO</b></mark>, derivado de la investigación ministerial recibida en esta Comisión. <br>
  </p>
  <p class="montserrat-alternates-regular">
      Sin otro particular, le envío un cordial saludo. <br>
  </p>
  <p class="montserrat-alternates-regular" >
      A T E N T A M E N T E <br>
      MTRA. LUZ MARÍA URIBE VARGAS 
  </p>

    <p class="montserrat-alternates-regular">
      Para: <mark style="background-color: yellow;"><b>ARQLGO. JOSE CASAS CHAVEZ</b></mark><br>
      JEFE DE OFICINA DE BÚSQUEDA DE LARGA DATA<br>

  </p>
  
  <p class="montserrat-alternates-regular">
      DE:  MTRA. LUZ MARÍA URIBE VARGAS<br>
      JEFA DE OFICINA DE GESTIÓN Y PROCESAMIENTO DE INFORMACIÓN <br>   
  </p>
  <p class="montserrat-alternates-regular">
      ASUNTO: <b style="color: red">ASIGNACIÓN DE FOLIO PARA INVESTIGACIÓN MINISTERIAL </b> <br>
  </p>
  <p class="montserrat-alternates-regular">
      FECHA:<mark style="background-color: yellow;"><b style="color: red">09/04/2024</b></mark><br>   
      </p>
  <p class="montserrat-alternates-regular">
      Con la finalidad de dar cumplimiento a lo dispuesto en el artículo 87 de la Ley General en Materia de Desaparición Forzada de Personas, Desaparición Cometida por Particulares y del Sistema Nacional de Búsqueda Personas, así como los diversos 38 fracción III y 62 de la Ley Número 677 en Materia de Desaparición de Personas para el Estado de Veracruz de Ignacio de la Llave, por esta vía me permito convalidar que en fecha <b style="color: red">14 de marzo de 2024</b> se asignó el folio número <mark style="background-color: yellow;"> <b style="color: red">24/IM 0009U-11ZN</b></mark> relativo a <mark style="background-color: yellow;"><b style="color: red">LAZARO PACHECO LAZCANO</b></mark>, derivado de la investigación ministerial recibida en esta Comisión. <br>
  </p>
  <p class="montserrat-alternates-regular">
      Sin otro particular, le envío un cordial saludo. <br>
  </p>
  <p class="montserrat-alternates-regular" >
      A T E N T A M E N T E <br>
      MTRA. LUZ MARÍA URIBE VARGAS 
  </p>


</body>
</html>