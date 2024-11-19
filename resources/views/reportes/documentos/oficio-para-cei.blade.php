@extends('layouts.oficio-para-cei-layout')

@section('folio')
    {{ $folio->folio_cebv ?? 'Sin folio' }}
@endsection

@section('numero-oficio',$numerooficio)
@section('year',$year)
@section('fecha',$fecha)
@section('nombre-servidor-public-env',$nombreServidorPublicEnv)
@section('firma-ausencia',$firmaAusencia)
@section('sexo',$sexo)
@section('carpeta',$carpeta)
@section('nombre-completo',$nombrecompleto)
@section('fecha-desaparicion',$fechaDesaparicion)
@section('lugar-desaparicion',$lugarDesaparicion)
@section('curp',$curp)
@section('senas-particulares',$senasParticulares)
@section('medio-difusion',$medioDifusion)
@section('carpeta1',$carpeta1)
@section('nombre-servidor-publico',$nombreServidorPublico)
@section('iniciales',$iniciales)


