@extends('layouts.informe-inicio-layout')

@section('nombre-completo-desaparecido', strtoupper($desaparecido->persona->nombreCompleto()))
@section('folio')
    {{ $folio->folio_cebv ?? 'Sin folio' }}
@endsection

@section('hora', $hora)
@section('fecha', $fecha)
@section('nombre-completo-usuario', $nombreUsuario)
@section('nombre-puesto', $nombrePuesto)
@section('sintesis-desaparicion', $reporte->hechosDesaparicion->sintesis_desaparicion)
@section('hechos-desaparicion', $reporte->hechosDesaparicion->hechos_desaparicion)
@section('resultado-RND', $resultadoRND)
