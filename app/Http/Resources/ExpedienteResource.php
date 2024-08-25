<?php

namespace App\Http\Resources;

use App\Http\Resources\Personas\PersonaResource;
use App\Models\Expediente;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Expediente */
class ExpedienteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tipo' => $this->tipo,
            'reporte_id' => $this->reporte_id,
            'persona' => PersonaResource::make($this->persona),
            'parentesco' => CatalogoResource::make($this->parentesco),
        ];
    }
}
