<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReporteCompactedResource extends JsonResource
{
    /**
     * Resource para visualizador de reportes, se paginara.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'medio_conocimiento_generico' => $this->medioConocimiento->tipoMedio->nombre ?? null,
            'medio_conocimiento_especifico' => $this->medioConocimiento->nombre ?? null,
            'tipo_reporte' => $this->tipoReporte->nombre ?? null,
            'fecha_creacion' => $this->fecha_creacion,
            'estado' => $this->estado->nombre ?? null,
            'abreviatura_estado_cebv' => $this->estado->abreviatura_cebv ?? null,
            'tipo_medio' => $this->tipoMedio->nombre ?? null,
            'desaparecidos' => DesaparecidoCompactedResource::collection($this->desaparecidos),
        ];
    }
}
