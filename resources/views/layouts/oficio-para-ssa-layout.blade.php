@extends('layouts.page-layout')
@section('content')
<div style="text-align: right">
    Oficio: SEGOB/CEB/<mark>@yield('numero-oficio')</mark>/@yield('year')<br>
    Asunto: solicitud de colaboración en acciones de búsqueda <br>
    Expediente de Búsqueda: <mark>@yield('folio')</mark><br>
    Xalapa-Enríquez, Veracruz, a <mark>@yield('fecha')</mark> <br>
</div>
<div style="text-align: left">
    <br><mark>@yield('nombre-serv-public-env')</mark> <br>
    Secretaria de Salud y Dirección General de Servicios <br>
    de Salud del Estado de Veracruz. <br>
    Presente.<br>

</div>
<p>
    Por medio del presente, con fundamento en los artículos 1, 2 <mark>@yield('edad')</mark> fracciones I y IV, 29, fracciones I, IX,
    XI, XIV, XXIII, LII, 34 fracciones I, 46 fracción I, 46, fracción III y demás relativos y aplicables de la Ley Número
    677 en Materia de Desaparición de Personas, para el Estado de Veracruz de Ignacio de la Llave, 3 fracción IV inciso g),
    42 Bis, <mark>@yield('firma-ausencia')</mark> del Reglamento Interior de la Secretaría de Gobierno del Estado de Veracruz de Ignacio de la Llave y Transitorio
    Tercero del Decreto por el que se Reforman y Adicionan diversas disposiciones del Reglamento Interior de la Secretaría
    de Gobierno del Estado de Veracruz de Ignacio de la Llave, publicado en la Gaceta Oficial, Órgano del Gobierno del Estado
    de Veracruz en fecha 12 de marzo de 2020; <mark>@yield('sexo')</mark> hago de su conocimiento que en esta Comisión Estatal de Búsqueda <mark>@yield('carpeta')</mark>
    se inició el expediente <mark>@yield('folio')</mark>, iniciado con motivo de la desaparición del C. <mark>@yield('nombre-completo')</mark>, hechos que
    sucedieron en fecha <mark>@yield('fecha-desaparicion')</mark>, en el municipio de <mark>@yield('lugar-desaparicion')</mark>.
</p>
<p>
    Al respecto, solicito a usted de la manera más atenta y respetuosa, su invaluable apoyo a fin de girar sus apreciables
    instrucciones a quien corresponda a efecto de que se realicen las siguientes acciones:
</p>
<p>
    ÚNICO. – Se realice una búsqueda en las bases de datos de la Secretaría a su digno cargo, incluyendo Centros de
    rehabilitación, Clínicas, Hospitales, Centros de Salud y Albergues, para conocer si se cuenta con registro alguno a
    nombre del C.<mark>@yield('nombre-completo')</mark>, quien se encuentra como desaparecido desde fecha
    <mark>@yield('fecha-desaparicion')</mark>, <mark>@yield('medio-difusion')</mark> elaborado por esta Comisión de Búsqueda.
</p>
<p>
    No omito mencionar que, dicha información deberá tratarse confidencialmente de acuerdo a lo dispuesto por los artículos
    6º apartado A y 16, segundo párrafo, de la Constitución Política de los Estados Unidos Mexicanos, 68 fracción <mark>@yield('carpeta1')</mark>72
    la Ley Número 875 de Transparencia y Acceso a la Información Pública para el Estado de Veracruz de Ignacio de la Llave,
    14 fracción III y 16 fracción IX de la Ley Número 316 de Protección de Datos Personales en Posesión de Sujetos Obligados
    para el Estado de Veracruz de Ignacio de la Llave; así como el 92 de la Ley Número 677 en Materia de Desaparición de
    Personas para el Estado de Veracruz, y lo dispuesto por el artículo 348 segundo párrafo del Código Penal para el Estado
    de Veracruz.
</p>
<div>
    Aunado a lo anterior, no deben pasar desapercibidas las obligaciones generales en materia de derechos humanos respecto al
    cumplimiento de estos por parte de todas las autoridades, y que se encuentran establecidas en el artículo 1° de la
    Constitución Política de los Estados Unidos Mexicanos, como lo son la promoción, respeto, protección y garantía de
    los derechos humanos, incluidas las acciones en favor de las víctimas directas e indirectas de desaparición forzada
    de personas y la cometida por particulares. <br><br>
    Mucho agradeceré que, al dar respuesta a esta solicitud haga mención del número de expediente de búsqueda, así como
    del número de oficio señalado al rubro.
    Sin otro particular, me permito enviarle un atento y cordial saludo. <br><br><br>
    Atentamente <br><br><br>
    <mark>@yield('nombre-servidor-publico')</mark> <br>
    Jefa del Departamento Especializado de Búsqueda <br><br><br><br><br>
    <p style="font-size: 11px;">C.c.p. Archivo <br>
        <mark>FIFC/@yield('iniciales')</mark></p>
</div>

@endsection
