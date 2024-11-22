<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use App\Models\Oficialidades\Folio;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Reportes\Reporte;
use Barryvdh\DomPDF\Facade\Pdf;

class DocumentoController extends Controller
{
    public function informeInicio(string $desaparecidoId)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecidoId);
        $reporte = $desaparecido->reporte;
        $reportante = $reporte->reportantes->first;
        $folio = Folio::getFolio($reporte->id, $desaparecido->persona->id);

        // ToDo: Remove merge hours and dates in a single variable
        $horaInicial = $reporte->created_at->format('H:i');
        $fechaInicial = $reporte->created_at->locale('es')->isoFormat('D [de] MMMM [del] YYYY');

        if (isset($folio->created_at)) {
            $horaFinal = $folio->created_at->format('H:i');
            $fechaFinal = $folio->created_at->locale('es')->isoFormat('D [de] MMMM [del] YYYY');
        } else {
            $horaFinal = $reporte->updated_at->format('H:i');
            $fechaFinal = $reporte->updated_at->locale('es')->isoFormat('D [de] MMMM [del] YYYY');
        }

        $folioLimpio = StringHelper::removeSlashes($folio) ?? $desaparecido->persona->nombreCompletoSinEspacios();

        return Pdf::loadView("reportes.documentos.informe-inicio", [
            'desaparecido' => $desaparecido,
            'reporte' => $reporte,
            'reportante' => $reportante,
            'folio' => $folio,
            'horaInicial' => $horaInicial,
            'horaFinal' => $horaFinal,
            'fechaInicial' => $fechaInicial,
            'fechaFinal' => $fechaFinal,
        ])->stream("InformeInicio_" . $folioLimpio . ".pdf");
    }

    public function oficioparac4(string $desaparecidoId)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecidoId);
        $reporte = $desaparecido->reporte;
        $folio = Folio::where('reporte_id', $reporte->id)
            ->where('persona_id', $desaparecido->persona->id)
            ->first();

        $numerooficio = str_pad($desaparecidoId, 5, '0', STR_PAD_LEFT);
        $fecha = now()->locale('es')->isoFormat('D [de] MMMM [del] YYYY');
        $year = now()->locale('es')->isoFormat('YYYY');
        $nombresersegpub = 'Cap. Manuel Salvador Palma Valdovinos';

        if ($desaparecido->persona->edadAnhos() >= 18) {
            $edad = ',';
        } else {
            $edad = ',7,8,9,10,12,';
        }

        $nombrecompleto = $desaparecido->persona->nombreCompleto();
        $fechaDesaparicion = 'PENDIENTE';
        $numeroRastreo = $desaparecido->persona->telefonos->first() ? $desaparecido->persona->telefonos->first()->numero : 'Número no disponible';
        $nombreservpubcebv = 'Mtra. Fernanda Isabel Figueroa Cruz';
        $logueado = 'Angel Daniel Méndez Juarez de la Luz del Cielo'; // Usuario logueado
        $iniciales = $desaparecido->persona->inicialesNombresApellidos($logueado);

        $documentoCarpeta = $desaparecido->documentosLegales->firstWhere('tipo_documento', 'CarpetaInvestigacion');

        //TODO: HACER DINÁMICO LO QUE VAS DESPUÉS DE 'número'
        if ($documentoCarpeta) {
            $carpeta = 'recibió  la carpeta de investigación número FEADPD/ZS/021/2021';
        } else {
            $carpeta = '';
        }

        $lugardesaparicion = $desaparecido->reporte->hechosDesaparicion->sitio_id ?? 'Lugar no disponible';

        if ($desaparecido->persona->sexo->nombre == 'Mujer') {
            $sexo = ' capítulo 1 numeral 6 inciso XIV del Protocolo de Atención, Reacción y Coordinación entre Autoridades Federales,
            Estatales y Municipales en Caso de Desaparición de Mujeres, Adolescentes y Niñas para el Estado de Veracruz de Ignacio de
            la Llave, (Protocolo Alba) publicado en la Gaceta Oficial Extraordinaria número 480 del 30 Nov. 2018 ;';
        } else {
            $sexo = '';
        }

        $mediodifusion = 'PENDIENTE';

        return Pdf::loadView("reportes.documentos.oficio-para-c4", [
            'numerooficio' => $numerooficio,
            'year' => $year,
            'nombreServidorPublicoSeg' => $nombresersegpub,
            'folio' => $folio,
            'fecha' => $fecha,
            'edad' => $edad,
            'nombrecompleto' => $nombrecompleto,
            'fechaDesaparicion' => $fechaDesaparicion,
            'numeroRastreo' => $numeroRastreo,
            'nombreServidorPublico' => $nombreservpubcebv,
            'iniciales' => $iniciales,
            'carpeta' => $carpeta,
            'lugarDesaparicion' => $lugardesaparicion,
            'sexo' => $sexo,
            'medioDifusion' => $mediodifusion,
        ])->stream();

    }

    public function oficioparacei(string $desaparecidoId)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecidoId);
        $reporte = $desaparecido->reporte;
        $folio = Folio::where('reporte_id', $reporte->id)
            ->where('persona_id', $desaparecido->persona->id)
            ->first();

        $numerooficio = str_pad($desaparecidoId, 5, '0', STR_PAD_LEFT);
        $fecha = now()->locale('es')->isoFormat('D [de] MMMM [del] YYYY');
        $year = now()->locale('es')->isoFormat('YYYY');
        $nombreservenvia = 'L.I. Rafael Ochoa Campos';
        $firmaporausencia = 'PENDIENTE';
        $nombrecompleto = $desaparecido->persona->nombreCompleto();
        $fechaDesaparicion = 'PENDIENTE';
        $curp = $desaparecido->persona->curp;
        $senasparticulares = $desaparecido->persona->senasParticulares;
        $nombreservpubcebv = 'Mtra. Fernanda Isabel Figueroa Cruz';

        $logueado = 'Angel Daniel Luna de la Luz del Cielo'; // Usuario logueado
        $iniciales = $desaparecido->persona->inicialesNombresApellidos($logueado);

        // Buscar si existe algún documento con tipo 'CarpetaInvestigacion'
        $documentoCarpeta = $desaparecido->documentosLegales->firstWhere('tipo_documento', 'CarpetaInvestigacion');

        //TODO: HACER DINÁMICO LO QUE VAS DESPUÉS DE 'número'
        if ($documentoCarpeta) {
            $carpeta = 'recibió  la carpeta de investigación número FEADPD/ZS/021/2021';
            $carpeta1 = 'VIII';
        } else {
            $carpeta = '';
            $carpeta1 = '';

        }

        $lugardesaparicion = $desaparecido->reporte->hechosDesaparicion->sitio_id ?? 'Lugar no disponible';

        if ($desaparecido->persona->sexo->nombre == 'Mujer') {
            $sexo = 'capítulo 1 numeral 6 inciso XIV del Protocolo de Atención, Reacción y Coordinación entre Autoridades Federales,
            Estatales y Municipales en Caso de Desaparición de Mujeres, Adolescentes y Niñas para el Estado de Veracruz de Ignacio de
            la Llave, (Protocolo Alba) publicado en la Gaceta Oficial Extraordinaria número 480 del 30 Nov. 2018, ';
        } else {
            $sexo = '';
        }

        $mediodifusion = 'PENDIENTE';

        return Pdf::loadView("reportes.documentos.oficio-para-cei", [
            'numerooficio' => $numerooficio,
            'year' => $year,
            'folio' => $folio,
            'fecha' => $fecha,
            'nombreServidorPublicEnv' => $nombreservenvia,
            'firmaAusencia' => $firmaporausencia,
            'sexo' => $sexo,
            'carpeta' => $carpeta,
            'nombrecompleto' => $nombrecompleto,
            'fechaDesaparicion' => $fechaDesaparicion,
            'lugarDesaparicion' => $lugardesaparicion,
            'curp' => $curp,
            'senasParticulares' => $senasparticulares,
            'medioDifusion' => $mediodifusion,
            'carpeta1' => $carpeta1,
            'nombreServidorPublico' => $nombreservpubcebv,
            'iniciales' => $iniciales,
        ])->stream();

    }

    public function oficioparafiscalia(string $desaparecidoId)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecidoId);
        $reporte = $desaparecido->reporte;

        if ($reporte && $reporte->reportantes->isNotEmpty()) {
            $primerReportante = $reporte->reportantes->first();
            $nombreCompletoReportante = $primerReportante->persona->nombreCompleto();
        } else {
            return response()->json('No hay reportantes asociados.');
        }

        if (!$primerReportante->persona->telefonos->first()) {
            $telefonoReportante = 'Número no disponible';

        } else {
            $telefonoReportante = $primerReportante->persona->telefonos->first();
        }

        $folio = Folio::where('reporte_id', $reporte->id)
            ->where('persona_id', $desaparecido->persona->id)
            ->first();
        $numerooficio = str_pad($desaparecidoId, 5, '0', STR_PAD_LEFT);
        $fecha = now()->locale('es')->isoFormat('D [de] MMMM [del] YYYY');
        $year = now()->locale('es')->isoFormat('YYYY');
        $nombreservenvia = 'Mtra. Silveria Morales Solano';
        $nombrecompletodes = $desaparecido->persona->nombreCompleto();
        $fechaDesaparicion = 'PENDIENTE';
        $nombreservpubcebv = 'Dr. Evaristo Mendoza Amaro';
        $logueado = 'Angel Daniel Luna de la Luz del Cielo'; // Usuario logueado
        $iniciales = $desaparecido->persona->inicialesNombresApellidos($logueado);
        $lugardesaparicion = $desaparecido->reporte->hechosDesaparicion->sitio_id ?? 'Lugar no disponible';
        $casoformato = 'PENDIENTE';

        return Pdf::loadView("reportes.documentos.oficio-para-fiscalia", [
            'numeroOficio' => $numerooficio,
            'year' => $year,
            'folio' => $folio,
            'fecha' => $fecha,
            'nombreServPubEnv' => $nombreservenvia,
            'nombreCompleto' => $nombrecompletodes,
            'lugarDesaparicion' => $lugardesaparicion,
            'fechaDesaparicion' => $fechaDesaparicion,
            'numeroReporte' => $telefonoReportante,
            'nombreReportante' => $nombreCompletoReportante,
            'casoFormato' => $casoformato,
            'nombreServPublico' => $nombreservpubcebv,
            'iniciales' => $iniciales,
        ])->stream();
    }

    public function oficioparassa(string $desaparecidoId)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecidoId);
        $reporte = $desaparecido->reporte;
        $folio = Folio::where('reporte_id', $reporte->id)
            ->where('persona_id', $desaparecido->persona->id)
            ->first();

        if ($desaparecido->persona->edadAnhos() >= 18) {
            $edad = ',';
        } else {
            $edad = ',7,8,9,10,12,';
        }

        $numerooficio = str_pad($desaparecidoId, 5, '0', STR_PAD_LEFT);
        $fecha = now()->locale('es')->isoFormat('D [de] MMMM [del] YYYY');
        $year = now()->locale('es')->isoFormat('YYYY');
        $nombreservenvia = 'Dra. Guadalupe Díaz del Castillo Flores';
        $firmaporausencia = 'PENDIENTE';
        $nombrecompleto = $desaparecido->persona->nombreCompleto();
        $fechaDesaparicion = 'PENDIENTE';
        $nombreservpubcebv = 'Mtra. Fernanda Isabel Figueroa Cruz';
        $logueado = 'Angel Daniel Luna de la Luz del Cielo'; // Usuario logueado
        $iniciales = $desaparecido->persona->inicialesNombresApellidos($logueado);

        // Buscar si existe algún documento con tipo 'CarpetaInvestigacion'
        $documentoCarpeta = $desaparecido->documentosLegales->firstWhere('tipo_documento', 'CarpetaInvestigacion');

        //TODO: HACER DINÁMICO LO QUE VAS DESPUÉS DE 'número'
        if ($documentoCarpeta) {
            $carpeta = 'recibió  la carpeta de investigación número FEADPD/ZS/021/2021';
            $carpeta1 = 'VIII';
        } else {
            $carpeta = '';
            $carpeta1 = '';

        }

        $lugardesaparicion = $desaparecido->reporte->hechosDesaparicion->sitio_id ?? 'Lugar no disponible';

        if ($desaparecido->persona->sexo->nombre == 'Mujer') {
            $sexo = 'capítulo 1 numeral 6 inciso XIV del Protocolo de Atención, Reacción y Coordinación entre Autoridades Federales,
            Estatales y Municipales en Caso de Desaparición de Mujeres, Adolescentes y Niñas para el Estado de Veracruz de Ignacio de
            la Llave, (Protocolo Alba) publicado en la Gaceta Oficial Extraordinaria número 480 del 30 Nov. 2018, ';
        } else {
            $sexo = '';
        }

        $mediodifusion = 'PENDIENTE';

        return Pdf::loadView("reportes.documentos.oficio-para-ssa", [
            'numerooficio' => $numerooficio,
            'year' => $year,
            'folio' => $folio,
            'fecha' => $fecha,
            'edad' => $edad,
            'nombreServidorPublicEnv' => $nombreservenvia,
            'firmaAusencia' => $firmaporausencia,
            'sexo' => $sexo,
            'carpeta' => $carpeta,
            'nombrecompleto' => $nombrecompleto,
            'fechaDesaparicion' => $fechaDesaparicion,
            'lugarDesaparicion' => $lugardesaparicion,
            'medioDifusion' => $mediodifusion,
            'carpeta1' => $carpeta1,
            'nombreServidorPublico' => $nombreservpubcebv,
            'iniciales' => $iniciales,
        ])->stream();
    }

    public function fichaDatos(string $desaparecido_id)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecido_id);
        $reporte = Reporte::findOrFail($desaparecido->reporte->id);
        $reportante = Reportante::findOrFail($reporte->reportantes->first()->id);

        return Pdf::loadView('reportes.documentos.ficha-datos', [
            "reportante" => $reportante,
            "desaparecido" => $desaparecido,
        ])->stream("nombre.pdf");
    }
}
