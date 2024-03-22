<?php

namespace App\Http\Requests\Reportes\Relaciones;

use Illuminate\Foundation\Http\FormRequest;

class ReportanteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'denuncia_anonima' => ['boolean'],
            'informacion_consentimiento' => ['boolean'],
            'informacion_exclusiva_busqueda' => ['boolean'],
            'publicacion_registro_nacional' => ['boolean'],
            'publicacion_boletin' => ['boolean'],
            'pertenencia_colectivo' => ['boolean'],
            'nombre_colectivo' => ['nullable'],
            'informacion_relevante' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
