<?php

namespace App\Http\Requests\Catalogos;

use Illuminate\Foundation\Http\FormRequest;

class LadoSenaRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string'],
        ];
    }
}
