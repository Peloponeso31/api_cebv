<?php

namespace App\Http\Requests\Catalogos\SenasParticulares;

use Illuminate\Foundation\Http\FormRequest;

class TipoSenaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre' => ['required','string']
        ];
    }
}
