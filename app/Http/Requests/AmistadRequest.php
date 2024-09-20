<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AmistadRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'persona_id' => ['required', 'exists:personas,id'],
            'tipo_red_social_id' => ['required', 'exists:cat_tipos_redes_sociales,id'],
            'nombre' => ['required', 'string'],
            'apellido_paterno' => ['nullable', 'string'],
            'apellido_materno' => ['nullable', 'string'],
            'apodo' => ['nullable', 'string'],
            'telefono' => ['nullable', 'string'],
            'usuario_red_social' => ['nullable', 'string'],
            'observaciones_red_social' => ['nullable', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
