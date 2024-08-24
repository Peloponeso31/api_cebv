<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudioRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'persona_id' => ['required', 'exists:personas'],
            'escolaridad_id' => ['nullable', 'exists:cat_escolaridades'],
            'estatus_escolaridad_id' => ['nullable', 'exists:cat_estatus_escolaridades'],
            'direccion_id' => ['nullable', 'exists:direcciones'],
            'nombre_institucion' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
