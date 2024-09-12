<?php

namespace App\Http\Controllers;

use App\Helpers\ArrayHelpers;
use App\Helpers\JsonAttributes as A;
use App\Helpers\SyncModules;
use App\Http\Requests\ReporteTotalRequest;
use App\Http\Resources\Reportes\ReporteResource;
use App\Models\Catalogos\PrendaVestir;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\DocumentoLegal;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Reportes\Reporte;
use Illuminate\Support\Facades\Log;

class SyncReporteController extends Controller
{
    protected SyncModules $sync;

    function __construct(SyncModules $sync)
    {
        $this->sync = $sync;
    }

    public function actualizarReporteCascade(ReporteTotalRequest $request)
    {
        $data = $request->toArray();

        // TODO: Mover todo a SyncModules
        if (!isset($data[A::EstaTerminado])) {
            /* 'esta_terminado' no puede ser null */
            $data[A::EstaTerminado] = false;
        }

        $reporteId = ArrayHelpers::asyncHandler(new Reporte, $data, config('patterns.reporte'))->getAttribute('id');

        Log::info("Reporte: " . json_encode($data));

        if ($request->has(A::Reportantes)) {
            Log::info("Reportantes: " . json_encode($request->reportantes));
            foreach ($request->reportantes as $reportante) {
                $reportante = ArrayHelpers::setArrayValue($reportante, A::ReporteId, $reporteId);

                $reportante[A::Persona] = $this->sync->Persona($reportante[A::Persona]);

                ArrayHelpers::asyncHandler(new Reportante, $reportante, config('patterns.reportante'));
            }
        }

        if ($request->has(A::Desaparecidos)) {
            Log::info("Desaparecidos: " . json_encode($request->desaparecidos));
            foreach ($request->desaparecidos as $desaparecido) {
                $desaparecido = ArrayHelpers::setArrayValue($desaparecido, A::ReporteId, $reporteId);

                $desaparecido['persona'] = $this->sync->Persona($desaparecido['persona']);

                $desaparecidoId = ArrayHelpers::asyncHandler(new Desaparecido, $desaparecido, config('patterns.desaparecido'))
                    ->getAttribute('id');

                if (isset($desaparecido[A::PrendasVestir])) {
                    $data = $desaparecido[A::PrendasVestir];
                    $dataModificada = [];

                    foreach ($data as $item) {
                        $item[A::DesaparecidoId] = $desaparecidoId;
                        $dataModificada[] = $item;
                    }

                    ArrayHelpers::syncList(
                        new PrendaVestir,
                        $dataModificada,
                        A::DesaparecidoId,
                        $desaparecidoId,
                        config('patterns.prenda_vestir'));

                }

                if (isset($desaparecido["documentos_legales"])) {
                    $data = $desaparecido["documentos_legales"];
                    $dataModificada = [];

                    foreach ($data as $item) {
                        $item[A::DesaparecidoId] = $desaparecidoId;
                        $dataModificada[] = $item;
                    }

                    ArrayHelpers::syncList(
                        new DocumentoLegal,
                        $dataModificada,
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
