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
                'cambio_comportamiento' => ['boolean'],
                'descripcion_cambio_comportamiento' => ['nullable'],
                'fue_amenazado' => ['boolean'],
                'descripcion_amenaza' => ['nullable'],
                'contador_desapariciones' => ['required', 'integer'],
                'situacion_previa' => ['nullable'],
                'informacion_relevante' => ['nullable'],
                'hechos_desaparicion' => ['nullable'],
                'sintesis_desaparicion' => ['nullable'],
            ],
            default => [
                'reporte_id' => ['sometimes', 'exists:reportes,id', 'integer'],
                'cambio_comportamiento' => ['sometimes', 'boolean'],
                'descripcion_cambio_comportamiento' => ['sometimes', 'nullable'],
                'fue_amenazado' => ['sometimes', 'boolean'],
                'descripcion_amenaza' => ['sometimes', 'nullable'],
                'contador_desapariciones' => ['sometimes', 'required', 'integer'],
                'situacion_previa' => ['sometimes', 'nullable'],
                'informacion_relevante' => ['sometimes', 'nullable'],
                'hechos_desaparicion' => ['sometimes', 'nullable'],
                'sintesis_desaparicion' => ['sometimes', 'nullable'],
            ]
        };
    }
}
