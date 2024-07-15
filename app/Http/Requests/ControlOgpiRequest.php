<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ControlOgpiRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reporte_id' => ['required', 'exists:reportes,id'],
            'fecha_codificacion' => ['required', 'date'],
            'nombre_codificador' => ['required'],
            'observaciones' => ['nullable'],
            'numero_tarjeta' => ['required'],
        ];
    }
}
