@extends('layouts.oficio-para-ssa-layout')
@section('folio')
    {{ $folio->folio_cebv ?? 'Sin folio' }}
@endsection

@section('numero-oficio', $numerooficio)
@section('year', $year)
@section('fecha', $fecha)
@section('edad', $edad)
@section('nombre-serv-public-env', $nombreServidorPublicEnv)
@section('firma-ausencia', $firmaAusencia)
@section('sexo', $sexo)
@section('carpeta', $carpeta)
@section('nombre-completo', $nombrecompleto)
@section('fecha-desaparicion', $fechaDesaparicion)
@section('lugar-desaparicion', $lugarDesaparicion)
@section('medio-difusion', $medioDifusion)
@section('carpeta1', $carpeta1)
@section('nombre-servidor-publico', $nombreServidorPublico)
@section('iniciales', $iniciales)
