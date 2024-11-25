<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace App\Http\Controllers;

use App\Enums\TipoDocumentoLegal as TipoDocumento;
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
        $folio = Folio::getFolio($reporte->id, $desaparecido->persona->id);
        $folioLimpio = StringHelper::removeSlashes($folio?->folio_cebv) ?? $desaparecido->persona->nombreCompleto();

        $fechaInicial = $reporte->getFechaCreacion();

        if (isset($folio->created_at))
            $fechaFinal = $folio->getFechaCreacion();
        else
            $fechaFinal = $reporte->getFechaActualizacion();

        return Pdf::loadView("reportes.documentos.informe-inicio", [
            'desaparecido' => $desaparecido,
            'reporte' => $reporte,
            'reportante' => $reporte->reportantes->first(),
            'folio' => $folio,
            'fechaInicial' => $fechaInicial,
            'fechaFinal' => $fechaFinal,
        ])->stream("Informe de Inicio " . $folioLimpio . ".pdf");
    }

    public function oficioC4(string $desaparecidoId)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecidoId);
        $reporte = $desaparecido->reporte;
        $reportante = $reporte->reportantes->first();
        $folio = Folio::getFolio($reporte->id, $desaparecido->persona->id);
        $folioLimpio = StringHelper::removeSlashes($folio?->folio_cebv) ?? $desaparecido->persona->nombreCompleto();

        $fecha = $reporte->getFechaCreacion();
        $fechaDesaparicion = $reporte->hechosDesaparicion?->getSoloFechaDesaparicion() ?? 'Fecha no disponible';
        $lugarDesaparicion = $reporte->hechosDesaparicion?->getMunicipioDesaparicion() ?? 'Lugar no disponible';

        $numeroRastreo = $reportante?->persona?->getTelefono()?->numero ?? 'Número no disponible';
        $medioDifusion = $reporte->generacionDocumento?->medioDifusion;

        $numeroCarpeta = $desaparecido?->documentosLegales
            ?->firstWhere('tipo_documento', TipoDocumento::CarpetaInvestigacion)
            ?->numero_documento;

        $firmaAusencia = $reporte->generacionDocumento?->firma_ausencia;

        $fundamentoMujeres72h = $reporte->hechosDesaparicion?->desaparicionMujerMenor72h($desaparecido?->persona?->sexo?->id);

        return Pdf::loadView("reportes.documentos.oficio-c4", [
            'desaparecido' => $desaparecido,
            'folio' => $folio,
            'fecha' => $fecha,
            'fechaDesaparicion' => $fechaDesaparicion,
            'lugarDesaparicion' => $lugarDesaparicion,
            'numeroRastreo' => $numeroRastreo,
            'medioDifusion' => $medioDifusion,
            'numeroCarpeta' => $numeroCarpeta,
            'firmaAusencia' => $firmaAusencia,
            'fundamentoMujeres72h' => $fundamentoMujeres72h,
        ])->stream("Oficio para C4 " . $folioLimpio . ".pdf");
    }

    public function oficioCei(string $desaparecidoId)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecidoId);
        $reporte = $desaparecido->reporte;
        $reportante = $reporte->reportantes->first();
        $folio = Folio::getFolio($reporte->id, $desaparecido->persona->id);
        $folioLimpio = StringHelper::removeSlashes($folio?->folio_cebv) ?? $desaparecido->persona->nombreCompleto();

        $fecha = $reporte->getFechaCreacion();
        $fechaDesaparicion = $reporte->hechosDesaparicion?->getSoloFechaDesaparicion() ?? 'Fecha no disponible';
        $lugarDesaparicion = $reporte->hechosDesaparicion?->getMunicipioDesaparicion() ?? 'Lugar no disponible';

        $numeroRastreo = $reportante?->persona?->getTelefono()?->numero ?? 'Número no disponible';
        $medioDifusion = $reporte->generacionDocumento?->medioDifusion;

        $numeroCarpeta = $desaparecido?->documentosLegales
            ?->firstWhere('tipo_documento', TipoDocumento::CarpetaInvestigacion)
            ?->numero_documento;

        $firmaAusencia = $reporte->generacionDocumento?->firma_ausencia;

        $fundamentoMujeres72h = $reporte->hechosDesaparicion?->desaparicionMujerMenor72h($desaparecido?->persona?->sexo?->id);

        return Pdf::loadView("reportes.documentos.oficio-cei", [
            'desaparecido' => $desaparecido,
            'folio' => $folio,
            'fecha' => $fecha,
            'fechaDesaparicion' => $fechaDesaparicion,
            'lugarDesaparicion' => $lugarDesaparicion,
            'numeroRastreo' => $numeroRastreo,
            'medioDifusion' => $medioDifusion,
            'numeroCarpeta' => $numeroCarpeta,
            'firmaAusencia' => $firmaAusencia,
            'fundamentoMujeres72h' => $fundamentoMujeres72h,
        ])->stream("Oficio para CEI " . $folioLimpio . ".pdf");

    }

    public function oficioFiscalia(string $desaparecidoId)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecidoId);
        $reporte = $desaparecido->reporte;
        $reportante = $reporte->reportantes->first();
        $folio = Folio::getFolio($reporte->id, $desaparecido->persona->id);
        $folioLimpio = StringHelper::removeSlashes($folio?->folio_cebv) ?? $desaparecido->persona->nombreCompleto();

        $fecha = $reporte->getFechaCreacion();
        $fechaDesaparicion = $reporte->hechosDesaparicion?->getSoloFechaDesaparicion() ?? 'Fecha no disponible';
        $lugarDesaparicion = $reporte->hechosDesaparicion?->getMunicipioDesaparicion() ?? 'Lugar no disponible';

        $numeroRastreo = $reportante?->persona?->getTelefono()?->numero ?? 'Número no disponible';
        $medioDifusion = $reporte->generacionDocumento?->medioDifusion;

        $numeroCarpeta = $desaparecido?->documentosLegales
            ?->firstWhere('tipo_documento', TipoDocumento::CarpetaInvestigacion)
            ?->numero_documento;

        $firmaAusencia = $reporte->generacionDocumento?->firma_ausencia;

        $fundamentoMujeres72h = $reporte->hechosDesaparicion?->desaparicionMujerMenor72h($desaparecido?->persona?->sexo?->id);

        return Pdf::loadView("reportes.documentos.oficio-fiscalia", [
            'desaparecido' => $desaparecido,
            'folio' => $folio,
            'fecha' => $fecha,
            'fechaDesaparicion' => $fechaDesaparicion,
            'lugarDesaparicion' => $lugarDesaparicion,
            'numeroRastreo' => $numeroRastreo,
            'medioDifusion' => $medioDifusion,
            'numeroCarpeta' => $numeroCarpeta,
            'firmaAusencia' => $firmaAusencia,
            'fundamentoMujeres72h' => $fundamentoMujeres72h,
        ])->stream("Oficio para Fiscalía " . $folioLimpio . ".pdf");
    }

    public function oficioSsa(string $desaparecidoId)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecidoId);
        $reporte = $desaparecido->reporte;
        $reportante = $reporte->reportantes->first();
        $folio = Folio::getFolio($reporte->id, $desaparecido->persona->id);
        $folioLimpio = StringHelper::removeSlashes($folio?->folio_cebv) ?? $desaparecido->persona->nombreCompleto();

        $fecha = $reporte->getFechaCreacion();
        $fechaDesaparicion = $reporte->hechosDesaparicion?->getSoloFechaDesaparicion() ?? 'Fecha no disponible';
        $lugarDesaparicion = $reporte->hechosDesaparicion?->getMunicipioDesaparicion() ?? 'Lugar no disponible';

        $numeroRastreo = $reportante?->persona?->getTelefono()?->numero ?? 'Número no disponible';
        $medioDifusion = $reporte->generacionDocumento?->medioDifusion;

        $numeroCarpeta = $desaparecido?->documentosLegales
            ?->firstWhere('tipo_documento', TipoDocumento::CarpetaInvestigacion)
            ?->numero_documento;

        $firmaAusencia = $reporte->generacionDocumento?->firma_ausencia;

        $fundamentoMujeres72h = $reporte->hechosDesaparicion?->desaparicionMujerMenor72h($desaparecido?->persona?->sexo?->id);

        return Pdf::loadView("reportes.documentos.oficio-ssa", [
            'desaparecido' => $desaparecido,
            'folio' => $folio,
            'fecha' => $fecha,
            'fechaDesaparicion' => $fechaDesaparicion,
            'lugarDesaparicion' => $lugarDesaparicion,
            'numeroRastreo' => $numeroRastreo,
            'medioDifusion' => $medioDifusion,
            'numeroCarpeta' => $numeroCarpeta,
            'firmaAusencia' => $firmaAusencia,
            'fundamentoMujeres72h' => $fundamentoMujeres72h,
        ])->stream("Oficio para SSA " . $folioLimpio . ".pdf");
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
