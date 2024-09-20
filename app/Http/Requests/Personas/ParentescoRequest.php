<?php

namespace App\Http\Requests\Personas;

use Illuminate\Foundation\Http\FormRequest;

class ParentescoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:100'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
