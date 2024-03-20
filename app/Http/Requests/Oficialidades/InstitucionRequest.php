<?php

namespace App\Http\Requests\Oficialidades;

use Illuminate\Foundation\Http\FormRequest;

class InstitucionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
