<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CejaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        "persona_id"=>$this->persona_id,
        "tipoCeja_id"=>$this->tipoCeja_id,
        "modificacionCeja"=>$this->modificacionCeja
    }
}
