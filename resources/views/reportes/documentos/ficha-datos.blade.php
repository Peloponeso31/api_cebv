@extends('layouts.ficha-datos-layout')

@section('fecha-actual', \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat("d \d\\e F \d\\e Y, H:m"))

<!-- Seccion del reportante. -->
@section('nombre-completo-reportante')
    @isset($reportante->persona->nombre) {{ $reportante->persona->nombre . " " }} @endisset
    @isset($reportante->persona->apellido_paterno) {{ $reportante->persona->apellido_paterno . " " }} @endisset
    @isset($reportante->persona->apellido_materno) {{ $reportante->persona->apellido_materno . " " }} @endisset
@endsection

@section('sexo-reportante', $reportante->persona->sexo->nombre)
@section('curp-reportante', $reportante->persona->curp)
@section('religion-reportante', $reportante->persona->religion->nombre ?? '')
@section('lengua-reportante', $reportante->persona->lengua->nombre ?? '')


@section('fecha-nacimiento-reportante')
    @isset($reportante->persona->fecha_nacimiento)
        {{  \Carbon\Carbon::parse($reportante->persona->fecha_nacimiento)->translatedFormat("d \d\\e F \d\\e Y") }}
    @endisset
@endsection

@section('edad-reportante')
    @isset($reportante->persona->fecha_nacimiento)
        {{  \Carbon\Carbon::parse($reportante->persona->fecha_nacimiento)->age }} años <br>
    @endisset
@endsection

@section('telefonos-reportante')
    @foreach($reportante->persona->telefonos as $telefono)
        <b>{{ $telefono->numero }}:</b> {{ $telefono->observaciones }} <br>
    @endforeach
@endsection

@section('correos-reportante')
    @foreach($reportante->persona->contactos as $contacto)
        @if($contacto->tipo == "Correo Electronico")
            <b>{{ $contacto->nombre }}:</b> {{ $contacto->observaciones }} <br>
        @endif
    @endforeach
@endsection

@section('nombre-completo-desaparecido', $desaparecido->persona->nombre . " " . $desaparecido->persona->apellido_paterno . " ". $desaparecido->persona->apellido_materno)
@section('fecha-nacimiento-desaparecido', \Carbon\Carbon::parse($desaparecido->persona->fecha_nacimiento)->translatedFormat("d \d\\e F \d\\e Y"))


