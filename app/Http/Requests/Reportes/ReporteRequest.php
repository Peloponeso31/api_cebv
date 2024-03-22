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
                'tipo_reporte_id' => ['required', 'exists:tipos_reportes,id', 'integer'],
                'area_atiende_id' => ['nullable', 'exists:areas,id', 'integer'],
                'medio_conocimiento_id' => ['nullable', 'exists:medios,id', 'integer'],
                'zona_estado_id' => ['nullable', 'exists:zonas_estados,id', 'integer'],
                'hipotesis_oficial_id' => ['nullable', 'exists:tipos_hipotesis,id', 'integer'],
                'tipo_desaparicion' => ['required', 'string', Rule::in('U', 'M'), 'max:1'],
                'fecha_localizacion' => ['nullable', 'date'],
                'sintesis_localizacion' => ['nullable', 'string'],
                'clasificacion_persona' => ['nullable', 'string'],
            ],
            default => [
                'tipo_reporte_id' => ['sometimes', 'exists:tipos_reportes,id', 'integer'],
                'area_atiende_id' => ['sometimes', 'nullable', 'exists:areas,id', 'integer'],
                'medio_conocimiento_id' => ['sometimes', 'nullable', 'exists:medios,id', 'integer'],
                'zona_estado_id' => ['sometimes', 'nullable', 'exists:zonas_estados,id', 'integer'],
                'hipotesis_oficial_id' => ['sometimes', 'nullable', 'exists:tipos_hipotesis,id', 'integer'],
                'tipo_desaparicion' => ['sometimes', 'string', Rule::in('U', 'M'), 'max:1'],
                'fecha_localizacion' => ['sometimes', 'nullable', 'date'],
                'sintesis_localizacion' => ['sometimes', 'nullable', 'string'],
                'clasificacion_persona' => ['sometimes', 'nullable', 'string'],
            ],
        };
    }
}
