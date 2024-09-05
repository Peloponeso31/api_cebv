<?php

namespace App\Http\Resources;

use App\Http\Resources\Personas\PersonaResource;
use App\Models\Cabello;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Cabello */
class CabelloResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'calvicie' => CatalogoResource::make($this->calvicie),
            'color_cabello' => CatalogoResource::make($this->colorCabello),
            'tamano_cabello' => CatalogoResource::make($this->tamanoCabello),
            'tipo_cabello' => CatalogoResource::make($this->tipoCabello),
            'especificaciones_cabello' => $this->especificaciones_cabello,
        ];
    }
}
