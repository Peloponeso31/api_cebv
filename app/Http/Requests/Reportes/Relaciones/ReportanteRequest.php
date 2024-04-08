<?php

namespace App\Http\Requests\Reportes\Relaciones;

use Illuminate\Foundation\Http\FormRequest;

class ReportanteRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'reporte_id' => ['required', 'exists:reportes,id', 'integer'],
                'persona_id' => ['required', 'exists:personas,id', 'integer'],
                'parentesco_id' => ['required', 'exists:parentescos,id', 'integer'],
                'denuncia_anonima' => ['required', 'boolean'],
                'informacion_consentimiento' => ['required', 'boolean'],
                'informacion_exclusiva_busqueda' => ['required', 'boolean'],
                'publicacion_registro_nacional' => ['required', 'boolean'],
                'publicacion_boletin' => ['required', 'boolean'],
                'pertenencia_colectivo' => ['required', 'boolean'],
                'nombre_colectivo' => ['string', 'nullable'],
                'informacion_relevante' => ['string', 'nullable'],
            ],
            default => [
                'reporte_id' => ['sometimes', 'exists:reportes,id', 'integer'],
                'persona_id' => ['sometimes', 'exists:personas,id', 'integer'],
                'parentesco_id' => ['sometimes', 'exists:parentescos,id', 'integer'],
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
