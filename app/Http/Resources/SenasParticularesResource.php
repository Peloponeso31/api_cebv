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
            'id' => $this->id,
            "persona_id" => $this->persona,
            "region_cuerpo" => $this->region_cuerpo->nombre,
            //"region_cuerpo_rnpdno" => $this->region_cuerpo_rnpdno->nombre,
            "vista"=> $this->vista->nombre,
            "lado"=> $this->lado->nombre,
            "tipo"=> $this->tipo->nombre,
            "cantidad" => $this->cantidad,
            "descripcion" => $this->descripcion,
            "foto" => $this->foto
        ];
    }
}
