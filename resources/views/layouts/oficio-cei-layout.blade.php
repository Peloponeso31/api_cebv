@extends('layouts.page-layout')

@section('tile', 'Oficio para C4')

@section('content')

    @yield('encabezado')

    <x-dirigido-cei class="subtitulo"/>

    <p>
        Por medio del presente, con fundamento en los artículos 1, @yield('es-menor') 30, 31, 33 fracciones I, III, IX,
        XI, XIV,XXIII, XLIX y LII, 34 fracción I, 62, 63 y demás relativos y aplicables de la Ley Número 677 en
        Materia de Desaparición de Personas para el Estado de Veracruz de Ignacio de la Llave, 3 fracción IV inciso g),
        42 Bis, @yield('firma-ausencia') del Reglamento Interior de la Secretaría de Gobierno del Estado de Veracruz de
        Ignacio de la Llave y Transitorio Tercero del Decreto por el que se Reforman y Adicionan diversas disposiciones
        del Reglamento Interior de la Secretaría de Gobierno del Estado de Veracruz de Ignacio de la Llave, publicado en
        la Gaceta Oficial, Órgano del Gobierno del Estado de Veracruz en fecha 12 de marzo de 2020;
        @yield('fundamento-ninias-mujeres-72h') hago de su conocimiento que en esta Comisión Estatal de Búsqueda
        @yield('carpeta-investigacion') se encuentra radicado el expediente con Folio Único de Búsqueda
        <mark>@yield('folio')</mark>
        , iniciados con motivo de la desaparición @yield('pronombre-completo-desaparecido'), hechos que sucedieron en
        fecha
        <mark>@yield('fecha-desaparicion')</mark>
        , en el municipio de
        <mark>@yield('lugar-desaparicion').</mark>
    </p>

    <p>
        Al respecto, con fundamento en los artículos 33 fracciones III, XIII y XLIX 47 de la Ley Número 677 en Materia
        de Desaparición de Personas para el Estado de Veracruz de Ignacio de la Llave, solicito a usted de la manera más
        atenta y respetuosa,su invaluable apoyo a fin de girar sus apreciables instrucciones a quien corresponda a
        efecto de que se realicen las siguientes acciones:
    </p>

    <p style="margin: 0 1cm 0 1cm">
        <strong>ÚNICO: </strong> Se realice una búsqueda del
        <mark>C.@yield('pronombre-completo-desaparecido')</mark>
        , en sus bases de datos y remita a esta Comisión
        toda aquella información que obre en ellas, a fin de aportar elementos para la búsqueda y localización de la
        persona
        antes mencionada.
    </p>
    <br>
    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; border-collapse: collapse">
        <thead>
        <tr>
            <th style="background-color: lightgray; width: 30%">Nombre</th>
            <th style="background-color: lightgray; width: 30%">CURP</th>
            <th style="background-color: lightgray; width: 40%">Señas particulares</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <mark>@yield('nombre-completo')</mark>
            </td>
            <td>
                <mark>@yield('curp')</mark>
            </td>
            <td>
                <mark>@yield('senas-particulares')</mark>
            </td>
        </tr>
        </tbody>
    </table>

    <p>
        Se anexa a la presente:
        <mark>@yield('medio-difusion')</mark>
        elaborada por la Comisión Estatal de Búsqueda, el cual contiene
        los datos generales y fotografía de la(s) persona(s) desaparecida(s) y/o no localizada(s).
    </p>

    <p>
        Solicitándole que, de manera urgente, remita un informe a esta Comisión respecto de los avances de las acciones
        implementadas.
    </p>

    <p>
        No omito mencionar que, dicha información deberá tratarse confidencialmente de acuerdo a lo dispuesto por los
        artículos 6º apartado A y 16, segundo párrafo, de la Constitución Política de los Estados Unidos Mexicanos, 68
        fracción @yield('articulo-carpeta-investigacion'), 72 de la Ley Número 875 de Transparencia y Acceso a la
        Información Pública para el Estado de Veracruz de Ignacio de la Llave, 14 fracción III y 16 fracción IX de la
        Ley Número 316 de Protección de Datos Personales en Posesión de Sujetos Obligados para el Estado de Veracruz de
        Ignacio de la Llave; así como el 92 de la Ley Número 677 en Materia de Desaparición de Personas para el Estado
        de Veracruz, y lo dispuesto por el artículo 348 segundo párrafo del Código Penal para el Estado de Veracruz.
    </p>

    <x-obligaciones-derechos-humanos/>

    <x-agradecimiento/>

    <x-atentamente-usuario/>

    <x-copia-archivo/>
@endsection
