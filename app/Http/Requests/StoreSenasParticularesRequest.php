<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSenasParticularesRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'persona_id' => ['required','integer'],
            'region_cuerpo_id' => ['required', 'integer'],
            'region_cuerpo_rnpdno_id' => ['required', 'integer'],
            'vista_id' => ['required', 'integer'],
            'lado_id' => ['required', 'integer'],
            'tipo_id' => ['required', 'integer'],
            'cantidad' => ['integer'],
            'descripcion' => ['nullable','string'],
            'foto' => ['nullable','string'],
        ];
    }
}
