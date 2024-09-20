<?php

namespace App\Http\Resources;

use App\Models\Salud;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Salud */
class SaludResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'tipo_sangre' => CatalogoResource::make($this->tipoSangre),
            'complexion' => CatalogoResource::make($this->complexion),
            'color_piel' => CatalogoResource::make($this->colorPiel),
            'forma_cara' => CatalogoResource::make($this->formaCara),
            'estatura_centimetros' => $this->estatura_centimetros,
            'peso_kilogramos' => $this->peso_kilogramos,
            'factor_rhesus' => $this->factor_rhesus,
        ];
    }
}
