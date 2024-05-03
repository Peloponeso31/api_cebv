<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CaracteristicasFisicasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "persona_id"=>$this->persona,
            "color_ojos"=>$this->color_ojos->color,
            "tamano_ojos"=>$this->tamano_ojos->tamano,
            "color_cabello"=>$this->color_cabello->colorcabellos,
            "color_piel"=>$this->color_piel->colorpiel,
            "tipo_cabello"=>$this->tipo_cabello->tipocabello,
            "tipo_labios"=>$this->tipo_labios->tipolabios,
            "tipo_nariz"=>$this->tipo_nariz->tiponariz,
            "tipo_orejas"=>$this->tamano_orejas->tamanoorejas,
            "complexion"=>$this->complexion->complexion,
            "estatura"=>$this->estatura->estatura,
        ];
    }
}
