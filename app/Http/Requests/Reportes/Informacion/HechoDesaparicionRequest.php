<?php

namespace App\Http\Requests\Reportes\Informacion;

use Illuminate\Foundation\Http\FormRequest;

class HechoDesaparicionRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'reporte_id' => ['required', 'exists:reportes,id', 'integer'],
                'cambio_comportamiento' => ['nullable', 'boolean'],
                'descripcion_cambio_comportamiento' => ['nullable','string'],
                'fue_amenazado' => ['nullable','boolean'],
                'descripcion_amenaza' => ['nullable', 'string'],
                'contador_desapariciones' => ['nullable', 'integer'],
                'situacion_previa' => ['nullable', 'string'],
                'informacion_relevante' => ['nullable', 'string'],
                'hechos_desaparicion' => ['nullable', 'string'],
                'sintesis_desaparicion' => ['nullable', 'string'],
            ],
            default => [
                'reporte_id' => ['sometimes', 'exists:reportes,id', 'integer'],
                'cambio_comportamiento' => ['sometimes', 'boolean'],
                'descripcion_cambio_comportamiento' => ['sometimes','string'],
                'fue_amenazado' => ['sometimes','boolean'],
                'descripcion_amenaza' => ['sometimes', 'string'],
                'contador_desapariciones' => ['sometimes', 'integer'],
                'situacion_previa' => ['sometimes', 'string'],
                'informacion_relevante' => ['sometimes', 'string'],
                'hechos_desaparicion' => ['sometimes', 'string'],
                'sintesis_desaparicion' => ['sometimes', 'string'],
            ]
        };
    }
}
