<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrendaVestirRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'grupo_pertenencia_id' => ['sometimes'],
            'pertenencia_id' => ['sometimes'],
            'color_id' => ['sometimes'],
            'marca' => ['sometimes'],
            'descripcion' => ['sometimes'],
        ];
    }
}
