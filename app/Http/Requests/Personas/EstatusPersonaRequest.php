<?php

namespace App\Http\Requests\Personas;

use Illuminate\Foundation\Http\FormRequest;

class EstatusPersonaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'max:100'],
        ];
    }
}
