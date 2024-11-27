@extends('layouts.ficha-datos-layout')

@section('fecha-actual', \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat("d \d\\e F \d\\e Y, H:m"))

<!-- Seccion del reportante. -->
@section('nombre-completo-reportante')
    @isset($reportante->persona->nombre) {{ $reportante->persona->nombre . " " }} @endisset
    @isset($reportante->persona->apellido_paterno) {{ $reportante->persona->apellido_paterno . " " }} @endisset
    @isset($reportante->persona->apellido_materno) {{ $reportante->persona->apellido_materno . " " }} @endisset
@endsection

@section('sexo-reportante', $reportante->persona?->sexo?->nombre)
@section('curp-reportante', $reportante->persona->curp)
@section('religion-reportante', $reportante->persona->religion->nombre ?? '')
@section('lengua-reportante', $reportante->persona->lengua->nombre ?? '')


@section('fecha-nacimiento-reportante')
    @isset($reportante->persona->fecha_nacimiento)
        {{  \Carbon\Carbon::parse($reportante->persona->fecha_nacimiento)->translatedFormat("d \d\\e F \d\\e Y") }}
    @endisset
@endsection

@section('edad-reportante')
    @isset($reportante->persona->fecha_nacimiento)
        {{  \Carbon\Carbon::parse($reportante->persona->fecha_nacimiento)->age }} años <br>
    @endisset
@endsection

@section('telefonos-reportante')
    @foreach($reportante->persona->telefonos as $telefono)
        <b>{{ $telefono->numero }}:</b> {{ $telefono->observaciones }} <br>
    @endforeach
@endsection

@section('correos-reportante')
    @foreach($reportante->persona->contactos as $contacto)
        @if($contacto->tipo ="Correo Electronico" )
            <b>{{ $contacto->nombre }}:</b> {{ $contacto->observaciones }} <br>
        @endif
    @endforeach
@endsection
@section('desaparecido-dependientes-economicos')
    {{"NO ESTA EN EL FORMULARIO"}}
@endsection
@section('nombre-completo-desaparecido', $desaparecido->persona->nombre . " " . $desaparecido->persona->apellido_paterno . " ". $desaparecido->persona->apellido_materno)

@section('fecha-nacimiento-desaparecido', \Carbon\Carbon::parse($desaparecido->persona->fecha_nacimiento)->translatedFormat("d \d\\e F \d\\e Y"))

@section('parentesco-reportante-desaparecido',$reportante->parentesco?->nombre)

@section('escolaridad-reportante')
    @isset($reportante->persona->estudio->escolaridad)
        {{$reportante->persona->estudio->escolaridad->nombre}}, {{$reportante->persona->estudio->estatusEscolaridad->nombre}}
    @endisset
@endsection
@section('reportante-ocupacion')
 {{"NO SE ENCUENTRA EN EL FORMULARIO"}}
@endsection

@section('grupo-vulnerable-reportante')
    @foreach ($reportante->persona->gruposVulnerables as $grupo)
        {{ $grupo->nombre }}<br>
    @endforeach
@endsection

@section('colectivo-reportante')
    @if($reportante->pertenencia_colectivo==1)
        {{"Si"}},{{ $reportante->colectivo->nombre}}
        @else
        @if($reportante->pertenencia_colectivo==0)
        {{"No"}}
    @endif
    @endif
@endsection

@section('participacion-busquedas-previas-reportante')
    @if($reportante->participacion_previa_busquedas==1)
        <!-- Suponiendo que participacion_previa_busquedas es SI/NO/NO ESPECIFICA SI =1 NO=0 NO ESP.=NULL -->
        {{ "Si"}} , {{ $reportante->descripcion_participacion_busquedas}}
        @else
        @if($reportante->participacion_previa_busquedas==0)
            {{"No"}}
    @endif
    @endif
@endsection

@section('info-victima-extorsion-reportante')
    @if($reportante->victima_extorsion_fraude==1)
        {{"Si"}} , {{ $reportante->descripcion_extorsion_fraude}}
    @else
        @if($reportante->victima_extorsion_fraude==0)
        {{"No"}}
    @endif
    @endif
@endsection

@section('info-victima-amenaza-reportante')
    @if($reportante->recibio_amenazas ==1)
    {{"Si"}} , {{ $reportante->descripcion_origen_amenazas}}
        @else
        @if($reportante->recibio_amenazas ==0)
                  {{"No"}}
   @endif
    @endif
@endsection

@section('tipo-reporte')
    @isset($reportante->reporte->tipoReporte->nombre)
        {{$reportante->reporte->tipoReporte->nombre}}
    @endisset
@endsection

@section('nombre-completo-desaparecido')
    @isset($desaparecido->persona->nombre) {{ $desaparecido->persona->nombre . " " }} @endisset
    @isset($desaparecido->persona->apellido_paterno) {{ $desaparecido->persona->apellido_paterno . " " }} @endisset
    @isset($desaparecido->persona->apellido_materno) {{ $desaparecido->persona->apellido_materno . " " }} @endisset
@endsection

@section('apodo-desaparecido')
    @isset($desaparecido->persona->apodo)
        {{$desaparecido->persona->apodo}}
    @endisset
@endsection

@section('desaparecido-sexo', $desaparecido->persona?->sexo?->nombre)

@section('desaparecido-genero')
    @isset($desaparecido->persona->genero->nombre)
        {{ $desaparecido->persona->genero->nombre }}
    @endisset
@endsection

@section('desaparecido-nacionalidad',)
    <!-- No entiendo como esto funciono, y no se porque esto es una coleccion LMAO -->

    @foreach($desaparecido->persona->nacionalidades as $nacionalidad)
        {{ $nacionalidad->nombre }}
@endforeach
@endsection

@section('desaparecido-situacion-migratoria')
    @isset($desaparecido->persona->contextoSocial->situacionMigratoria->nombre)
        <br/> {{$desaparecido->persona->contextoSocial->situacionMigratoria->nombre}}
    @endisset
@endsection


@section('desaparecido-lugarNacimiento')
    {{"NO HAY CATALOGO DE PAISES"}}
@endsection

@section('fecha-nacimiento-desaparecido')
    @isset($desaparecido->persona->fecha_nacimiento)
        {{  \Carbon\Carbon::parse($desaparecido->persona->fecha_nacimiento)->translatedFormat("d \d\\e F \d\\e Y") }}
    @endisset
@endsection

@section('edad-desaparecido')
    @isset($desaparecido->persona->fecha_nacimiento)
        {{  \Carbon\Carbon::parse($desaparecido->persona->fecha_nacimiento)->age }} años <br>
    @endisset
@endsection

@section('tipo-sangre-desaparecido')
    @isset($desaparecido->persona->salud->tipoSangre->nombre)
    {{$desaparecido->persona->salud->tipoSangre->nombre}}
    @endisset
@endsection
@section('desaparecido-CURP')
    @isset($desaparecido->persona->curp)
        {{$desaparecido->persona->curp}}
    @endisset
@endsection

@section('ine-desaparecido')
    {{"NO-ESTA-O-NO-SE-ENCUENTRA"}}
@endsection

@section('desaparecido-religion')
    @isset($desaparecido->persona->religion->nombre)
        {{$desaparecido->persona->religion->nombre}}
    @endisset
@endsection

@section('desaparecido-lengua')
    @isset($desaparecido->persona->lengua->nombre)
        {{$desaparecido->persona->lengua->nombre}}
    @endisset
@endsection

@section('desaparecido-escolaridad')
    @isset($desaparecido->persona->estudio->escolaridad)
        {{$desaparecido->persona->estudio->escolaridad->nombre}}, {{$desaparecido->persona->estudio->estatusEscolaridad->nombre}}
    @endisset
@endsection

@section('desaparecido-ocupacion')
    @foreach($desaparecido->persona->ocupaciones as $ocupaciones)
        {{ $ocupaciones->nombre }}<br>
    @endforeach
@endsection

@section('desaparecido-discapacidad')
    {{"NO-ESTA-O-NO-SE-ENCUENTRA"}}
@endsection

@section('telefonos-desaparecidos')
    @foreach($desaparecido->persona->telefonos as $telefono)
        <b>{{ $telefono->numero }}:</b> {{ $telefono->observaciones }} <br>
    @endforeach
@endsection

@section('desaparecido-direccion-residencia')

    @foreach($desaparecido->persona->direcciones as $direcciones)
        <b>{{ "Colonia" }}:</b>{{$direcciones->colonia}}<br>
    <b>{{ "Calle" }}:</b> {{$direcciones->calle}}<br>
    <b>{{ "No. Exterior" }}:</b> {{$direcciones->numero_exterior}}<br>
    <b>{{ "No. Interior" }}:</b>  {{$direcciones->numero_interior}}<br>
    <b>{{ "Código Postal" }}:</b> {{ $direcciones->codigo_postal}} <br>
    @endforeach
@endsection

@section('grupo-vulnerable-desaparecido')
    @foreach ($desaparecido->persona->gruposVulnerables as $grupo)
        {{ $grupo->nombre }}<br>
    @endforeach
@endsection
@section('desaparecido-consumo-sustencias')
    {{"No está o no se encuentra"}}
@endsection
@section('desaparecido-ficha-o-boletin')
    {{"No está o no se encuentra"}}
@endsection
@section('desaparecido-institucion-ficha-o-boletin')
    {{"No está o no se encuentra"}}
@endsection
@section('lugar-desaparicion')
       @isset($desaparecido->reporte->hechosDesaparicion->lugarHechos)
           <b>{{ "Colonia" }}:</b>{{$desaparecido->reporte->hechosDesaparicion->lugarHechos->colonia}}<br>
           <b>{{ "Calle" }}:</b> {{$desaparecido->reporte->hechosDesaparicion->lugarHechos->calle}}<br>
           <b>{{ "No. Exterior" }}:</b> {{$desaparecido->reporte->hechosDesaparicion->lugarHechos->numero_exterior}}<br>
           <b>{{ "No. Interior" }}:</b>  {{$desaparecido->reporte->hechosDesaparicion->lugarHechos->numero_interior}}<br>
           <b>{{ "Código Postal" }}:</b> {{ $desaparecido->reporte->hechosDesaparicion->lugarHechos->codigo_postal}} <br>
       @endisset
@endsection

@section('fecha-desaparicion')
@isset($desaparecido->reporte->hechosDesaparicion->fecha_desaparicion)
    {{  \Carbon\Carbon::parse($desaparecido->reporte->hechosDesaparicion->fecha_desaparicion)->translatedFormat("d \d\\e F \d\\e Y") }}
@endisset
@endsection

@section('hora-desaparicion',$desaparecido->reporte->hechosDesaparicion->hora_desaparicion)
@section('narrativa-hechos',$desaparecido->reporte->hechosDesaparicion->hechos_desaparicion)
@section('mas-personas-desaparecidas')
    @if($desaparecido->reporte->hechosDesaparicion->desaparecio_acompanado!=0)
        {{"Si,desaparecieron "}} {{$desaparecido->reporte->hechosDesaparicion->personas_mismo_evento}} {{" personas en total."}}
    @else{{"No hay más personas desaparecidas."}}
    @endif
@endsection

@section('desaparicion-forzada')
@isset($desaparecido->reporte->desaparicionForzada->autoridad->nombre)
    {{$desaparecido->reporte->desaparicionForzada->autoridad->nombre}}
@endisset
@endsection

@section('desaparicion-particular')
    @isset($desaparecido->reporte->desaparicionForzada->particular->nombre)
        {{$desaparecido->reporte->desaparicionForzada->particular->nombre}}
    @endisset
@endsection
@section('metodo-captura')
    @isset($desaparecido->reporte->desaparicionForzada->metodoCaptura->nombre)
        {{$desaparecido->reporte->desaparicionForzada->metodoCaptura->nombre}}
    @endisset
@endsection
@section('medios-captura')
    @isset($desaparecido->reporte->desaparicionForzada->medioCaptura->nombre)
        {{$desaparecido->reporte->desaparicionForzada->medioCaptura->nombre}}
    @endisset
@endsection
@section('vehiculos-involucrados')
@foreach($desaparecido->reporte->vehiculos as $vehiculos)

        <b>{{ "Tipo de vehículo:" }}</b> {{$vehiculos->tipoVehiculo->nombre}}<br>
        <b>{{ "Número de serie:" }}</b> {{$vehiculos->numero_serie}}<br>
        <b>{{ "Placas:" }}</b>{{$vehiculos->placa}}<br>
        <b>{{ "Insignia: " }}</b> {{$vehiculos->marcaVehiculo->nombre}}<br>
        <b>{{ "Características: " }}</b>{{$vehiculos->descripcion}}<br>

@endforeach
@endsection

@section('hay-testigos')
        {{"NO EXISTE AUN ESA OPCION"}}
@endsection

@section('detencion-previa-extorsion')
    @isset($desaparecido->reporte->desaparicionForzada->detencion_previa_extorsion)
    @if($desaparecido->reporte->desaparicionForzada->detencion_previa_extorsion==1)
        {{"Si"}}
    @else
        @if($desaparecido->reporte->desaparicionForzada->detencion_previa_extorsion==0)
        {{"No"}}
    @endif
    @endif
    @endisset
@endsection

@section('desaparecido-avistamiento')
    @isset($desaparecido->reporte->desaparicionForzada->ha_sido_avistado)
    @if($desaparecido->reporte->desaparicionForzada->ha_sido_avistado==1)
        {{"Si "}}<br> {{$desaparecido->reporte->desaparicionForzada->donde_ha_sido_avistado}}
        @else @if($desaparecido->reporte->desaparicionForzada->ha_sido_avistado==0)
        {{"No"}}
    @endif
    @endif
    @endisset
@endsection

@section('perpetradores')
    @foreach($desaparecido->reporte->perpetradores as $perpetradores)
        <b>{{"Perpetrador"}}</b><br>
        {{ "Nombre:" }} {{$perpetradores->nombre}}<br>
        {{ "Estatus:" }} {{$perpetradores->estatusPerpetrador->nombre}}<br>
        {{ "Sexo:" }}{{$perpetradores->sexo->nombre}}<br>
        {{ "Descripción: " }} {{$perpetradores->descripcion}}<br>

    @endforeach
@endsection

@section('descripcion-grupo-perpetradores')
    @isset($desaparecido->reporte->desaparicionForzada->descripcion_grupo_perpetrador)
        {{$desaparecido->reporte->desaparicionForzada->descripcion_grupo_perpetrador}}
    @endisset
@endsection
@section('documentos-legales')
    @foreach($desaparecido->documentosLegales as $documentosLegales)
        <b>{{"Documento:"}}</b><br>
        {{ "Tipo:" }} {{$documentosLegales->tipo_documento}}<br>
        {{ "Número:" }} {{$documentosLegales->numero_documento}}<br>
    @endforeach
@endsection




@section('otros-delitos')
    @isset($desaparecido->reporte->desaparicionForzada->delitos_desaparicion)
    @if($desaparecido->reporte->desaparicionForzada->delitos_desaparicion==1)
        {{"Si"}}
        {{$desaparecido->reporte->desaparicionForzada->descripcion_delitos_desaparicion}}
    @else
        @if($desaparecido->reporte->desaparicionForzada->delitos_desaparicion==0)
            {{"No"}}
    @endif
    @endif
    @endisset
@endsection

@section('desaparecido-estado-civil')
    @isset($desaparecido->persona->contextoFamiliar->estadoConyugal->nombre)
        {{$desaparecido->persona->contextoFamiliar->estadoConyugal->nombre}}
    @endisset
@endsection

@section('desaparecido-conyugue')
    @isset($desaparecido->persona->contextoFamiliar->nombre_pareja_conyugue)
        <b>{{"Nombre:"}}</b>  {{$desaparecido->persona->contextoFamiliar->nombre_pareja_conyugue}}
    @endisset
@endsection

@section('desaparecido-numero-personas-vive')
    @isset($desaparecido->persona->contextoFamiliar->numero_personas_vive)
       {{"Vive con "}} {{$desaparecido->persona->contextoFamiliar->numero_personas_vive}} {{" persona(s)."}}<br>
    @endisset
    @foreach($desaparecido->persona->familiares as $familiares)
        <b>{{"Familiar:"}}</b><br>
      {{"Parentesco: "}}  {{$familiares->parentesco->nombre}}<br>
        {{"Nombre: "}} {{$familiares->nombre}}<br>
    @endforeach
@endsection


@section('desaparecido-numero-personas-vive')
    @isset($desaparecido->persona->contextoFamiliar->numero_personas_vive)
        {{"Vive con "}} {{$desaparecido->persona->contextoFamiliar->numero_personas_vive}} {{" personas."}}<br>
    @endisset
@endsection
@section('desaparecido-hijos')
    @foreach($desaparecido->persona->familiares as $familiares)
        @if($familiares->parentesco->id==16||$familiares->parentesco->id==17||$familiares->parentesco->id==18)
            <b>{{"Parentesco: "}}</b>  {{$familiares->parentesco->nombre}}<br>
        {{"Nombre: "}} {{$familiares->nombre}}<br>
        @endif
    @endforeach
@endsection
@section('desaparecido-familiares-cercanos')
    @foreach($desaparecido->persona->familiares as $familiares)
        @if($familiares->es_familiar_cercano==1)
            <b>{{"Parentesco: "}}</b>  {{$familiares->parentesco->nombre}}<br>
            {{"Nombre: "}} {{$familiares->nombre}}<br>
        @endif
    @endforeach
@endsection
@section('desaparecido-familiares-violencia')
    @foreach($desaparecido->persona->familiares as $familiares)
        @if($familiares->ha_ejercido_violencia==1)
            <b>{{"Parentesco: "}}</b>  {{$familiares->parentesco->nombre}}<br>
            {{"Nombre: "}} {{$familiares->nombre}}<br>
        @endif
    @endforeach
@endsection

@section('desaparecido-pasatiempos')
    @foreach($desaparecido->persona->pasatiempos as $pasatiempos)
              {{$pasatiempos->nombre}}<br>
    @endforeach
@endsection

@section('desaparecido-donde-trabaja')
    @isset($desaparecido->persona->contextoEconomico)
        {{$desaparecido->persona->contextoEconomico->donde_trabaja}}
    @endisset
@endsection

@section('desaparecido-gusta-trabajo')
    @isset($desaparecido->persona->contextoEconomico->gusta_trabajo)
       @if($desaparecido->persona->contextoEconomico->gusta_trabajo==1)
           {{"Si"}}
       @else @if($desaparecido->persona->contextoEconomico->gusta_trabajo==0) {{"No"}}
       @endif
       @endif
    @endisset
@endsection
@section('desaparecido-trabajo-foraneo')
    @isset($desaparecido->persona->contextoEconomico->desea_trabajo_foraneo)
        @if($desaparecido->persona->contextoEconomico->desea_trabajo_foraneo==1)
            {{"Si"}}
        @else @if($desaparecido->persona->contextoEconomico->desea_trabajo_foraneo==0) {{"No"}}
        @endif
        @endif
    @endisset
@endsection

@section('desaparecido-violencia-trabajo')
    @isset($desaparecido->persona->contextoEconomico->violencia_laboral)
        @if($desaparecido->persona->contextoEconomico->violencia_laboral==1)
            {{"Si"}}
        @else @if($desaparecido->persona->contextoEconomico->violencia_laboral==0) {{"No"}}
        @endif
        @endif
    @endisset
@endsection

@section('desaparecido-deudas')
    @isset($desaparecido->persona->contextoEconomico->tiene_deudas)
        @if($desaparecido->persona->contextoEconomico->tiene_deudas==1)
            {{"Si"}}
        @else @if($desaparecido->persona->contextoEconomico->tiene_deudas==0) {{"No"}}
        @endif
        @endif
    @endisset
@endsection

@section('desaparecido-clubes')
    @isset($desaparecido->persona->contextoSocial->descripcion_clubes_organizaciones)
        {{$desaparecido->persona->contextoSocial->descripcion_clubes_organizaciones}}
    @endisset
@endsection
@section('desaparecido-estudios')
    @isset($desaparecido->persona->estudio->escolaridad->nombre)
        {{$desaparecido->persona->estudio->escolaridad->nombre}}
    @endisset
@endsection

@section('desaparecido-amistades')
    @foreach($desaparecido->persona->amistades as $amistades)
        <b> {{"Nombre: "}}</b> {{$amistades->nombre}} {{$amistades->apellido_paterno}} {{$amistades->apellido_materno}} <br>
          <b> {{"Apodo: "}}</b> {{$amistades->apodo}} <br>

    @endforeach
@endsection
@section('desaparecido-amigos-otro-municipio')
        {{"No está aun"}}
@endsection

@section('desaparecido-amistades-red-social')
    @foreach($desaparecido->persona->redesSociales as $redes)
        <b> {{"Red social: "}}</b> {{$redes->tipoRedSocial->nombre}} <br>
        <b> {{"Nombre en red social: "}}</b> {{$redes->usuario}} <br>
        <b> {{"Observaciones: "}}</b> {{$redes->observaciones}} <br>

    @endforeach
@endsection

@section('desaparecido-vestimenta')
    @foreach($desaparecido->prendasVestir as $prendasvestir)
        <b> {{"Prenda: "}}</b> <br>
        {{"Grupo pertenencia: "}} {{$prendasvestir->pertenencia->grupoPertenencia->nombre}} <br>
         {{"Tipo: "}} {{$prendasvestir->pertenencia->nombre}} <br>
         {{"Color: "}} {{$prendasvestir->color->nombre}} <br>
        {{"Marca: "}} {{$prendasvestir->marca}} <br>
        {{"Descripción: "}} {{$prendasvestir->descripcion}} <br>

    @endforeach
@endsection

@section('desaparecido-senas')
    @foreach($desaparecido->persona->senasParticulares as $senasParticulares)
        <b> {{"Seña: "}}</b> <br>
         {{"Región: "}} {{$senasParticulares?->region_cuerpo?->nombre}} <br>
         {{"Vista: "}} {{$senasParticulares?->vista?->nombre}} <br>
         {{"Lado: "}} {{$senasParticulares?->lado?->nombre}} <br>
         {{"Tipo: "}} {{$senasParticulares?->tipo?->nombre}} <br>
         {{"Cantidad: "}} {{$senasParticulares?->cantidad}} <br>
         {{"Descripción: "}} {{$senasParticulares?->descripcion}} <br>

    @endforeach
@endsection
@section('desaparecido-tatuajes')
    @foreach($desaparecido->persona->senasParticulares as $senasParticulares)
        <!--Aca son puros tatuajes y en el de arriba todas las señas -->
        @if($senasParticulares?->tipo?->id==10)
        <b> {{"Tatuaje: "}}</b> <br>
        {{"Región: "}} {{$senasParticulares?->region_cuerpo?->nombre}} <br>
        {{"Vista: "}} {{$senasParticulares?->vista?->nombre}} <br>
        {{"Lado: "}} {{$senasParticulares?->lado?->nombre}} <br>
        {{"Descripción: "}} {{$senasParticulares?->descripcion}} <br>
        @endif
    @endforeach
@endsection

@section('desaparecido-estatura')
    @isset($desaparecido->persona->salud->estatura_centimetros)
        {{$desaparecido->persona->salud->estatura_centimetros}} {{" cm."}}
    @endisset
@endsection
@section('desaparecido-complexion')
    @isset($desaparecido->persona->salud->complexion->nombre)
        {{$desaparecido->persona->salud->complexion->nombre}}
    @endisset
@endsection
@section('desaparecido-peso')
    @isset($desaparecido->persona->salud->peso_kilogramos)
        {{$desaparecido->persona->salud->peso_kilogramos}} {{" Kg."}}
    @endisset
@endsection

@section('desaparecido-color-piel')
    @isset($desaparecido->persona->salud->colorPiel->nombre)
        {{$desaparecido->persona->salud->colorPiel->nombre}}
    @endisset
@endsection

@section('desaparecido-tamano-cabello')
    @isset($desaparecido->persona->cabello->tamanoCabello->nombre)
        {{$desaparecido->persona->cabello->tamanoCabello->nombre}}
    @endisset
@endsection

@section('desaparecido-tipo-cabello')
    @isset($desaparecido->persona->cabello->tipoCabello->nombre)
        {{$desaparecido->persona->cabello->tipoCabello->nombre}}
    @endisset
@endsection
@section('desaparecido-color-cabello')
    @isset($desaparecido->persona->cabello->colorCabello->nombre)
        {{$desaparecido->persona->cabello->colorCabello->nombre}}
    @endisset
@endsection

@section('desaparecido-modificaciones-cabello')
    @isset($desaparecido->persona->cabello->especificaciones_cabello)
        {{$desaparecido->persona->cabello->especificaciones_cabello}}
    @endisset
@endsection

@section('desaparecido-calvicie')
    @isset($desaparecido->persona->cabello->calvicie->nombre)
        {{$desaparecido->persona->cabello->calvicie->nombre}}
    @endisset
@endsection

@section('desaparecido-cejas')
    @isset($desaparecido->persona->velloFacial->cejas->nombre)
        {{$desaparecido->persona->velloFacial->cejas->nombre}}
    @endisset
@endsection
@section('desaparecido-modificaciones-cejas')
    @isset($desaparecido->persona->velloFacial->especificaciones_cejas)
        {{$desaparecido->persona->velloFacial->especificaciones_cejas}}
    @endisset
@endsection
@section('desaparecido-color-ojos')
    @isset($desaparecido->persona->ojos->colorOjos->nombre)
        {{$desaparecido->persona->ojos->colorOjos->nombre}}
    @endisset
@endsection

@section('desaparecido-forma-ojos')
    @isset($desaparecido->persona->ojos->formaOjos->nombre)
        {{$desaparecido->persona->ojos->formaOjos->nombre}}
    @endisset
@endsection

@section('desaparecido-tamano-ojos')
    @isset($desaparecido->persona->ojos->tamanoOjos->nombre)
        {{$desaparecido->persona->ojos->tamanoOjos->nombre}}
    @endisset
@endsection

@section('desaparecido-ojos-especificaciones')
    @isset($desaparecido->persona->ojos->especificaciones_ojos)
        {{$desaparecido->persona->ojos->especificaciones_ojos}}
    @endisset
@endsection
@section('desaparecido-pestanas-largas')
    {{"NO ESTA EN EL FORMULARIO"}}
@endsection

@section('desaparecido-patologias-ojos')
    {{"NO ESTA EN EL FORMULARIO"}}
@endsection

@section('desaparecido-tipo-nariz')
    @isset($desaparecido->persona->nariz->tipoNariz->nombre)
        {{$desaparecido->persona->nariz->tipoNariz->nombre}}
    @endisset
@endsection
@section('desaparecido-especificaciones-nariz')
    @isset($desaparecido->persona->nariz->especificaciones_nariz)
        {{$desaparecido->persona->nariz->especificaciones_nariz}}
    @endisset
@endsection

@section('desaparecido-desviacion-nariz')
    {{"NO ESTA EN EL FORMULARIO"}}
@endsection

@section('desaparecido-tamano-boca')
    @isset($desaparecido->persona->boca->tamanoBoca->nombre)
        {{$desaparecido->persona->boca->tamanoBoca->nombre}}
    @endisset
@endsection

@section('desaparecido-tamano-labios')
    @isset($desaparecido->persona->boca->tamanoLabios->nombre)
        {{$desaparecido->persona->boca->tamanoLabios->nombre}}
    @endisset
@endsection

@section('desaparecido-modificaciones-labios')
    {{"NO ESTA EN EL FORMULARIO"}}
@endsection
@section('desaparecido-patologias-labios')
    {{"NO ESTA EN EL FORMULARIO"}}
@endsection

@section('desaparecido-faltan-dientes')
    @isset($desaparecido->persona->mediaFiliacionComplementaria->tiene_ausencia_dental)
        @if($desaparecido->persona->mediaFiliacionComplementaria->tiene_ausencia_dental==1)
        {{"SI"}}<br>
        {{"DESCRIPCIÓN: "}}
        {{$desaparecido->persona->mediaFiliacionComplementaria->descripcion_ausencia_dental}}
    @else
            {{"NO"}}
        @endif
    @endisset
@endsection

@section('desaparecido-tratamiento-dental')
    @isset($desaparecido->persona->mediaFiliacionComplementaria->tiene_tratamiento_dental)
        @if($desaparecido->persona->mediaFiliacionComplementaria->tiene_tratamiento_dental==1)
            {{"SI"}}<br>
            {{"DESCRIPCIÓN: "}}
            {{$desaparecido->persona->mediaFiliacionComplementaria->descripcion_tratamiento_dental}}
        @else
            {{"NO"}}
        @endif
    @endisset
@endsection

@section('desaparecido-region-vellofacial')
    @isset($desaparecido->persona->velloFacial->tiene_bigote)
        @if($desaparecido->persona->velloFacial->tiene_bigote==1)
            {{"Tiene bigote."}}<br>
        @else {{"Sin bigote."}}<br>
        @endif
    @endisset
    @isset($desaparecido->persona->velloFacial->tiene_barba)
        @if($desaparecido->persona->velloFacial->tiene_barba==1)
            {{"Tiene barba."}}<br>
        @else {{"Sin barba."}}<br>
        @endif
    @endisset
@endsection

@section('desaparecido-color-vellofacial')
    {{"NO ESTA EN EL FORMULARIO"}}
@endsection

@section('desaparecido-volumen-vellofacial')
    {{"NO ESTA EN EL FORMULARIO"}}
@endsection

@section('desaparecido-corte-vellofacial')
    {{"NO ESTA EN EL FORMULARIO"}}
@endsection

@section('desaparecido-modificaciones-vellofacial')
    @isset($desaparecido->persona->velloFacial->especificaciones_bigote)
       {{$desaparecido->persona->velloFacial->especificaciones_bigote}}<br>
    @endisset
    @isset($desaparecido->persona->velloFacial->especificaciones_barba)
        {{$desaparecido->persona->velloFacial->especificaciones_barba}}<br>
    @endisset
@endsection

@section('desaparecido-tipo-menton')
    @isset($desaparecido->persona->mediaFiliacionComplementaria->tipoMenton->nombre)
        {{$desaparecido->persona->mediaFiliacionComplementaria->tipoMenton->nombre}}
    @endisset
@endsection

@section('desaparecido-especificacion-menton')
    @isset($desaparecido->persona->mediaFiliacionComplementaria->especificaciones_menton)
       {{$desaparecido->persona->mediaFiliacionComplementaria->especificaciones_menton}}
    @endisset
@endsection

@section('desaparecido-patologia-menton')
    {{"NO ESTA EN EL FORMULARIO"}}
@endsection

@section('desaparecido-orejas')
    @isset($desaparecido->persona->oreja->tamanoOrejas->nombre)
        {{$desaparecido->persona->oreja->tamanoOrejas->nombre}}<br>
    @endisset
    @isset($desaparecido->persona->oreja->formaOrejas->nombre)
        {{$desaparecido->persona->oreja->formaOrejas->nombre}}<br>
    @endisset
@endsection

@section('desaparecido-especificaciones-orejas')
    @isset($desaparecido->persona->oreja->especificaciones_orejas)
        {{$desaparecido->persona->oreja->especificaciones_orejas}}
    @endisset
@endsection

@section('desaparecido-patologia-orejas')
    {{"NO ESTA EN EL FORMULARIO"}}
@endsection

@section('desaparecido-intervenciones-quirurgicas')
    @foreach($desaparecido->persona->intervencionesQuirurgicas as $intervencionesQuirurgicas)
    {{$intervencionesQuirurgicas->tipoIntervencionQuirurgica->nombre}}<br>
    @endforeach

@endsection

@section('desaparecido-heridas-recientes')
    {{"NO ESTA EN EL FORMULARIO"}}
@endsection
@section('desaparecido-fracturas-recientes')
    {{"NO ESTA EN EL FORMULARIO"}}
@endsection

@section('desaparecido-observaciones-generales')
    @isset($desaparecido->persona->mediaFiliacionComplementaria->observaciones_generales)
        {{$desaparecido->persona->mediaFiliacionComplementaria->observaciones_generales}}
    @endisset
@endsection
