<?php

namespace App\Http\Requests\Reportes\Informacion;

use Illuminate\Foundation\Http\FormRequest;

class HechoDesaparicionRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'reporte_id' => ['required', 'exists:reportes,id'],
                'fecha_desaparicion' => ['nullable', 'date'],
                'fecha_desaparicion_cebv' => ['nullable', 'string'],
                'fecha_percato' => ['nullable', 'date'],
                'fecha_percato_cebv' => ['nullable', 'string'],
                'aclaraciones_fecha_hechos' => ['nullable', 'string'],
                'amenaza_cambio_comportamiento' => ['nullable', 'boolean'],
                'descripcion_amenaza_cambio_comportamiento' => ['nullable', 'string'],
                'contador_desapariciones' => ['nullable', 'integer'],
                'situacion_previa' => ['nullable', 'string'],
                'informacion_relevante' => ['nullable', 'string'],
                'hechos_desaparicion' => ['nullable', 'string'],
                'sintesis_desaparicion' => ['nullable', 'string'],
            ],
            default => [
                'reporte_id' => ['sometimes', 'exists:reportes,id'],
                'fecha_desaparicion' => ['sometimes', 'date'],
                'fecha_desaparicion_cebv' => ['sometimes', 'string'],
                'fecha_percato' => ['sometimes', 'date'],
                'fecha_percato_cebv' => ['sometimes', 'string'],
                'hora_desaparicion' => ['sometimes', 'string'],
                'hora_percato' => ['sometimes', 'string'],
                'aclaraciones_fecha_hechos' => ['sometimes', 'string'],
                'amenaza_cambio_comportamiento' => ['sometimes', 'boolean'],
                'descripcion_amenaza_cambio_comportamiento' => ['sometimes', 'string'],
                'contador_desapariciones' => ['sometimes', 'integer'],
                'situacion_previa' => ['sometimes', 'string'],
                'informacion_relevante' => ['sometimes', 'string'],
                'hechos_desaparicion' => ['sometimes', 'string'],
                'sintesis_desaparicion' => ['sometimes', 'string'],
            ]
        };
    }
}
