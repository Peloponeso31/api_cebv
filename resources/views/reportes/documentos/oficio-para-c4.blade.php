@extends('layouts.oficio-para-c4-layout')

@section('nombre-completo-desaparecido', $nombrecompleto)
@section('folio')
    {{$folio->folio_cebv ?? 'Sin folio'}}
@endsection

@section('numero-oficio',$numerooficio)
@section('year',$year)
@section('nombre-servidor-publico-seg',$nombreServidorPublicoSeg)
@section('fecha',$fecha)
@section('edad',$edad)
@section('fecha-desaparicion',$fechaDesaparicion)
@section('numero-rastreo',$numeroRastreo)
@section('nombre-servidor-publico',$nombreServidorPublico)
@section('iniciales',$iniciales)
@section('carpeta',$carpeta)
@section('lugar-desaparicion',$lugarDesaparicion)
@section('sexo',$sexo)
@section('medioDifusion',$medioDifusion)
