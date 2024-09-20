<?php

namespace App\Http\Resources;

use App\Models\DesaparicionForzada;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin DesaparicionForzada */
class DesaparicionForzadaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'desaparecio_autoridad' => $this->desaparecio_autoridad,
            'autoridad' => CatalogoResource::make($this->autoridad),
            'descripcion_autoridad' => $this->descripcion_autoridad,
            'desaparecio_particular' => $this->desaparecio_particular,
            'particular' => CatalogoResource::make($this->particular),
            'descripcion_particular' => $this->descripcion_particular,
            'metodo_captura' => CatalogoResource::make($this->metodoCaptura),
            'descripcion_metodo_captura' => $this->descripcion_metodo_captura,
            'medio_captura' => CatalogoResource::make($this->medioCaptura),
            'descripcion_medio_captura' => $this->descripcion_medio_captura,
            'detencion_previa_extorsion' => $this->detencion_previa_extorsion,
            'descripcion_detencion_previa_extorsion' => $this->descripcion_detencion_previa_extorsion,
            'ha_sido_avistado' => $this->ha_sido_avistado,
            'donde_ha_sido_avistado' => $this->donde_ha_sido_avistado,
            'delitos_desaparicion' => $this->delitos_desaparicion,
            'descripcion_delitos_desaparicion' => $this->descripcion_delitos_desaparicion,
            'descripcion_grupo_perpetrador' => $this->descripcion_grupo_perpetrador,
        ];
    }
}
