<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContextoFamiliarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'persona_id'=> $this -> persona_id,
            "personas_vive"=> $this-> personas_vive,
            "hijos"=> $this-> hijos,
            "familiar_cercano"=> $this-> familiar_cercano,
            "familiar_violencia" => $this-> familiar_violencia
        ];
    }
}
