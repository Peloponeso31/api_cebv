<?php

namespace App\Http\Requests\Reportes\Relaciones;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoLegalRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'desaparecido_id' => ['required', 'exists:desaparecidos,id'],
            'tipo_documento' => ['required', 'in:CI,AB,DH'],
            'numero_documento' => ['nullable'],
            'donde_radica' => ['nullable'],
            'nombre_servidor_publico' => ['nullable'],
            'fecha_recepcion' => ['nullable', 'date'],
        ];
    }
}
