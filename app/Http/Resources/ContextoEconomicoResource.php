<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContextoEconomicoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "empresa" => $this->empresa,
            "puesto" => $this->puesto,
            "fecha_ingreso" => $this->fecha_ingreso,
            "relacion_colegas" => $this->relacion,
            "conflictos_trabajo" => $this->conflictos_trabajo,
            "cambiosFinanzas" => $this->cambiosFinanzas,
            "deudas" => $this->deudas,
            "actividadesExtralaborales" => $this->actividadesExtralaborales,
            "emprendimientos" => $this->emprendimientos,
            "saludMental" => $this->saludMental,
            "ausenciaPrevia" => $this-> ausenciaPrevia,
            "contactosRelevantes" => $this-> contactosRelevantes,
            "beneficios" => $this-> beneficios,
            "cambiosBeneficios" => $this-> cambiosBeneficios,
            "ultimoContactoTrabajo" => $this-> ultimoContacto,
            "sindicato" => $this-> sindicato,
            "fecha_ingreso_sindicato" => $this-> fecha_ingreso_sindicato,
            "idSindicato" => $this-> idSindicato,
            "posicionSindicato" => $this-> posicionSindicato,
            "participacion" => $this->participacion,
            "relacion_sindicato" => $this->relacion,
            "conflictos_sindicato" => $this->conflictos_sindicato,
            "desacuerdos" => $this->desacuerdos,
            "amenazasIntimidacion" => $this->amenazasIntimidacion,
            "ult_cont_sindi" => $this->ult_cont_sindi
        ];
    }
}
