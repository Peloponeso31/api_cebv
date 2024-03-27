<?php

namespace App\Services;

use App\Models\Oficialidades\Folio;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Reporte;
use App\Models\Reportes\TipoReporte;
use App\Models\Serie;
use App\Models\Ubicaciones\ZonaEstado;
use Illuminate\Http\JsonResponse;

class ReporteService
{
    /**
     * @param mixed $id
     * @return JsonResponse
     */
    public function getFolios(mixed $id): JsonResponse
    {
        $reporte = Reporte::findOrFail($id);
        $folios = Folio::where('reporte_id', $reporte->id)->get();

        if ($folios->isEmpty()) {
            return response()->json("No se encontraron folios para el reporte $reporte->id", 404);
        }

        return response()->json([
            'Folios del reporte' => $reporte->id,
            'Folios' => $folios
        ]);
    }

    /**
     * @param mixed $id
     * @param mixed $userId
     * @return JsonResponse
     */
    public function setFolio(mixed $id, mixed $userId): JsonResponse
    {
        $reporte = Reporte::findOrFail($id);
        $desaparecidos = Desaparecido::where('reporte_id', $reporte->id)->get();

        // Registro de los folios asignados
        $foliosAsignados = [];

        // Registro de los folios repetidos
        $foliosRepetidos = [];

        if ($desaparecidos->isEmpty()) {
            return response()->json("Sin personas para asignar folio en el reporte $reporte->id", 404);
        }

        foreach ($desaparecidos as $desaparecido) {
            if (Folio::where('persona_id', $desaparecido->persona_id)->where('reporte_id', $reporte->id)->exists()) {
                $foliosRepetidos[] = "$desaparecido->persona_id";
            } else {
                $foliosAsignados[] = "$desaparecido->persona_id";

                $this->createFolio($userId, $reporte, $desaparecido);
            }
        }

        return response()->json([
            "Se asignaron los folios correctamente para el reporte" => $reporte->id,
            "Folios asignados a personas: " => $foliosAsignados,
            "Folios existentes a personas: " => $foliosRepetidos,
        ]);
    }

    public function createFolio($userId, Reporte $reporte, Desaparecido $desaparecido)
    {
        $tipoReporte = TipoReporte::findOrFail($reporte->tipo_reporte_id);

        $numero = Serie::create(['tipo_reporte_id' => $reporte->tipo_reporte_id]);
        $numeroString = strval($numero->numero);
        $serie = str_pad($numeroString, 5, '0', STR_PAD_LEFT);

        $desaparicion = HechoDesaparicion::where('reporte_id', $reporte->id)->first();
        $fechaDesaparicion = is_null($desaparicion->fecha_desaparicion) ? 'AA' : $desaparicion->fecha_desaparicion->format('y');

        $zonaEstado = ZonaEstado::findOrFail($reporte->zona_estado_id)->abreviatura;

        Folio::create([
            'user_id' => $userId,
            'reporte_id' => $reporte->id,
            'persona_id' => $desaparecido->persona_id,
            'folio_cebv' => [
                'fecha_registro' => $reporte->created_at->format('y'),
                'tipo_reporte' => $tipoReporte->abreviatura,
                'serie' => $serie,
                'tipo_desaparicion' => $reporte->tipo_desaparicion,
                'fecha_desaparicion' => $fechaDesaparicion,
                'zona_estado' => $zonaEstado,
            ]
        ]);

    }
}
