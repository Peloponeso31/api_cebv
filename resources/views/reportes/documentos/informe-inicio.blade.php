@extends('layouts.informe-inicio-layout')

@section('nombre-completo-desaparecido', strtoupper($desaparecido->persona->nombreCompleto()) )

@section('pronombre-completo-desaparecido')
    {{ $desaparecido->persona->preposicion() . $desaparecido->persona->sustantivo() . strtoupper($desaparecido->persona->nombreCompleto()) }}
@endsection

@section('folio')
    {{ $folio->folio_cebv ?? 'Sin folio' }}
@endsection

@section('hora-inicial', $horaInicial)
@section('fecha-inicial', $fechaInicial)

@section('hora-final', $horaFinal)
@section('fecha-final', $fechaFinal)

@section('contexto-desaparicion', $reporte->hechosDesaparicion->contexto_desaparicion)

@section('hechos-desaparicion', $reporte->hechosDesaparicion->hechos_desaparicion)
@section('resultado-RND')
    {{ strtoupper($reporte->hechosDesaparicion->resultado_rnd->value) }}
@endsection
