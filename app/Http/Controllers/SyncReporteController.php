<?php

namespace App\Http\Controllers;

use App\Enums\ForeignKey as FK;
use App\Helpers\ArrayHelpers;
use App\Helpers\SyncModules;
use App\Http\Requests\ReporteTotalRequest;
use App\Http\Resources\Reportes\ReporteResource;
use App\Models\Catalogos\PrendaVestir;
use App\Models\Personas\Persona;
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

    private function getExtension($base64)
    {
        $formatos = [
            "IVBOR" => "png",
            "/9J/4" => "jpg",
            "AAAAF" => "mp4",
            "JVBER" => "pdf",
            "AAABA" => "ico",
            "UMFYI" => "rar",
            "E1XYD" => "rtf",
            "U1PKC" => "txt",
            "77U/M" => "srt",
        ];

        return $formatos[strtoupper($base64)] ?? '';
    }

    public function actualizarReporteCascade(ReporteTotalRequest $request)
    {
        $data = $request->toArray();

        // TODO: Mover todo a SyncModules
        if (!isset($data['esta_terminado'])) {
            /* 'esta_terminado' no puede ser null */
            $data['esta_terminado'] = false;
        }

        $reporteId = ArrayHelpers::asyncHandler(new Reporte, $data, config('patterns.reporte'))->getAttribute('id');

        Log::info("Reporte: " . json_encode($data));

        if ($request->has('reportantes')) {
            foreach ($request->reportantes as $reportante) {
                $reportante = ArrayHelpers::setArrayValue($reportante, FK::ReporteId->value, $reporteId);

                $reportante['persona'] = $this->sync->Persona($reportante['persona']);

                ArrayHelpers::asyncHandler(new Reportante, $reportante, config('patterns.reportante'));
            }
        }

        if ($request->has('desaparecidos')) {
            foreach ($request->desaparecidos as $desaparecido) {
                $desaparecido = ArrayHelpers::setArrayValue($desaparecido, FK::ReporteId->value, $reporteId);

                if (isset($desaparecido['persona'])) {
                    $desaparecido['persona']['id'] = $this->sync->Persona($desaparecido['persona']);
                }

                $desaparecidoUpdated = ArrayHelpers::asyncHandler(new Desaparecido, $desaparecido, config('patterns.desaparecido'));

                if (isset($desaparecido['prendas_de_vestir'])) {
                    $prendas_modified = [];
                    foreach ($desaparecido["prendas_de_vestir"] as $prenda) {
                        $prendas_modified[] = PrendaVestir::updateOrCreate([
                            "id" => $prenda["id"] ?? null,
                            "desaparecido_id" => $prenda["desaparecido_id"] ?? $desaparecidoUpdated->id ?? null,
                        ], [
                            "pertenencia_id" => $prenda["pertenencia"]["id"] ?? null,
                            "color_id" => $prenda["color"]["id"] ?? null,
                            "marca" => $prenda["marca"] ?? null,
                            "descripcion" => $prenda["descripcion"] ?? null,
                        ])->id;
                    }

                }

                if (isset($desaparecido["documentos_legales"]) && $desaparecido["documentos_legales"] != null) {
                    $documentos_modificados = [];
                    foreach ($desaparecido["documentos_legales"] as $documento) {
                        $documento_updated = DocumentoLegal::updateOrCreate([
                            'id' => $documento["id"] ?? null,
                            'desaparecido_id' => $documento["desaparecido_id"] ?? $desaparecidoUpdated["id"] ?? null,
                        ], [
                            'es_oficial' => $documento['es_oficial'],
                            'tipo_documento' => $documento['tipo_documento'],
                            'numero_documento' => $documento['numero_documento'],
                            'donde_radica' => $documento['donde_radica'],
                            'nombre_servidor_publico' => $documento['nombre_servidor_publico'],
                            'fecha_recepcion' => $documento['fecha_recepcion'],
                        ]);
                        array_push($documentos_modificados, $documento_updated->id);
                    }
                    $documentos_eliminables = $desaparecidoUpdated->documentosLegales->except($documentos_modificados);
                    if (count($documentos_eliminables) > 0) {
                        $documentos_eliminables->toQuery()->delete();
                    }
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
