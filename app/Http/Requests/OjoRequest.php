<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OjoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'persona_id' => ['required', 'exists:personas,id'],
            'color_ojos_id' => ['required', 'exists:cat_colores_ojos,id'],
            'forma_ojos_id' => ['required', 'exists:cat_formas_ojos,id'],
            'tamano_ojos_id' => ['required', 'exists:cat_tamanos_ojos,id'],
            'especificaciones_ojos' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
