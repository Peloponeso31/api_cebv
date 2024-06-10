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
            "color_cabello"=>$this->color_cabello->color,
            "color_piel"=>$this->color_piel->colorpiel,
            "tipo_cabello"=>$this->tipo_cabello->tipo,
            "tipo_labios"=>$this->tipo_labios->tipo,
            "tipo_nariz"=>$this->tipo_nariz->tipo,
            "tipo_orejas"=>$this->tamano_orejas->tamano,
            "complexion"=>$this->complexion->complexion,
            "estatura"=>$this->estatura->estatura_cm,

            "barba"=>$this->barba->barba,
            "bigote"=>$this->bigote->bigote,
            "calvicie"=>$this->calvicie->calvicie,
            "especificacion_barba"=>$this->especificacion_barba->especificacion,
            "especificacion_bigote"=>$this->especificacion_bigote->especificacion,
            "especificacion_cabello"=>$this->especificacion_cabello->especificacion,
            "especificacion_nariz"=>$this->especificacion_nariz->especificacion,
            "especificacion_ojos"=>$this->especificacion_ojos->especificacion,
            "especificacion_oreja"=>$this->especificacion_oreja->especificacion,
            "forma_cara"=>$this->forma_cara->forma,
            "forma_ojos"=>$this->forma_ojos->forma,
            "forma_oreja"=>$this->forma_oreja->forma,
            "peso"=>$this->peso->peso_kg,
            "tamano_boca"=>$this->tamano_boca->tamano,
            "tamano_cabello"=>$this->tamano_cabello->tamano,
            "tipo_ceja"=>$this->tipo_ceja->tipo,
        ];
    }
}
