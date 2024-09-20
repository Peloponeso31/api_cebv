<?php

namespace App\Http\Requests\Reportes\Relaciones;

use App\Enums\TipoDocumentoLegal;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DocumentoLegalRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'desaparecido_id' => ['required', 'exists:desaparecidos,id'],
            'tipo_documento' => ['required', Rule::in(TipoDocumentoLegal::cases())],
            'numero_documento' => ['nullable'],
            'donde_radica' => ['nullable'],
            'nombre_servidor_publico' => ['nullable'],
            'fecha_recepcion' => ['nullable', 'date'],
        ];
    }
}
