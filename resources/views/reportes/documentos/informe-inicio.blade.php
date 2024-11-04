@extends('layouts.informe-inicio-layout')

@section('nombre-completo', $desaparecido->persona->nombreCompleto())
@section('folio')
    {{ $folio->folio_cebv ?? 'Sin folio' }}
@endsection

@section('hora', $hora)
@section('fecha', $fecha)

