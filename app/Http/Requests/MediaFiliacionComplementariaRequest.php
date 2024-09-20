<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaFiliacionComplementariaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tiene_ausencia_dental' => ['nullable', 'boolean'],
            'descripcion_ausencia_dental' => ['nullable'],
            'tiene_tratamiento_dental' => ['nullable', 'boolean'],
            'descripcion_tratamiento_dental' => ['nullable'],
            'tipo_menton_id' => ['nullable', 'exists:cat_tipos_menton,id'],
            'especificaciones_menton' => ['nullable'],
            'observaciones_generales' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
