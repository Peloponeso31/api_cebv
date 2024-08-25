<?php

namespace App\Http\Resources;

use App\Models\MediaFiliacionComplementaria;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin MediaFiliacionComplementaria */
class MediaFiliacionComplementariaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tiene_ausencia_dental' => $this->tiene_ausencia_dental,
            'descripcion_ausencia_dental' => $this->descripcion_ausencia_dental,
            'tiene_tratamiento_dental' => $this->tiene_tratamiento_dental,
            'descripcion_tratamiento_dental' => $this->descripcion_tratamiento_dental,
            'tipo_menton' => CatalogoResource::make($this->tipoMenton),
            'especificaciones_menton' => $this->especificaciones_menton,
            'observaciones_generales' => $this->observaciones_generales,
        ];
    }
}
