<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SenasParticularesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "region_cuerpo" => $this->region_cuerpo->nombre,
            "region_cuerpo_rnpdno" => $this->region_cuerpo_rnpdno->nombre,
            "descripcion" => $this->descripcion,
            "foto" => $this->foto
        ];
    }
}
