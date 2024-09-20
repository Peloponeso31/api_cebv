<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContextoSocialRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            "pasatiempos"=> ['nullable'],
            "club_organizacion"=> ['nullable'],
            "estudio"=> ['nullable', Rule::in(['Sí', 'No'])],
            "amistades"=> ['nullable'],
            "amistades_municipio"=> ['nullable'],
            "correo_electronico"=> ['nullable'],
            "nombre_redes_sociales"=> ['nullable'],
            "lugares_frecuentes"=> ['nullable'],
            "vivienda_estado"=> ['nullable', Rule::in(['Sí', 'No'])],
            'persona_id' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return false;
    }
}
