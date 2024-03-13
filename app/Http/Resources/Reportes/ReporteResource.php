<?php

namespace App\Http\Resources\Reportes;

use App\Http\Resources\PersonaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Reportes\Reporte */
class ReporteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'area_id' => $this->area_id,
            'zona_estado' => $this->zona_estado,
            'medio_id' => $this->medio_id,
            'tipo_desaparicon' => $this->tipo_desaparicon,
            'estatus' => $this->estatus,
            'fecha_desaparicion' => $this->fecha_desaparicion,
            'fecha_percato' => $this->fecha_percato,
            'folio' => $this->folio,
            'reportante' => PersonaResource::collection($this->personas()->wherePivot('tipo_relacion', 'Reportante')->get()),
            'desaparecido' => PersonaResource::collection($this->personas()->wherePivot('tipo_relacion', 'Desaparecido')->get()),
        ];
    }
}
