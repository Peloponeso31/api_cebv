@extends('layouts.page-layout')

@section('content')
<div style="text-align: right">
    Comisión Estatal de Búsqueda <br>
    Oficio No. SEGOB /CEB/<mark>@yield('numero-oficio')</mark>/@yield('year')<br>
    Expediente No. <mark>@yield('folio')</mark><br>
    Asunto: Se solicita colaboración<br>
    Xalapa, Ver., a <mark>@yield('fecha')</mark><br>
</div>
<div style="text-align: left">
    <mark>@yield('nombre-serv-pub-env')</mark><br>
    Fiscal Especializado para la Atención<br>
    de Denuncias por Personas Desaparecidas<br>
    Presente: <br>
</div>
<p>
    Por medio del presente, con fundamento en los artículos 3 y 70 fracción I, II, XVI y 95 de la Ley General en
    Materia de Desaparición Forzada de Personas, Desaparición Cometida por Particulares y del Sistema Nacional de
    Búsqueda de Personas; 30, 33 fracción IX, XIV, XV, XIX, XXI, XLIX y LII de la Ley Número 677 en Materia de
    Desaparición de Personas para el Estado de Veracruz; apartado 1. Fracción 143, apartado 1.6 y 1.7 Búsqueda
    Inmediata, apartado 2. Búsqueda Individualizada, numerales 226, 227, 228, 229, 230, 231, 232, 233 y 234,
    contemplados en el Protocolo Homologado para la Búsqueda de Personas Desaparecidas y No Localizadas aprobado
    en el Acuerdo SNBP/002/2020 publicado en el Diario Oficial de la Federación en fecha 06 de octubre del 2020;
    así como en el numeral 3 fracción IV inciso g), 42 Bis del Reglamento Interior de la Secretaría de Gobierno del
    Estado de Veracruz de Ignacio de la Llave y Transitorio Tercero del Decreto por el que se Reforman y Adicionan
    diversas disposiciones del Reglamento Interior de la Secretaría de Gobierno del Estado de Veracruz de Ignacio de
    la Llave, publicado en la Gaceta Oficial, Órgano del Gobierno del Estado de Veracruz en fecha 12 de marzo de 2020,
    y 9 fracción I inciso “A”, 15 fracciones IV, XIV, XXVI, XXVII, XXX y XXXIX, 17 en sus fracciones IV, IX, XVII, XXII
    se hace de su conocimiento que se encuentra radicado el expediente <mark>@yield('folio')</mark>, relacionado a la
    desaparición del adolescente <mark>@yield('nombre-completo')</mark>, desaparecido en el municipio de <mark>@yield('lugar-desaparcion')</mark>
    , en fecha <mark>@yield('fecha-desaparicion')</mark>, reporte generado a través del número telefónico <mark>@yield('telefono-reportante')</mark>,
    el cual pertenece a la C.<mark>@yield('nombre-reportante')</mark>, por lo cual esta Comisión solicita lo siguiente:
</p>

<ul style="list-style-type: disc">
   <li style="text-align: justify">Se inicie la carpeta de investigación por la desaparición del adolescente <mark>@yield('nombre-completo')</mark>, esto de conformidad
    con la jurisdicción correspondiente, se lleven a cabo todos los actos de investigación tendientes a la búsqueda y
    localización de la persona reportada como desaparecida.</li>
</ul>
<p>
    Atendiendo lo anterior esta Comisión remite lo siguiente:
</p>
<ul style="list-style-type: disc">
    <li style="text-align: justify"> <mark>@yield('caso-formato')</mark></li>
</ul>
<p>
    No omito mencionar que, dicha información deberá tratarse confidencialmente de acuerdo a lo dispuesto por los artículos
    6o., apartado A y 16, segundo párrafo, de la Constitución Política de los Estados Unidos Mexicanos, 72 de la Ley Número
    875 de Transparencia y Acceso a la Información Pública para el Estado de Veracruz de Ignacio de la Llave, 14 fracción
    III y 16 fracción IX de la Ley Número 316 de Protección de Datos Personales en Posesión de Sujetos Obligados para el
    Estado de Veracruz de Ignacio de la Llave; 92 de la Ley Número 677 en Materia de Desaparición de Personas para el Estado
    de Veracruz, y lo dispuesto por el artículo 348 segundo párrafo del Código Penal para el Estado de Veracruz.  <br><br>
    Sin otro particular, aprovecho la ocasión para hacerle presente mi más distinguida consideración. <br><br>
    A t e n t a m e n t e <br><br>
    <mark>@yield('nombre-serv-pub')</mark> <br>
    Jefe de Oficina de Búsqueda Inmediata<br><br><br><br><br><br>
</p>
<p style="font-size: 11px;">
    <mark>FIFC/@yield('iniciales')</mark></p>
@endsection
