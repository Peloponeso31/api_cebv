<?php

namespace App\Http\Requests\Reportes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReporteRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'tipo_reporte_id' => ['required', 'exists:tipos_reportes,id', 'numeric'],
                'area_atiende_id' => ['nullable', 'exists:areas,id', 'numeric'],
                'medio_conocimiento_id' => ['nullable', 'exists:medios,id', 'numeric'],
                'estado_id' => ['nullable', 'exists:estados,id', 'numeric'],
                'zona_estado_id' => ['nullable', 'exists:zonas_estados,id', 'numeric'],
                'hipotesis_oficial_id' => ['nullable', 'exists:tipos_hipotesis,id', 'numeric'],
                'esta_terminado' => ['boolean'],
                "declaracion_especial_ausencia" => ['boolean'],
                "accion_urgente" => ['nullable', 'boolean'],
                "dictamen" => ['nullable', 'boolean'],
                "ci_nivel_federal" => ['nullable', 'boolean'],
                "otro_derecho_humano" => ['nullable', 'string'],
                'tipo_desaparicion' => ['nullable', 'string', Rule::in('U', 'M'), 'max:1'],
                'fecha_localizacion' => ['nullable', 'date'],
                'sintesis_localizacion' => ['nullable', 'string'],
            ],
            default => [
                'tipo_reporte_id' => ['sometimes', 'exists:tipos_reportes,id', 'numeric'],
                'area_atiende_id' => ['sometimes', 'exists:areas,id', 'numeric'],
                'medio_conocimiento_id' => ['sometimes', 'exists:medios,id', 'numeric'],
                'estado_id' => ['nullable', 'exists:estados,id', 'numeric'],
                'zona_estado_id' => ['sometimes', 'exists:zonas_estados,id', 'numeric'],
                "declaracion_especial_ausencia" => ['boolean'],
                "accion_urgente" => ['nullable', 'boolean'],
                "dictamen" => ['nullable', 'boolean'],
                "ci_nivel_federal" => ['nullable', 'boolean'],
                "otro_derecho_humano" => ['nullable', 'string'],
                'hipotesis_oficial_id' => ['sometimes', 'exists:tipos_hipotesis,id', 'numeric'],
                'esta_terminado' => ['sometimes', 'boolean'],
                'tipo_desaparicion' => ['sometimes', 'string', Rule::in('U', 'M'), 'max:1'],
                'fecha_localizacion' => ['sometimes', 'date'],
                'sintesis_localizacion' => ['sometimes', 'string'],
            ],
        };
    }
}
