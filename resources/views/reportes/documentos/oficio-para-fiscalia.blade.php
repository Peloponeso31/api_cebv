@extends('layouts.oficio-para-fiscalia-layout')

@section('folio')
    {{ $folio->folio_cebv ?? 'Sin folio' }}
@endsection

@section('numero-oficio', $numeroOficio)
@section('year',$year)
@section('fecha',$fecha)
@section('nombre-serv-pub-env',$nombreServPubEnv)
@section('nombre-completo',$nombreCompleto)
@section('lugar-desaparcion',$lugarDesaparicion)
@section('fecha-desaparicion',$fechaDesaparicion)
@section('telefono-reportante',$numeroReporte)
@section('nombre-reportante',$nombreReportante)
@section('caso-formato',$casoFormato)
@section('nombre-serv-pub',$nombreServPublico)
@section('iniciales',$iniciales)
