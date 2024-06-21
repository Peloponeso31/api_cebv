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

    table{
        margin: 0 auto;
        border-collapse:collapse;
            width: 75%;
            
    }

    td, th{
        border: 1px solid black;
            padding: 6px;
            text-align: left;
    }

    .bg-gray{
        background-color: #D9D9D9;
    }

    body{
        background-image: url("{{ public_path('reportes/oficio_fiscalia/Logobackground-body.png') }}");
            background-repeat: no-repeat;
            background-position: center;
    }
</style>
<body>
    <div id="header">
        <img src="{{ public_path("reportes/oficio_fiscalia/Logos-header.png") }}" width="472">
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

    <p class="encabezado1">
        Comisión Estatal de Búsqueda <br>
        Oficio: No. SEGOB/CEB/<mark style="background-color: #FEF2CD;">00571</mark>/2024 <br>
        Expediente No. <mark style="background-color: #FEF2CD;">24/SB 0085U-24ZS</mark><br>
        Asunto: Se solicita colaboración <br>
        Xalapa, Ver.,<mark style="background-color: #FEF2CD;"> a 16 de enero de 2024</mark>

    </p>
    <p class="encabezado2">
        <mark style="background-color: #FEF2CD;">Mtra. Silveria Morales Solano </mark><br>
        Fiscal Especializado para la Atención <br>
        de Denuncias por Personas Desaparecidas <br>
        Presente.

    </p>
    <p class="texto">Por medio del presente, con fundamento en los artículos 3 y 70 fracción I, II, XVI y 95 de la Ley General en Materia de Desaparición Forzada de Personas, Desaparición Cometida por Particulares y del Sistema Nacional de Búsqueda de Personas; 30, 33 fracción IX, XIV, XV, XIX, XXI, XLIX y LII de la Ley Número 677 en Materia de Desaparición de Personas para el Estado de Veracruz; apartado 1. Fracción 143, apartado 1.6 y 1.7 Búsqueda Inmediata, apartado 2. Búsqueda Individualizada, numerales 226, 227, 228, 229, 230, 231, 232, 233 y 234, contemplados en el Protocolo Homologado para la Búsqueda de Personas Desaparecidas y No Localizadas aprobado en el Acuerdo SNBP/002/2020 publicado en el Diario Oficial de la Federación en fecha 06 de octubre del 2020; así como en el numeral 3 fracción IV inciso g), 42 Bis del Reglamento Interior de la Secretaría de Gobierno del Estado de Veracruz de Ignacio de la Llave y Transitorio Tercero del Decreto por el que se Reforman y Adicionan diversas disposiciones del Reglamento Interior de la Secretaría de Gobierno del Estado de Veracruz de Ignacio de la Llave, publicado en la Gaceta Oficial, Órgano del Gobierno del Estado de Veracruz en fecha 12 de marzo de 2020, y 9 fracción I inciso “A”, 15 fracciones IV, XIV, XXVI, XXVII, XXX y XXXIX, 17 en sus fracciones IV, IX, XVII, XXII se hace de su conocimiento que se encuentra radicado el expediente <b><mark style="background-color: #FEF2CD;">24/SB 0085U-24ZS</b></mark>, relacionado a la desaparición del adolescente <mark style="background-color: #FEF2CD;">Ismael Hernández Fiallo</mark>, desaparecido en el municipio de <mark style="background-color: #FEF2CD;">Coatzacoalcos, Veracruz</mark>, en fecha <mark style="background-color: #FEF2CD;">15 de enero del 2024</mark>, reporte generado a través del número telefónico <mark style="background-color: #FEF2CD;">9833397960</mark>, el cual pertenece a la <mark style="background-color: #FEF2CD;">C. Egla Fiallo Nolasco</mark>, por lo cual esta Comisión solicita lo siguiente:
        <ul>
            <li>Se inicie la carpeta de investigación por la desaparición del adolescente <mark style="background-color: #FEF2CD;">Ismael Hernández Fiallo</mark>, esto de conformidad con la jurisdicción correspondiente, se lleven a cabo todos los actos de investigación tendientes a la búsqueda y localización de la persona reportada como desaparecida. <br></li>
        </ul>
        Atendiendo lo anterior esta Comisión remite lo siguiente: <br>
    </p>
        <p class="texto2">
                    <ul>
                    <li><mark style="background-color: #FEF2CD;">Informe de inicio de la persona reportada como desaparecida</mark></li>
                    <li><mark style="background-color: #FEF2CD;">Ficha de datos generales de la persona reportada como desaparecida</mark></li>
                    <li><mark style="background-color: #FEF2CD;">Boletín de media filiación de la persona reportada como desaparecida</mark></li>
                    </ul>
         </p> <br>
    <p class="texto3">No omito mencionar que, dicha información deberá tratarse confidencialmente de acuerdo a lo dispuesto por los artículos 6o., apartado A y 16, segundo párrafo, de la Constitución Política de los Estados Unidos Mexicanos, 72 de la Ley Número 875 de Transparencia y Acceso a la Información Pública para el Estado de Veracruz de Ignacio de la Llave, 14 fracción III y 16 fracción IX de la Ley Número 316 de Protección de Datos Personales en Posesión de Sujetos Obligados para el Estado de Veracruz de Ignacio de la Llave; 92 de la Ley Número 677 en Materia de Desaparición de Personas para el Estado de Veracruz, y lo dispuesto por el artículo 348 segundo párrafo del Código Penal para el Estado de Veracruz. <br>
        
        <br>Sin otro particular, aprovecho la ocasión para hacerle presente mi más distinguida consideración <br>
        
        <br>
        <b>Atentamente <br>
        <br>
        <br>
        <br>
        <mark style="background-color: #FEF2CD;">Dr. Evaristo Mendoza Amaro <br></mark></b>
        Jefe de Oficina de Búsqueda Inmediata <br> 
        <br>
        <br>
        <br>
        <br>
        <br>
        <mark style="background-color: #FEF2CD;">FIFC/EMA/WVP/pdsr </mark>

    </p>


<body>
</body>
</html>