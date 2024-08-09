<?php

namespace App\Http\Resources;

use App\Models\Catalogos\CaracteristicasFisicas\ColorCabello;
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
            "complexion" => ComplexionResource::make($this->complexion),
            "color_piel" => ColorPielResource::make($this->colorPiel),
            "color_ojos" => ColorPielResource::make($this->colorOjos),
            "color_cabello" => ColorCabelloResource::make($this->colorCabello),
            "tamano_cabello" => TamanoCabelloResource::make($this->tamanoCabello),
            "tipo_cabello" => TipoCabelloResource::make($this->tipoCabello),
        ];
    }
}
