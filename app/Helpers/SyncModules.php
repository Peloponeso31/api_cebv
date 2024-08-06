<?php

namespace App\Helpers;

use App\Http\Requests\ReporteTotalRequest;
use App\Models\ControlOgpi;

class SyncModules
{
    public function ControlOgpi($reporteId, ReporteTotalRequest $request): void
    {
        if (!is_int($reporteId) || $reporteId == null) return;

        ControlOgpi::updateOrCreate([
            'id' => $request->control_ogpi['id'] ?? null,
            'reporte_id' => $reporteId,
        ], [
            'fecha_codificacion' => $request->control_ogpi['fecha_codificacion'] ?? null,
            'nombre_codificador' => $request->control_ogpi['nombre_codificador'] ?? null,
            'observaciones' => $request->control_ogpi['observaciones'] ?? null,
            'numero_tarjeta' => $request->control_ogpi['numero_tarjeta'] ?? null,
        ]);
    }
}
