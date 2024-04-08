<?php

namespace App\Http\Requests\Reportes\Hipotesis;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HipotesisRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'reporte_id' => ['required', 'exists:reportes,id', 'integer'],
                'tipo_hipotesis_id' => ['required', 'exists:tipos_hipotesis,id', 'integer'],
                'sitio_id' => ['required', 'exists:sitios,id', 'integer'],
                'area_asigna_sitio_id' => ['required', 'exists:areas,id', 'integer'],
                'etapa' => ['required', 'string', Rule::in('Inicial', 'Final')],
                'descripcion' => ['required', 'string'],

            ],
            default => [
                'reporte_id' => ['sometimes', 'exists:reportes,id', 'integer'],
                'tipo_hipotesis_id' => ['sometimes', 'exists:tipos_hipotesis,id', 'integer'],
                'sitio_id' => ['sometimes', 'exists:sitios,id', 'integer'],
                'area_asigna_sitio_id' => ['sometimes', 'exists:areas,id', 'integer'],
                'etapa' => ['sometimes', 'string', Rule::in('Inicial', 'Final')],
                'descripcion' => ['sometimes', 'string'],
            ],
        };
    }
}
