<?php

namespace App\Http\Resources;

use App\Http\Resources\Ubicaciones\MunicipioResource;
use App\Models\Localizacion;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Localizacion */
class LocalizacionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'desaparecido_id' => $this->desaparecido_id,
            'sitio' => CatalogoResource::make($this->sitio),
            'area' => CatalogoResource::make($this->area),
            'municipio_localizacion' => MunicipioResource::make($this->municipioLocalizacion),
            'hipotesis_deb' => BasicResource::make($this->hipotesisDeb),
            'fecha_localizacion' => $this->fecha_localizacion,
            'fecha_hallazgo' => $this->fecha_hallazgo,
            'fecha_identificacion_familiar' => $this->fecha_identificacion_familiar,
            'sintesis_localizacion' => $this->sintesis_localizacion,
            'descripcion_condicion_persona' => $this->descripcion_condicion_persona,
            'descripcion_causas_fallecimiento' => $this->descripcion_causas_fallecimiento,
        ];
    }
}
