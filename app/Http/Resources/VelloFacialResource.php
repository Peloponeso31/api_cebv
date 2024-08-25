<?php

namespace App\Http\Resources;

use App\Models\VelloFacial;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin VelloFacial */
class VelloFacialResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'cejas_id' => $this->cejas_id,
            'especificaciones_cejas' => $this->especificaciones_cejas,
            'tiene_bigote' => $this->tiene_bigote,
            'especificaciones_bigote' => $this->especificaciones_bigote,
            'tiene_barba' => $this->tiene_barba,
            'especificaciones_barba' => $this->especificaciones_barba,
        ];
    }
}
