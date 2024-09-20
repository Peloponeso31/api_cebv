<?php

namespace App\Http\Requests\Reportes\Hipotesis;

use Illuminate\Foundation\Http\FormRequest;

class CircunstanciaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:255'],
        ];
    }
}
