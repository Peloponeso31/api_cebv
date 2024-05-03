<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PabellonAuricularResource extends JsonResource
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
        "tipoPabellonAuricular_id"=>$this->tipoPabellonAuricular_id,
        "modificacionPabellonAuricular_id"=>$this->modificacionPabellonAuricular_id,
        "cirugiasPabellonAuricular"=>$this->cirugiasPabellonAuricular
    ];
    }
}
