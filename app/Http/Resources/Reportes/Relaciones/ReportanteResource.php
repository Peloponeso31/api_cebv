<?php

namespace App\Http\Resources\Reportes\Relaciones;

use App\Http\Resources\CatalogoResource;
use App\Http\Resources\Personas\PersonaResource;
use App\Models\Reportes\Relaciones\Reportante;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Reportante */
class ReportanteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'persona' => PersonaResource::make($this->persona),
            'parentesco' => CatalogoResource::make($this->parentesco),
            'colectivo' => CatalogoResource::make($this->colectivo),
            'denuncia_anonima' => $this->denuncia_anonima,
            'informacion_consentimiento' => $this->informacion_consentimiento,
            'informacion_exclusiva_busqueda' => $this->informacion_exclusiva_busqueda,
            'publicacion_registro_nacional' => $this->publicacion_registro_nacional,
            'publicacion_boletin' => $this->publicacion_boletin,
            'informacion_relevante' => $this->informacion_relevante,
            'pertenencia_colectivo' => $this->pertenencia_colectivo,
            'participacion_previa_busquedas' => $this->participacion_previa_busquedas,
            'descripcion_participacion_busquedas' => $this->descripcion_participacion_busquedas,
            'victima_extorsion_fraude' => $this->victima_extorsion_fraude,
            'descripcion_extorsion_fraude' => $this->descripcion_extorsion_fraude,
            'recibio_amenazas' => $this->recibio_amenazas,
            'descripcion_origen_amenazas' => $this->descripcion_origen_amenazas,
            'edad_estimada_anhos' => $this->edad_estimada_anhos,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
