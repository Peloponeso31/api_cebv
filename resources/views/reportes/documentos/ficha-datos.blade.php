@extends('layouts.ficha-datos-layout')

@section('nombre-completo-reportante', $reportante->persona->nombre . " " . $reportante->persona->apellido_paterno . " ". $reportante->persona->apellido_materno)
@section('fecha-nacimiento-reportante')
    @isset($reportante->persona->fecha_nacimiento)
        {{  \Carbon\Carbon::parse($reportante->persona->fecha_nacimiento)->translatedFormat("d \d\\e F \d\\e Y") }}
    @endisset
@endsection

@section('telefonos-reportante')
    @foreach($reportante->persona->telefonos as $telefono)
        <b>{{ $telefono->numero }}:</b> {{ $telefono->observaciones }} <br>
    @endforeach
@endsection


@section('nombre-completo-desaparecido', $desaparecido->persona->nombre . " " . $desaparecido->persona->apellido_paterno . " ". $desaparecido->persona->apellido_materno)
@section('fecha-nacimiento-desaparecido', \Carbon\Carbon::parse($desaparecido->persona->fecha_nacimiento)->translatedFormat("d \d\\e F \d\\e Y"))


