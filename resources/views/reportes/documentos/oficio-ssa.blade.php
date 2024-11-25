@extends('layouts.oficio-ssa-layout')

@section('encabezado')
    <x-encabezado :desaparecido="$desaparecido" :fecha="$fecha" :folio="$folio"/>
@endsection

@section('es-menor')
    <x-fundamento-menor-edad
        :es-menor-edad="$desaparecido->persona->esMayorEdad($desaparecido?->edad_momento_desaparicion_anos)"/>
@endsection

@section('firma-ausencia')
    <x-firma-ausencia :firma-ausencia="$firmaAusencia"/>
@endsection

@section('fundamento-ninias-mujeres-72h')
    <x-fundamento-ninias-mujeres-72h :mostrar="$fundamentoMujeres72h"/>
@endsection

@section('carpeta-investigacion')
    <x-carpeta-investigacion :numero-carpeta="$numeroCarpeta"/>
@endsection

@section('folio',$folio ?? 'Sin folio')

@section('pronombre-completo-desaparecido')
    <x-pronombre-completo-desaparecido :desaparecido="$desaparecido"/>
@endsection

@section('fecha-desaparicion',$fechaDesaparicion)
@section('lugar-desaparicion',$lugarDesaparicion)

@section('numero-rastreo',$numeroRastreo)

@section('medio-difusion', $medioDifusion->nombre ?? 'Sin medio de difusión')

@section('difusion-digital')
    <x-difusion-digital :medio-difusion="$medioDifusion?->id"/>
@endsection

@section('articulo-carpeta-investigacion')
    <x-articulo-carpeta-investigacion :numero-carpeta="$numeroCarpeta"/>
@endsection
