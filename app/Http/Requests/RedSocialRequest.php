<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RedSocialRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST' => [
                'persona_id' => ['required', 'exists:personas,id'],
                'tipo_red_social_id' => ['required', 'exists:tipos_redes_sociales,id'],
                'usuario' => ['required'],
                'observaciones' => ['nullable'],
            ],
            default => [
                'persona_id' => ['sometimes', 'exists:personas,id'],
                'tipo_red_social_id' => ['sometimes', 'exists:tipos_redes_sociales,id'],
                'usuario' => ['sometimes'],
                'observaciones' => ['sometimes'],
            ]
        };
    }
}
