<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VelloFacialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        "persona_id"=>$this->persona_id,
        "regionVellofacial_id"=>$this->regionVellofacial_id,
        "corteVellofacial_id"=>$this->corteVellofacial_id,
        "colorVellofacial_id"=>$this->colorVellofacial_id,
        "volumenVellofacial_id"=>$this->volumenVellofacial_id,
        "modificacionVellofacial"=>$this->modificacionVellofacial
        ];
    }
}
