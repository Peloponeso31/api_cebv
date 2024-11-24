@extends('layouts.informe-inicio-layout')

@section('nombre-completo-desaparecido', strtoupper($desaparecido->persona->nombreCompleto()) )

@section('pronombre-completo-desaparecido')
    <x-pronombre-completo-desaparecido :desaparecido="$desaparecido"/>
@endsection

@section('folio', ($folio->folio_cebv ?? 'Sin folio' ))

@section('fecha-inicial', $fechaInicial)

@section('fecha-final', $fechaFinal)

@section('contexto-desaparicion', $reporte?->hechosDesaparicion?->contexto_desaparicion)

@section('hechos-desaparicion', $reporte?->hechosDesaparicion?->hechos_desaparicion)
@section('resultado-RND')
    {{ strtoupper($reporte?->hechosDesaparicion?->resultado_rnd?->value) }}
@endsection
