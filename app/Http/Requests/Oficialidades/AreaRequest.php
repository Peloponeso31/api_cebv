<?php

namespace App\Http\Requests\Oficialidades;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:255'],
        ];
    }
}
