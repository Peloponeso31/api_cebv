<?php

namespace App\Http\Requests\Reportes\Informacion;

use Illuminate\Foundation\Http\FormRequest;

class TipoMedioRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre' => ['required'],
        ];
    }
}
