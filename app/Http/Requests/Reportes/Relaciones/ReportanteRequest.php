<?php

namespace App\Http\Requests\Reportes\Relaciones;

use Illuminate\Foundation\Http\FormRequest;

class ReportanteRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'reporte_id' => ['required', 'exists:reportes,id', 'numeric'],
                'persona_id' => ['nullable', 'exists:personas,id', 'numeric'],
                'parentesco_id' => ['nullable', 'exists:cat_parentescos,id', 'numeric'],
                'denuncia_anonima' => ['nullable', 'boolean'],
                'informacion_consentimiento' => ['nullable', 'boolean'],
                'informacion_exclusiva_busqueda' => ['nullable', 'boolean'],
                'publicacion_registro_nacional' => ['nullable', 'boolean'],
                'publicacion_boletin' => ['nullable', 'boolean'],
                'pertenencia_colectivo' => ['nullable', 'boolean'],
                'nombre_colectivo' => ['string', 'nullable'],
                'informacion_relevante' => ['string', 'nullable'],
            ],
            default => [
                'reporte_id' => ['sometimes', 'exists:reportes,id', 'numeric'],
                'persona_id' => ['sometimes', 'exists:personas,id', 'numeric'],
                'parentesco_id' => ['sometimes', 'exists:cat_parentescos,id', 'numeric'],
                'denuncia_anonima' => ['sometimes', 'boolean'],
                'informacion_consentimiento' => ['sometimes', 'boolean'],
                'informacion_exclusiva_busqueda' => ['sometimes', 'boolean'],
                'publicacion_registro_nacional' => ['sometimes', 'boolean'],
                'publicacion_boletin' => ['sometimes', 'boolean'],
                'pertenencia_colectivo' => ['sometimes', 'boolean'],
                'nombre_colectivo' => ['sometimes', 'string',],
                'informacion_relevante' => ['sometimes', 'string'],
            ],
        };
    }

    public function authorize(): bool
    {
        return true;
    }
}
