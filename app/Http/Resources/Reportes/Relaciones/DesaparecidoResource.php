<?php

namespace App\Http\Resources\Reportes\Relaciones;

use App\Http\Resources\BasicResource;
use App\Http\Resources\FolioResource;
use App\Http\Resources\LocalizacionResource;
use App\Http\Resources\Personas\PersonaResource;
use App\Http\Resources\PrendaVestirResource;
use App\Models\Reportes\Relaciones\Desaparecido;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Desaparecido */
class DesaparecidoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            /**
             * Atributos propios de desaparecido
             */
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'persona' => PersonaResource::make($this->persona),
            'estatus_preliminar' => BasicResource::make($this->estatusPreliminar),
            'estatus_formalizado' => BasicResource::make($this->estatusFormalizado),
            'clasificacion_persona' => $this->clasificacion_persona,
            'url_boletin' => $this->url_boletin,
            'declaracion_especial_ausencia' => $this->declaracion_especial_ausencia,
            'accion_urgente' => $this->accion_urgente,
            'dictamen' => $this->dictamen,
            'ci_nivel_federal' => $this->ci_nivel_federal,
            'otro_derecho_humano' => $this->otro_derecho_humano,
            'fecha_nacimiento_aproximada' => $this->fecha_nacimiento_aproximada,
            'fecha_nacimiento_cebv' => $this->fecha_nacimiento_cebv,
            'observaciones_fecha_nacimiento' => $this->observaciones_fecha_nacimiento,
            'edad_momento_desaparicion_anos' => $this->edad_momento_desaparicion_anos,
            'edad_momento_desaparicion_meses' => $this->edad_momento_desaparicion_meses,
            'edad_momento_desaparicion_dias' => $this->edad_momento_desaparicion_dias,
            'identidad_resguardada' => $this->identidad_resguardada,
            'senas_particulares_boletin' => $this->senas_particulares_boletin,
            'informacion_adicional_boletin' => $this->informacion_adicional_boletin,
            'boletin_img_path' => $this->boletin_img_path,
            'fecha_estatus_preliminar' => $this->fecha_estatus_preliminar,
            'fecha_estatus_formalizado' => $this->fecha_estatus_formalizado,
            'fecha_captura_estatus_formalizado' => $this->fecha_captura_estatus_formalizado,
            'observaciones_actualizacion_estatus' => $this->observaciones_actualizacion_estatus,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            /**
             * Relaciones con desaparecido
             */
            'documentos_legales' => DocumentoLegalResource::collection($this->documentosLegales),
            'folios' => FolioResource::make($this->folio()),
            'prendas_vestir' => PrendaVestirResource::collection($this->prendasVestir),
            'localizacion' => LocalizacionResource::make($this->localizacion),
        ];
    }
}
