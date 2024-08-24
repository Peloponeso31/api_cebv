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
            "persona_id" => $this->persona_id,
            "cantidad" => $this->cantidad,
            "descripcion" => $this->descripcion,
            "foto" => $this->foto,
            "region_cuerpo" => RegionCuerpoResource::make($this->region_cuerpo),
            "vista"=> VistaResource::make($this->vista),
            "lado"=> LadoResource::make($this->lado),
            "tipo"=> TipoResource::make($this->tipo),
            //"region_cuerpo_rnpdno" => $this->region_cuerpo_rnpdno->nombre,
        ];
    }
}
