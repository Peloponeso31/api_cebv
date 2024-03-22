<?php

namespace App\Http\Requests\Personas;

use Illuminate\Foundation\Http\FormRequest;

class EstatusPersonaRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'nombre' => ['required', 'string', 'max:100'],
                'abreviatura' => ['required', 'string', 'uppercase', 'max:10']
            ],
            default => [
                'nombre' => ['sometimes', 'string', 'max:100'],
                'abreviatura' => ['sometimes', 'string', 'uppercase', 'max:10']
            ],
        };
    }
}
