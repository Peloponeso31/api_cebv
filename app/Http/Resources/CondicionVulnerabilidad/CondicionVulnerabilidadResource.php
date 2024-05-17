<?php

namespace App\Http\Resources\CondicionVulnerabilidad;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CondicionVulnerabilidadResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            "tipo_sangre_id" => $this-> tipo_sangre_id,
            "condicion" => $this-> condicion,
            "tratamiento" => $this-> tratamiento,
            "naturaleza" => $this-> naturaleza,
            "condicion_actualmente" => $this-> condicion_actualmente,
            "pertenencia_g_e" => $this-> pertenencia_g_e,
            "enfoque_diferenciado" => $this-> enfoque_diferenciado,
            "caracteristicas_vulnerabilidad" => $this-> caracteristicas_vulnerabilidad,
            "info_localizacion" => $this-> info_localizacion,
            "embarazo" => $this-> embarazo,
            "meses_embarazo" => $this-> meses_embarazo,
        ];
    }
}
