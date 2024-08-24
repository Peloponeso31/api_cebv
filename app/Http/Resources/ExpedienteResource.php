<?php

namespace App\Http\Resources;

use App\Http\Resources\Personas\ParentescoResource;
use App\Http\Resources\Personas\PersonaResource;
use App\Http\Resources\Reportes\ReporteResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Expediente */
class ExpedienteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tipo' => $this->tipo,
            'reporte_id' => $this->reporte_id,
            'persona' => new PersonaResource($this->persona),
            'parentesco' => new ParentescoResource($this->parentesco),
        ];
    }
}
