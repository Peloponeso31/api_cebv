<?php

namespace App\Http\Controllers;

use App\Helpers\ArrayHelpers;
use App\Helpers\JsonAttributes as A;
use App\Http\Requests\ReporteTotalRequest;
use App\Http\Resources\Reportes\ReporteResource;
use App\Models\Catalogos\PrendaVestir;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\DocumentoLegal;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Reportes\Reporte;
use App\Services\SyncPersonaService;
use Illuminate\Support\Facades\Log;

class SyncReporteController extends Controller
{
    protected SyncPersonaService $sync;

    function __construct(SyncPersonaService $sync)
    {
        $this->sync = $sync;
    }

    public function actualizarReporteCascade(ReporteTotalRequest $request)
    {
        $data = $request->toArray();

        if (!isset($data[A::EstaTerminado])) {
            /* El atributo 'esta_terminado' no puede ser null */
            $data[A::EstaTerminado] = false;
        }

        $reporteId = ArrayHelpers::asyncHandler(Reporte::class, $data, config('patterns.reporte'))->getAttribute('id');

        Log::info("Reporte: " . json_encode($data));

        if ($request->has(A::Reportantes)) {
            foreach ($request->reportantes as $reportante) {
                $reportante = ArrayHelpers::setArrayValue($reportante, A::ReporteId, $reporteId);

                $reportante[A::Persona] = $this->sync->Persona($reportante[A::Persona]);

                ArrayHelpers::asyncHandler(Reportante::class, $reportante, config('patterns.reportante'));
            }
        }

        if ($request->has(A::Desaparecidos)) {
            foreach ($request->desaparecidos as $desaparecido) {
                $desaparecido = ArrayHelpers::setArrayValue($desaparecido, A::ReporteId, $reporteId);

                $desaparecido[A::Persona] = $this->sync->Persona($desaparecido[A::Persona]);

                $desaparecidoId = ArrayHelpers::asyncHandler(Desaparecido::class, $desaparecido, config('patterns.desaparecido'))
                    ->getAttribute('id');

                if (isset($desaparecido[A::PrendasVestir])) {
                    $data = ArrayHelpers::setArrayRecursive($desaparecido[A::PrendasVestir], A::DesaparecidoId, $desaparecidoId);

                    ArrayHelpers::syncList(
                        PrendaVestir::class,
                        $data,
                        A::DesaparecidoId,
                        $desaparecidoId,
                        config('patterns.prenda_vestir'));
                }

                if (isset($desaparecido[A::DocumentosLegales])) {
                    $data = ArrayHelpers::setArrayRecursive($desaparecido[A::DocumentosLegales], A::DesaparecidoId, $desaparecidoId);

                    ArrayHelpers::syncList(
                        DocumentoLegal::class,
                        $data,
                        A::DesaparecidoId,
                        $desaparecidoId);
                }
            }
        }

        if ($request->has("hechos_desaparicion") && $request->hechos_desaparicion != null) {
            $this->sync->HechosDesaparicion($reporteId, $request);
        }

        if ($request->has("hipotesis") && $request->hipotesis != null) {
            $this->sync->Hipotesis($reporteId, $request);
        }

        if ($request->has("control_ogpi") && $request->control_ogpi != null) {
            $this->sync->ControlOgpi($reporteId, $request);
        }

        if ($request->has("expedientes") && $request->expedientes != null) {
            $this->sync->Expediente($reporteId, $request);
        }

        if ($request->has("desaparicion_forzada") && $request->desaparicion_forzada != null) {
            $this->sync->DesaparicionForzada($reporteId, $request);
        }

        if ($request->has("perpetradores") && $request->perpetradores != null) {
            $this->sync->Perpetradores($reporteId, $request);
        }

        $reporte = Reporte::find($reporteId);

        return ReporteResource::make($reporte);

    }
}
