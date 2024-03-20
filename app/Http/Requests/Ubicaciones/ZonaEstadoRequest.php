<?php

namespace App\Http\Requests\Ubicaciones;

use Illuminate\Foundation\Http\FormRequest;

class ZonaEstadoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:100'],
            'abreviatura' => ['required', 'string', 'max:10'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
