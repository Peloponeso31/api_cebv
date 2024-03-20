<?php

namespace App\Http\Requests\Informaciones;

use Illuminate\Foundation\Http\FormRequest;

class SitioRequest extends FormRequest
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
