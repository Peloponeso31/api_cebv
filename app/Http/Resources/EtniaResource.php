<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EtniaResource extends JsonResource
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
            "religion"=>$this->religion->religion,
            "lengua"=>$this->lengua->lengua,
            "grupo_etnico"=>$this->grupo_etnico->grupoetnico,
            "vestimenta"=>$this->vestimenta->vestimenta,
            "ascendencia"=>$this->ascendencia->ascendencia,
            
        ];
    }
}
