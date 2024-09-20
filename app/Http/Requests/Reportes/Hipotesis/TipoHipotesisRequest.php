<?php

namespace App\Http\Requests\Reportes\Hipotesis;

use Illuminate\Foundation\Http\FormRequest;

class TipoHipotesisRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'circunstancia_id' => ['required', 'exists:circunstancias,id','integer'],
                'abreviatura' => ['required', 'string', 'max:10'],
                'descripcion' => ['required', 'string', 'max:255'],
            ],
            default => [
                'circunstancia_id' => ['sometimes', 'exists:circunstancias,id'],
                'abreviatura' => ['sometimes', 'string', 'max:10'],
                'descripcion' => ['sometimes', 'string', 'max:255'],
            ],
        };
    }
}
