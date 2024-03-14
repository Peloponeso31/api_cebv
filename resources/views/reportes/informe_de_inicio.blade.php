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
    #header { position: fixed; left: 0px; top: -100px; right: 0px; height: 100px; background-color: orange; text-align: center; }
    #footer { 
        position: fixed; 
        left: 0px; bottom: -100px; 
        right: 0px; height: 100px; 
        background-color: lightblue; 
        display: inline-block; 
    }
    #footer .page:after { content: counter(page, upper-roman); }
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

    <div id="content">
        <h1>INFORME DE INICIO</h1>
        <h1> 
            {{ $reporte->desaparecidos->first()->nombre }} 
            {{ $reporte->desaparecidos->first()->apellido_paterno }} 
            {{ $reporte->desaparecidos->first()->apellido_paterno }} - {{$reporte->folio}} 
        </h1>
    
        <p>
            En la Ciudad de Xalapa de Enríquez del Estado de Veracruz, siendo las {{ $reporte->created_at->format("h:i") }} horas del día 
            {{ $reporte->fecha_creacion_legible() }}, 
            el suscrito <!--Licenciada---> {{Auth::user()->name}}, Analista Administrativo adscrito a la Comisión Estatal de Búsqueda, 
            con fundamento en lo dispuesto por los artículos 1, 6, 29 fracción IV, 30, 33 fracciones I, XXIII, LII y LIV, 62, 63 y demás 
            relativos y aplicables de la Ley Número 677 en Materia de Desaparición de Personas para el Estado de Veracruz; así como en lo 
            dispuesto por los diversos 80 y 85 de la Ley General en Materia de Desaparición Forzada de Personas, Desaparición Cometida por 
            Particulares y del Sistema Nacional de Búsqueda de Personas, así como el numeral 143 Búsqueda Inmediata, apartado 1.5 Detonación 
            y coordinación de la Búsqueda Inmediata numeral 165, apartado 1.6 Rastreo remoto y 1.7 Despliegue Operativo contemplados en el 
            Protocolo Homologado para la Búsqueda de Personas Desaparecidas y No Localizadas aprobado en el Acuerdo SNBP/002/2020 publicado 
            en el Diario Oficial de la Federación en fecha 06 de octubre del 2020:
        </p>
    
        <p>
            Se recibe llamada telefónica del número telefónico <!--22 81 25 92 88 TODO: Numero telefonico pendiente -->, perteneciente 
            {{ $reporte->reportante->first()->genero == "MASCULINO" ? "al" : "a la" }} C. 
            {{ $reporte->reportante->first()->nombre }} 
            {{ $reporte->reportante->first()->apellido_paterno }} 
            {{ $reporte->reportante->first()->apellido_materno }}, quien solicita 
            del apoyo de esta Comisión, para la búsqueda y localización 
            {{ $reporte->desaparecidos->first()->genero == "MASCULINO" ? "del" : "de la"}} C. 
            {{ $reporte->desaparecidos->first()->nombre }} 
            {{ $reporte->desaparecidos->first()->apellido_paterno }} 
            {{ $reporte->desaparecidos->first()->apellido_paterno }}, 
            {{ $reporte->reportante->first()->genero == "MASCULINO" ? "el" : "la"}} 
            reportante cuenta con {{ $reporte->reportante->first()->edad_anos() }} años de edad por haber nacido el 
            {{ $reporte->reportante->first()->fecha_nacimiento_legible() }}, 
            con domicilio ubicado el Retorno Vicente Suarez S/N. Lote 2. Xalapa, Ver., 
            casa color crema entrando por la Iglesia de los Testigo de Jehová., identificándose como padre de la víctima directa, manifestando 
            que la información que aporte para el RNPDNO, sea utilizada exclusivamente para la búsqueda e identificación de la Persona Desaparecida 
            o No localizada, solicitando boletín de uso público, indicó lo siguiente durante su entrevista: 
        </p>

        <p>
            {{$reporte->hechoDesaparicion->hechos_desaparicion}}
        </p>

        <p>
            Se lleva a cabo una búsqueda remota en la base de datos del Registro Nacional de Detenciones (RND), consultada en 
            consultasdetenciones.sspc.gob.mx obteniendo resultado NEGATIVO, respecto a la búsqueda 
            {{ $reporte->desaparecidos->first()->genero == "MASCULINO" ? "del" : "de la"}} C.
            {{ $reporte->desaparecidos->first()->nombre }} 
            {{ $reporte->desaparecidos->first()->apellido_paterno }} 
            {{ $reporte->desaparecidos->first()->apellido_paterno }}
            
        </p>
        <h2> Despliegue Operativo </h2>

        <p>
            El mismo día que inició la presente, se alertó a la Secretaría de Seguridad Pública (SSP), sobre la No localización 
            {{ $reporte->desaparecidos->first()->genero == "MASCULINO" ? "del" : "de la"}} C.
            {{ $reporte->desaparecidos->first()->nombre }} 
            {{ $reporte->desaparecidos->first()->apellido_paterno }} 
            {{ $reporte->desaparecidos->first()->apellido_paterno }}, 
            a través del grupo habilitado para la comunicación con el Centro Estatal de Control, Comando, Comunicaciones y 
            Cómputo (C4), solicitando el despliegue de elementos policiales próximos al lugar de No Localización.
        </p>

        <p>
            Se turna al área jurídica para las acciones inmediatas con apego a los Principios Rectores para la Búsqueda de 
            Personas Desaparecidas, las autoridades integrantes de mecanismo, dándose por terminada la presente, siendo las 
            {{now()->format("h:i")}} horas del presente día, firmando al calce los que en ella intervinieron.
        </p>
    </div>
</body>
</html>