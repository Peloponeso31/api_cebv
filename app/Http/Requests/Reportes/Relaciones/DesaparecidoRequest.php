<?php

namespace App\Http\Requests\Reportes\Relaciones;

use Illuminate\Foundation\Http\FormRequest;

class DesaparecidoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'habla_espanhol' => ['nullable', 'boolean'],
            'sabe_leer' => ['nullable', 'boolean'],
            'sabe_escribir' => ['nullable', 'boolean'],
            'url_boletin' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
