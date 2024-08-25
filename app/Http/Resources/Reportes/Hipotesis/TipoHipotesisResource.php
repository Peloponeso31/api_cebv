<?php

namespace App\Http\Resources\Reportes\Hipotesis;

use App\Http\Resources\CatalogoResource;
use App\Models\Reportes\Hipotesis\TipoHipotesis;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin TipoHipotesis */
class TipoHipotesisResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'abreviatura' => $this->abreviatura,
            'descripcion' => $this->descripcion,
            'circunstancia' => CatalogoResource::make($this->circunstancia),
        ];
    }
}
