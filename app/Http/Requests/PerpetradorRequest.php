<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerpetradorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre' => ['required'],
            'sexo_id' => ['nullable', 'exists:sexos,id'],
            'descripcion' => ['nullable'],
            'estatus_perpetrador_id' => ['nullable', 'exists:estatus_perpetradores,id'],
            'reporte_id' => ['required', 'exists:reportes,id'],
        ];
    }
}
