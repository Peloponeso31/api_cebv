<?php

namespace App\Http\Requests\Reportes\Hipotesis;

use Illuminate\Foundation\Http\FormRequest;

class HipotesisRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'reporte_id' => ['required', 'exists:reportes,id', 'integer'],
                'fecha_localizacion' => ['nullable', 'date'],
                'sintesis_localizacion' => ['nullable'],
                'circunstancia_uno_id' => ['nullable', 'exists:circunstancias,id', 'integer'],
                'hipotesis_uno' => ['nullable'],
                'circunstancia_dos_id' => ['nullable', 'exists:circunstancias,id', 'integer'],
                'hipotesis_dos' => ['nullable'],
                'area_id' => ['nullable', 'exists:areas,id', 'integer'],
                'sitio_final' => ['nullable'],
                'tipo_hipotesis_id' => ['nullable', 'exists:tipos_hipotesis', 'integer'],
                'observaciones' => ['nullable'],
            ],
            default => [
                'reporte_id' => ['sometimes', 'exists:reportes,id', 'integer'],
                'fecha_localizacion' => ['sometimes', 'date'],
                'sintesis_localizacion' => ['sometimes'],
                'circunstancia_uno_id' => ['sometimes', 'exists:circunstancias,id', 'integer'],
                'hipotesis_uno' => ['sometimes'],
                'circunstancia_dos_id' => ['sometimes', 'exists:circunstancias,id', 'integer'],
                'hipotesis_dos' => ['sometimes'],
                'area_id' => ['sometimes', 'exists:areas,id', 'integer'],
                'sitio_final' => ['sometimes'],
                'tipo_hipotesis_id' => ['sometimes', 'exists:tipos_hipotesis,id', 'integer'],
                'observaciones' => ['sometimes'],
            ],
        };
    }
}
