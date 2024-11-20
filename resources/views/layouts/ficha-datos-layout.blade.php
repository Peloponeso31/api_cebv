<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ficha de datos</title>
    <style>
        @page {
            size: letter;
            margin: 2cm 3cm 1cm 3cm;
        }

        @font-face {
            font-family: "Verdana";
            src: url("{{ public_path('storage/fonts/verdana.ttf') }}") format('truetype');
        }

        html {
            font-family: Verdana;
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

        /* Estas líneas de código son el resultado de una búsqueda por internet de 40 días y 40 noches */
        /*NO FRIEGUES ME SIENTO COMO INDIANA JONES ENCONTRANDO LA CALAVERA DE CRISTAL Y AL LADO
         EL ESQUELETO DE UN ANTIGUO EXPLORADOR   -Mizar*/
        .header, .footer {
            position: fixed;
            height: 3cm;
            width: 15.5cm;
        }

        .header {
            top: 0;
        }

        .footer {
            bottom: 0;
        }

        .watermark {
            position: fixed;
            /*
            ** Estos valores son para eliminar el margin declarado en @page
            ** pues se espera que este al borde inferior derecha
            */
            bottom: -1cm;
            right: -3cm;
            z-index: -2;
        }

        .etiqueta {
            font-weight: bold;
        }
        .etiqueta_mas_peque {
            font-weight: bold;
            font-size: 13px;

        }
        .dato {
            text-align: center;
            font-size: 12px;
        }

        table, th, td {
            border: 1px solid;
            border-collapse: collapse;
            width: 100%;
        }

        h1 {
            font-family: Verdana;
            font-weight: normal;
        }
    </style>
</head>

<body>
<!--Header-->
<div class="header">
    <img style="width: 100%" src="{{ public_path('reportes/informe_de_inicio/header.png') }}"
         alt="header-image">
</div>

<!--Footer-->
<div class="footer">
    <p style="position: absolute">
        Enríquez s/n, Zona Centro <br>
        C.P. 91000, Xalapa, Veracruz, México <br>
        Tel. 01 (228) 841 7400 Ext. 3531 <br>
        <b>www.segobver.gob.mx</b>
    </p>
    <img style="position: absolute; width: 100%" src="{{ public_path('reportes/informe_de_inicio/footer_1.png') }}"
         alt="banda-footer">

    <img style="width: 1.6in; position: absolute; right: .8in; top: .2in"
         src="{{ public_path('reportes/informe_de_inicio/footer_2.png') }}"
         alt="leyenda-veracruz">
</div>

<!--Watermark-->
<div class="watermark">
    <img style="width: 2in" src="{{ public_path('reportes/informe_de_inicio/footer_3.png') }}"
         alt="leyenda-200-años">
</div>

<!--Content-->
<p> Lugar: Xalapa, Ver..</p>
<p> Fecha y hora: @yield('fecha-actual'). </p>

<h2 class="texto-centrado"> Datos del reportante </h2>

<table>
    <tr>
        <td class="etiqueta"> Nombre completo: </td>
        <td colspan="3" class="dato"> @yield('nombre-completo-reportante') </td>
    </tr>

    <tr>
        <td class="etiqueta"> Edad y fecha de nacimiento: </td>
        <td class="dato"> @yield('edad-reportante') @yield('fecha-nacimiento-reportante')</td>
        <td class="etiqueta"> Sexo y género: </td>
        <td class="dato"> @yield('sexo-reportante') </td>
    </tr>

    <tr>
        <td class="etiqueta"> CURP: </td>
        <td class="dato"> @yield('curp-reportante') </td>
        <td class="etiqueta"> INE: </td>
        <td class="dato"> {{ "NO-ESTA-O-NO-LO-ENCUENTRO" }} </td>
    </tr>

    <tr>
        <td class="etiqueta"> Estado civil: </td>
        <td colspan="3" class="dato"> {{ "Soltero" }} </td>
    </tr>

    <tr>
        <td class="etiqueta"> Religión: </td>
        <td class="dato"> @yield('religion-reportante') </td>
        <td class="etiqueta"> Lengua: </td>
        <td class="dato"> @yield('lengua-reportante') </td>
    </tr>

    <tr>
        <td class="etiqueta"> Escolaridad: </td>
        <td class="dato"> @yield('escolaridad-reportante') </td>
        <td class="etiqueta"> Ocupación: </td>
        <td class="dato"> @yield('reportante-ocupacion') </td>
    </tr>

    <tr>
        <td class="etiqueta"> Domicilio: </td>
        <td colspan="3" class="dato"> {{ "IUCT910921HVZZRN08" }} </td>
    </tr>

    <tr>
        <td class="etiqueta"> Telefonos: </td>
        <td colspan="3" class="dato"> @yield("telefonos-reportante") </td>
    </tr>

    <tr>
        <td class="etiqueta"> Correos electronicos: </td>
        <td colspan="3" class="dato"> @yield("correos-reportante") </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> Número de dependientes económicos: </td>
        <td colspan="2" class="dato"> @yield("desaparecido-dependientes-economicos") </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> Relacion con la persona desaparecida o no encontrada: </td>
        <td colspan="2" class="dato">@yield("parentesco-reportante-desaparecido")  </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> ¿Pertenece a alguna minoría? </td>
        <td colspan="2" class="dato">@yield("grupo-vulnerable-reportante")  </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> ¿Pertenece o ha pertenecido a algún colectivo?¿Cuál? </td>
        <td colspan="2" class="dato">@yield("colectivo-reportante")  </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> ¿Ha realizado busquedas con anterioridad?¿En dónde? </td>
        <td colspan="2" class="dato"> @yield("participacion-busquedas-previas-reportante") </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> A partir de la desaparición o privación de la libertad de su familiar¿Ha sido víctima de extorsión o fraude?</td>
        <td colspan="2" class="dato"> @yield("info-victima-extorsion-reportante") </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> A partir de la desaparición o privación de la libertad de su familiar¿Ha recibido amenazas?,¿Sabe de donde provienen?</td>
        <td colspan="2" class="dato"> @yield("info-victima-amenaza-reportante") </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> Tipo de reporte</td>
        <td colspan="2" class="dato"> @yield("tipo-reporte") </td>
    </tr>
</table>
<h2 class="texto-centrado"> Datos de la persona desaparecida o no localizada </h2>

<table>
    <tr>
        <td class="etiqueta"> Nombre completo: </td>
        <td colspan="3" class="dato"> @yield('nombre-completo-desaparecido') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> Sobrenombre o apodo: </td>
        <td  colspan="2" class="dato"> @yield('apodo-desaparecido') </td>
    </tr>

    <tr>
        <td class="etiqueta"> Sexo: <br/> Género: </td>
        <td class="dato"> @yield('desaparecido-sexo') @yield('desaparecido-genero')</td>
        <td class="etiqueta"> Nacionalidad: <br/> Estatus migratorio: </td>
        <td class="dato"> @yield('desaparecido-nacionalidad') @yield('desaparecido-situacion-migratoria') </td>
    </tr>

    <tr>
        <td class="etiqueta"> Edad y fecha de nacimiento: </td>
        <td class="dato"> @yield('edad-desaparecido')<br/>@yield('fecha-nacimiento-desaparecido')</td>
        <td class="etiqueta"> Lugar de nacimiento: </td>
        <td class="dato"> @yield('desaparecido-lugarNacimiento') </td>
    </tr>
    <tr>
        <td class="etiqueta"> Tipo de Sangre: </td>
        <td class="dato"> @yield('tipo-sangre-desaparecido')</td>
        <td class="etiqueta"> CURP: </td>
        <td class="dato"> @yield('desaparecido-CURP') </td>
    </tr>

    <tr>
        <td class="etiqueta"> INE: </td>
        <td class="dato"> @yield('ine-desaparecido')</td>
        <td class="etiqueta"> Religión: </td>
        <td class="dato"> @yield('desaparecido-religion') </td>
    </tr>
    <tr>
        <td  class="etiqueta"> Lengua: </td>
        <td  colspan="3" class="dato"> @yield('desaparecido-lengua') </td>
    </tr>

    <tr>
        <td  class="etiqueta"> Ocupación: </td>
        <td  colspan="3" class="dato"> @yield('desaparecido-ocupacion') </td>
    </tr>
    <tr>
        <td  class="etiqueta"> Escolaridad: </td>
        <td  colspan="3" class="dato"> @yield('desaparecido-escolaridad') </td>
    </tr>
    <tr>
        <td  class="etiqueta"> Discapacidad: </td>
        <td  colspan="3" class="dato"> @yield('desaparecido-discapacidad') </td>
    </tr>
    <tr>
        <td  class="etiqueta"> Telefonos celular: </td>
        <td  colspan="3" class="dato"> @yield('telefonos-desaparecidos') </td>
    </tr>
    <tr>
        <td  class="etiqueta"> Dirección de residencia: </td>
        <td  colspan="3" class="dato"> @yield('desaparecido-direccion-residencia') </td>
    </tr>

    <tr>
        <td  class="etiqueta"> ¿Tiene conocimiento de que consuma tabaco, alcohol o alguna otra sustancia? </td>
        <td  colspan="3" class="dato"> @yield('desaparecido-consumo-sustencias') </td>
    </tr>

    <tr>
        <td colspan="2" class="etiqueta"> ¿Pertenece a algún pueblo vulnerable? </td>
        <td colspan="2" class="dato">@yield("grupo-vulnerable-desaparecido")  </td>
    </tr>

    <tr>
        <td  class="etiqueta"> Ficha de búsqueda o boletín: </td>
        <td  colspan="3" class="dato"> @yield('desaparecido-ficha-o-boletin') </td>
    </tr>
    <tr>
        <td  class="etiqueta"> Institución: </td>
        <td  colspan="3" class="dato"> @yield('desaparecido-institucion-ficha-o-boletin') </td>
    </tr>
</table>
<h3 class="texto-centrado"> INFORMACIÓN SOBRE LA DESAPARICIÓN </h3>
<table>
    <tr>
        <td  class="etiqueta"> Lugar de desaparición: </td>
        <td  colspan="3" class="dato"> @yield('lugar-desaparicion') </td>
    </tr>
    <tr>
        <td  class="etiqueta"> Fecha de desaparición: </td>
        <td  colspan="3" class="dato"> @yield('fecha-desaparicion') </td>
    </tr>
    <tr>
        <td  class="etiqueta"> Hora aproximada de la desapación o última hora de contacto: </td>
        <td  colspan="3" class="dato"> @yield('hora-desaparicion') </td>
    </tr>
    <tr>
        <td  class="etiqueta"> Datos de personas que puedan brindar información y/o probablemente involucradas: </td>
        <td  colspan="3" class="dato"> @yield('desaparecido-direccion-residencia') </td>
    </tr>
    <tr>
        <td  class="etiqueta"> Narrativa de los hechos que se reportan: </td>
        <td  colspan="3" class="dato"> @yield('narrativa-hechos') </td>
    </tr>

    <tr>
        <td colspan="2" class="etiqueta"> Si la persona fue desaparecida junto a otras personas en el mismo suceso.<br>¿Cuántas más fueron desaparecidas con ella?</td>
        <td  colspan="2" class="dato"> @yield('mas-personas-desaparecidas') </td>
    </tr>
    <tr>
        <td colspan="3" class="etiqueta"> Desaparición forzada </td>
        <td  colspan="1" class="dato"> @yield('desaparicion-forzada') </td>
    </tr>
    <tr>
        <td colspan="3" class="etiqueta"> Desaparición por particulares:</td>
        <td  colspan="1" class="dato"> @yield('desaparicion-particular') </td>
    </tr>
    <tr>
        <td colspan="3" class="etiqueta"> Métodos de captura:</td>
        <td  colspan="1" class="dato"> @yield('metodo-captura') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> Medios de captura </td>
        <td  colspan="2" class="dato"> @yield('medios-captura') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> ¿La desaparición se realizó a bordo de algún vehículo? <br>Tipo de vehículo<br>°Número de vehículo<br>°Número de placas<br>°Insignias del vehículo<br>°Características del vehículo </td>
        <td  colspan="2" class="dato"> @yield('vehiculos-involucrados') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> ¿Hay testigos de los hechos? </td>
        <td  colspan="2" class="dato"> @yield('hay-testigos') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> ¿Existió detención legal previa o extorsión? </td>
        <td  colspan="2" class="dato"> @yield('detencion-previa-extorsion') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> Después de la desaparición o privación de la libertad de la persona.¿Ha sido avistado en alguna parte? </td>
        <td  colspan="2" class="dato"> @yield('desaparecido-avistamiento') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> Datos sobre el presunto perpretador </td>
        <td  colspan="2" class="dato"> @yield('perpetradores') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> Descripción del grupo perpetrador</td>
        <td  colspan="2" class="dato"> @yield('descripcion-grupo-perpetradores') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> Número de carpeta de Investigación,Investigación Ministerial y Fiscal a cargo: </td>
        <td  colspan="2" class="dato"> @yield('documentos-legales') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta"> ¿Se suscitaron otros delitos antes o después de la desaparición?¿Cuáles?</td>
        <td  colspan="2" class="dato"> @yield('otros-delitos') </td>
    </tr>
</table>

<h3 class="texto-centrado"> CONTEXTO FAMILIAR</h3>
<table>
    <tr>
        <td class="etiqueta"> Estado civil: </td>
        <td class="dato"> @yield('desaparecido-estado-civil')</td>
        <td class="etiqueta"> ¿Con qué personas vive? </td>
        <td class="dato"> @yield('desaparecido-numero-personas-vive') </td>
    </tr>
    <tr>
        <td class="etiqueta"> Datos de última pareja sentimental conocida: </td>
        <td class="dato"> @yield('desaparecido-conyugue')</td>
        <td class="etiqueta"> Hijas(os): </td>
        <td class="dato"> @yield('desaparecido-hijos') </td>
    </tr>
    <tr>
        <td class="etiqueta"> ¿Quién es el integrante de se familia más cercano? </td>
        <td class="dato"> @yield('desaparecido-familiares-cercanos')</td>
        <td class="etiqueta"> ¿Conoce si ha sufrido algún tipo de violencia por parte de algún integrante de la familia? </td>
        <td class="dato"> @yield('desaparecido-familiares-violencia') </td>
    </tr>
</table>

<h3 class="texto-centrado"> CONTEXTO ECONOMICO-LABORAL </h3>
<table>
    <tr>
        <td class="etiqueta"> ¿Dónde trabaja o cuál es su medio de subsistencia? </td>
        <td class="dato"> @yield('desaparecido-donde-trabaja')</td>
        <td class="etiqueta"> ¿Sabe si le gusta su trabajo? </td>
        <td class="dato"> @yield('desaparecido-gusta-trabajo') </td>
    </tr>
    <tr>
        <td class="etiqueta"> ¿Ha manifestado la intención de irse a trabajar fuera de la ciudad? </td>
        <td class="dato"> @yield('desaparecido-trabajo-foraneo')</td>
        <td class="etiqueta"> ¿Conoce si ha sufrido algún tipo de violencia por parte de algún integrante de su trabajo? </td>
        <td class="dato"> @yield('desaparecido-violencia-trabajo') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">¿Conoce si tiene deudas?</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-deudas') </td>
    </tr>
</table>

<h3 class="texto-centrado"> CONTEXTO SOCIAL </h3>
<table>
    <tr>
        <td class="etiqueta"> ¿Qué pasatiempos tiene? </td>
        <td class="dato"> @yield('desaparecido-pasatiempos')</td>
        <td class="etiqueta"> ¿Pertenece a algún club u organización? </td>
        <td class="dato"> @yield('desaparecido-clubes') </td>
    </tr>
    <tr>
        <td class="etiqueta">¿Estudia?</td>
        <td class="dato"> @yield('desaparecido-estudios')</td>
        <td class="etiqueta"> ¿Puede mencionar sus amistades más cercanas? </td>
        <td class="dato"> @yield('desaparecido-amistades') </td>
    </tr>
    <tr>
        <td class="etiqueta"> ¿Ha manifestado tener amistades en otro municipio o estado? </td>
        <td class="dato"> @yield('desaparecido-amigos-otro-municipio')</td>
        <td class="etiqueta"> Correo electrónico,nombre de cómo aparece en Redes sociales </td>
        <td class="dato"> @yield('desaparecido-amistades-red-social') </td>
    </tr>
</table>

<h4 class="texto-centrado"> CARACTERÍSTICAS DE MEDIA FILIACIÓN DE LA PERSONA DESAPARECIDA O NO LOCALIZADA </h4>
<table>
    <tr>
        <td colspan="2" class="etiqueta">Vestimenta que porta:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-vestimenta') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Señas particulares:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-senas') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Especificación de Tatuajes:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-tatuajes') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Estatura aproximada:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-estatura') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Complexión:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-complexion') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Peso (KG):</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-peso') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Color de piel:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-color-piel') </td>
    </tr>
    <tr>
        <td class="etiqueta">Tamaño de cabello:</td>
        <td   class="dato"> @yield('desaparecido-tamano-cabello') </td>
        <td class="etiqueta">Tipo de cabello:</td>
        <td   class="dato"> @yield('desaparecido-tipo-cabello') </td>
    </tr>
    <tr>
        <td class="etiqueta">Color de cabello:</td>
        <td   class="dato"> @yield('desaparecido-color-cabello') </td>
        <td class="etiqueta">Modificaciones en el cabello:</td>
        <td   class="dato"> @yield('desaparecido-modificaciones-cabello') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Calvicie/alopecia:</td>
        <td colspan="2"  class="dato"> @yield('desaparecido-calvicie') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Cejas:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-cejas') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Modificaciones en las cejas:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-modificaciones-cejas') </td>
    </tr>
    <tr>
        <td  class="etiqueta">Color de ojos:</td>
        <td   class="dato"> @yield('desaparecido-color-ojos') </td>
        <td  class="etiqueta">Forma de los ojos:</td>
        <td   class="dato"> @yield('desaparecido-forma-ojos') </td>
    </tr>
    <tr>
    <tr>
        <td colspan="2" class="etiqueta">Tamaño de los ojos:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-tamano-ojos') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Particularidades en ojos:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-ojos-especificaciones') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Pestañas largas:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-pestanas-largas') </td>

    <tr>
        <td colspan="2" class="etiqueta">Patologías:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-patologias-ojos') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Tipo de nariz:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-tipo-nariz') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Particularidades en la nariz:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-especificaciones-nariz') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Traumatismo por desviación:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-desviacion-nariz') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Tamaño de boca:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-tamano-boca') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Tamaño de labios:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-tamano-labios') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Modificaciones en labios:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-modificaciones-labios') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Cirugías/Patologías en labios:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-patologias-labios') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">¿Ausencia de algún diente?</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-faltan-dientes') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Tratamiendo dental:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-tratamiento-dental') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Región del bello facial:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-region-vellofacial') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Color del bello facial:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-color-vellofacial') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Volumen del bello facial:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-volumen-vellofacial') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Corte o estilo del bello facial:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-corte-vellofacial') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Modificaciones del bello facial:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-modificaciones-vellofacial') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Proyección del mentón:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-tipo-menton') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Modificaciones/Observaciones del mentón:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-especificacion-menton') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Cirugías/Patologías del mentón:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-patologia-menton') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Pabellón auricular</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-orejas') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Modificaciones/Observaciones del pabellón auricular:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-especificaciones-orejas') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Cirugías/Patologías del pabellón auricular:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-patologia-orejas') </td>
    </tr>
</table>
<h2 class="texto-centrado"> Intervenciones Quirúrgicas </h2>

<table>
    <tr>
        <td colspan="1" class="etiqueta">Tipo de intervención quirúrgica:</td>
        <td  colspan="3" class="dato"> @yield('desaparecido-intervenciones-quirurgicas') </td>
    </tr>
    <tr>
        <td colspan="3" class="etiqueta">Heridas recientes:</td>
        <td  colspan="1" class="dato"> @yield('desaparecido-heridas-recientes') </td>
    </tr>
    <tr>
        <td colspan="2" class="etiqueta">Fracturas recientes:</td>
        <td  colspan="2" class="dato"> @yield('desaparecido-fracturas-recientes') </td>
    </tr>

</table>
<h2 class="texto-centrado"> Observaciones generales </h2>
<table>
    <tr>
        <td colspan="2" class="etiqueta">Observaciones:</td>

        <td colspan="2" class="dato">@yield('desaparecido-observaciones-generales')</td>
    </tr>
</table>
<h6 class="texto-centrado"><br><br><br>__________________________________________________________________________________________<br>Nombre y firma de la persona de la Comisión Estatal de Búsqueda que realizó la entrevista.  </h6>

</body>
</html>
