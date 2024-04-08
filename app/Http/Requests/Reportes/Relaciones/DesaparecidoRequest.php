<?php

namespace App\Http\Requests\Reportes\Relaciones;

use Illuminate\Foundation\Http\FormRequest;

class DesaparecidoRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()){
            'POST', 'PUT' => [
                'reporte_id' => ['required', 'exists:reportes,id','integer'],
                'persona_id' => ['required', 'exists:personas,id','integer'],
                'estatus_rpdno_id' => ['required', 'exists:estatus_personas,id','integer'],
                'estatus_cebv_id' => ['required', 'exists:estatus_personas,id','integer'],
                'habla_espanhol' => ['nullable', 'boolean'],
                'sabe_leer' => ['nullable', 'boolean'],
                'sabe_escribir' => ['nullable', 'boolean'],
                'url_boletin' => ['nullable','string'],
            ],

            default => [
                'reporte_id' => ['sometimes', 'exists:reportes,id','integer'],
                'persona_id' => ['sometimes', 'exists:personas,id','integer'],
                'estatus_rpdno_id' => ['sometimes', 'exists:estatus_personas,id','integer'],
                'estatus_cebv_id' => ['sometimes', 'exists:estatus_personas,id','integer'],
                'habla_espanhol' => ['sometimes', 'boolean'],
                'sabe_leer' => ['sometimes', 'boolean'],
                'sabe_escribir' => ['sometimes', 'boolean'],
                'url_boletin' => ['sometimes','string'],
            ]
        };
    }

    public function authorize(): bool
    {
        return true;
    }
}
