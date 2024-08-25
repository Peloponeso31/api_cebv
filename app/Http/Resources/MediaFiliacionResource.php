<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaFiliacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "persona_id" => $this->persona_id,
            "estatura" => $this->estatura,
            "peso" => $this->peso,
            "complexion" => CatalogoResource::make($this->complexion),
            "color_piel" => CatalogoResource::make($this->colorPiel),
            "color_ojos" => CatalogoResource::make($this->colorOjos),
            "color_cabello" => CatalogoResource::make($this->colorCabello),
            "tamano_cabello" => CatalogoResource::make($this->tamanoCabello),
            "tipo_cabello" => CatalogoResource::make($this->tipoCabello),
        ];
    }
}
