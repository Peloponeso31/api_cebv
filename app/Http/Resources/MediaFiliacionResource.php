<?php

namespace App\Http\Resources;

use App\Models\Catalogos\CaracteristicasFisicas\ColorCabello;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaFiliacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "persona_id" => $this->persona_id,

            // Perfil corporal
            "estatura" => $this->estatura,
            "peso" => $this->peso,
            "complexion" => CatalogoResource::make($this->complexion),
            "color_piel" => CatalogoResource::make($this->colorPiel),
            "forma_cara" => CatalogoResource::make($this->formaCara),

            // Ojos
            "color_ojos" => CatalogoResource::make($this->colorOjos),
            "forma_ojos" => CatalogoResource::make($this->formaOjos),
            "tamano_ojos" => CatalogoResource::make($this->tamanoOjos),
            "observaciones_ojos" => $this->observaciones_ojos,

            // Cabello
            "calvicie" => CatalogoResource::make($this->calvicie),
            "color_cabello" => CatalogoResource::make($this->colorCabello),
            "tamano_cabello" => CatalogoResource::make($this->tamanoCabello),
            "tipo_cabello" => CatalogoResource::make($this->tipoCabello),
            "observaciones_cabello" => $this->observaciones_cabello,

            // Vello facial
            "tipo_ceja" => CatalogoResource::make($this->tipoCeja),
            "bigote" => $this->bigote,
            "barba" => $this->barba,
            "observaciones_cejas" => $this->observaciones_cejas,
            "observaciones_barba" => $this->observaciones_barba,
            "observaciones_bigote" => $this->observaciones_bigote,

            // Nariz
            "tipo_nariz" => CatalogoResource::make($this->tipoNariz),
            "observaciones_nariz" => $this->observaciones_nariz,

            // Boca
            "tamano_boca" => CatalogoResource::make($this->tamanoBoca),
            "tamano_labios" => CatalogoResource::make($this->tamanoLabios),
            "observaciones_boca" => $this->observaciones_boca,

            // Orejas
            "tamano_orejas" => CatalogoResource::make($this->tamanoOrejas),
            "forma_orejas" => CatalogoResource::make($this->formaOrejas),
            "observaciones_oreja" => $this->observaciones_oreja,
        ];
    }
}
