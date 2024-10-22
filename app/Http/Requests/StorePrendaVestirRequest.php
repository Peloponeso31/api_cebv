<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrendaVestirRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'grupo_pertenencia_id' => ['nullable'],
            'pertenencia_id' => ['nullable'],
            'color_id' => ['nullable'],
            'marca' => ['nullable'],
            'descripcion' => ['nullable'],
        ];
    }
}
