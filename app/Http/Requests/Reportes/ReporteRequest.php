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
                'estado_id' => ['nullable', 'exists:estados,id', 'integer'],
                'zona_estado_id' => ['nullable', 'exists:zonas_estados,id', 'integer'],
                'hipotesis_oficial_id' => ['nullable', 'exists:tipos_hipotesis,id', 'integer'],
                'tipo_desaparicion' => ['nullable', 'string', Rule::in('U', 'M'), 'max:1'],
                'fecha_localizacion' => ['nullable', 'date'],
                'sintesis_localizacion' => ['nullable', 'string'],
            ],
            default => [
                'tipo_reporte_id' => ['sometimes', 'exists:tipos_reportes,id', 'integer'],
                'area_atiende_id' => ['sometimes', 'exists:areas,id', 'integer'],
                'medio_conocimiento_id' => ['sometimes', 'exists:medios,id', 'integer'],
                'estado_id' => ['nullable', 'exists:estados,id', 'integer'],
                'zona_estado_id' => ['sometimes', 'exists:zonas_estados,id', 'integer'],
                'hipotesis_oficial_id' => ['sometimes', 'exists:tipos_hipotesis,id', 'integer'],
                'tipo_desaparicion' => ['sometimes', 'string', Rule::in('U', 'M'), 'max:1'],
                'fecha_localizacion' => ['sometimes', 'date'],
                'sintesis_localizacion' => ['sometimes', 'string'],
            ],
        };
    }
}
