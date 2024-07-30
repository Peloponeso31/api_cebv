<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    @page {
        margin: 100px 50px;
    }

    #header {
        position: fixed;
        left: 0px;
        top: -100px;
        right: 0px;
        height: 100px;
        text-align: center;
    }

    #footer {
        position: fixed;
        left: 0px;
        bottom: -100px;
        right: 0px;
        height: 100px;
        display: inline-block;
    }

    #footer .page:after {
        content: counter(page, upper-roman);
    }

    p {
        text-align: justify;
    }

    h1 {
        text-align: center;
        font-size: 18px;
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

<div id="content">
    <h1>INFORME DE INICIO</h1>
    <h1>
        <mark style="background-color: #FEF2CD;">
            {{ $desaparecido->persona->nombre }}
            {{ $desaparecido->persona->apellido_paterno }}
            {{ $desaparecido->persona->apellido_materno }}
            - {{$folio->folio_cebv}}
        </mark>
    </h1>

    <p>
        En la Ciudad de Xalapa de Enríquez del Estado de Veracruz, siendo las
        <mark style="background-color: #FEF2CD;">18:51 horas del día 14 de enero del 2024,</mark>
        la suscrita
        <mark style="background-color: #FEF2CD;">Licenciada Arantza Yolanda Garrido Contreras<!--Licenciada---> ,
            Analista Administrativo
        </mark>
        adscrito a la Comisión Estatal de Búsqueda,
        con fundamento en lo dispuesto por los artículos 1, 6, 29 fracción IV, 30, 33 fracciones I, XXIII, LII y LIV,
        62, 63 y demás
        relativos y aplicables de la Ley Número 677 en Materia de Desaparición de Personas para el Estado de Veracruz;
        así como en lo
        dispuesto por los diversos 80 y 85 de la Ley General en Materia de Desaparición Forzada de Personas,
        Desaparición Cometida por
        Particulares y del Sistema Nacional de Búsqueda de Personas, así como el numeral 143 Búsqueda Inmediata,
        apartado 1.5 Detonación
        y coordinación de la Búsqueda Inmediata numeral 165, apartado 1.6 Rastreo remoto y 1.7 Despliegue Operativo
        contemplados en el
        Protocolo Homologado para la Búsqueda de Personas Desaparecidas y No Localizadas aprobado en el Acuerdo
        SNBP/002/2020 publicado
        en el Diario Oficial de la Federación en fecha 06 de octubre del 2020:
    </p>

    <p>
        Se recibe llamada telefónica del número telefónico
        <mark style="background-color: #FEF2CD;">{{ $reportante->persona->telefonos->first()->numero }}</mark>, perteneciente

        @if($reportante->persona->sexo->nombre == 'Mujer')
            a la
        @else
            al
        @endif

        <mark style="background-color: #FEF2CD;">C.
            {{ $reportante->persona->nombre }}
            {{ $reportante->persona->apellido_paterno }}
            {{ $reportante->persona->apellido_materno }}
        </mark>
        , quien solicita del apoyo de esta Comisión, para la búsqueda y localización
        <b>
            <mark style="background-color: #FEF2CD;">del(de la) C.
                {{ $desaparecido->persona->nombre }}
                {{ $desaparecido->persona->apellido_paterno }}
                {{ $desaparecido->persona->apellido_materno }}</mark>
        </b>,
        el(la)
        reportante cuenta con
        <mark style="background-color: #FEF2CD;">{{ $desaparecido->persona->edad_anos() }} años</mark>
        de edad por haber nacido el
        <mark style="background-color: #FEF2CD;">{{ $desaparecido->persona->fecha_nacimiento }},</mark>
        con domicilio ubicado el
        <mark style="background-color: #FEF2CD;">Retorno Vicente Suarez S/N. Lote 2. Xalapa, Ver.,
            casa color crema entrando por la Iglesia de los Testigo de Jehová.,
        </mark>
        identificándose como padre de la víctima directa, manifestando
        que la información que aporte para el RNPDNO, sea utilizada exclusivamente para la búsqueda e identificación de
        la Persona Desaparecida
        o No localizada, solicitando boletín de uso público, indicó lo siguiente durante su entrevista:
    </p>

    <p>
        <b>
            <mark style="background-color: #FEF2CD;">
                {{$reporte->hechosDesaparicion->hechos_desaparicion}}
            </mark>
        </b>
    </p>

    <p>
        Se lleva a cabo una búsqueda remota en la base de datos del Registro Nacional de Detenciones (RND), consultada
        en
        consultasdetenciones.sspc.gob.mx obteniendo resultado NEGATIVO, respecto a la búsqueda <b>
            <mark style="background-color: #FEF2CD;"> del(de la) C.
                {{ $desaparecido->persona->nombre }}
                {{ $desaparecido->persona->apellido_paterno }}
                {{ $desaparecido->persona->apellido_materno }}
            </mark>
        </b>

    </p>
    <h1><u>Despliegue Operativo</u></h1>

    <p>
        El mismo día que inició la presente, se alertó a la Secretaría de Seguridad Pública (SSP), sobre la No
        localización
        <b>
            <mark style="background-color: #FEF2CD;">del(de la) C.
                {{ $desaparecido->persona->nombre }}
                {{ $desaparecido->persona->apellido_paterno }}
                {{ $desaparecido->persona->apellido_materno }}
            </mark>
        </b>,
        a través del grupo habilitado para la comunicación con el Centro Estatal de Control, Comando, Comunicaciones y
        Cómputo (C4), solicitando el despliegue de elementos policiales próximos al lugar de No Localización.
    </p>

    <p>
        Se turna al área jurídica para las acciones inmediatas con apego a los Principios Rectores para la Búsqueda de
        Personas Desaparecidas, las autoridades integrantes de mecanismo, dándose por terminada la presente, siendo las
        <mark style="background-color: #FEF2CD;">19:02<!--Hora actual -->
            horas
        </mark>
        del presente día, firmando al calce los que en ella intervinieron.
    </p>

    <p>
        ______________________
        <br>

        {{ Auth::user()->empleado->persona->nombre }} {{ Auth::user()->empleado->persona->apellido_paterno }} {{ Auth::user()->empleado->persona->apellido_materno }}
        <br>
        {{ Auth::user()->empleado->puesto->nombre }}
    </p>

    <p>
        VO. BO.
        <br>
        ______________________
        <br>

        Dr. Evaristo Mendoza Amaro
        <br>
        Jefe de la oficina de busqueda inmediata.
    </p>
</div>
</body>
</html>
