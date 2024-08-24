<?php

namespace App\Http\Requests\Informaciones;

use Illuminate\Foundation\Http\FormRequest;

class MedioRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'tipo_medio_id' => ['required', 'exists:tipos_medios,id', 'integer'],
                'nombre' => ['required', 'string', 'max:255'],
            ],
            default => [
                'tipo_medio_id' => ['sometimes', 'exists:tipos_medios,id', 'integer'],
                'nombre' => ['sometimes', 'string', 'max:255'],
            ]
        };
    }
}
