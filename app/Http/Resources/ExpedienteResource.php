<?php

namespace App\Http\Resources;

use App\Models\Personas\Parentesco;
use App\Models\Reportes\Reporte;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpedienteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->pivot->id,
            'tipo' => $this->pivot->tipo,
            'parentesco' => CatalogoResource::make(Parentesco::find($this->pivot->parentesco_id)),
            'reporte_uno' => ReporteHechoResource::make(Reporte::find($this->pivot->reporte_uno_id)),
            'reporte_dos' => ReporteHechoResource::make(Reporte::find($this->pivot->reporte_dos_id)),
        ];
    }
}
