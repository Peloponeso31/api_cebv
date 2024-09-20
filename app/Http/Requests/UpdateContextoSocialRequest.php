<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContextoSocialRequest extends FormRequest
{

    public function rules(): array
    {

        $method = $this->method();

        if ($method == 'PUT') {
            return [
                "pasatiempos" => ['nullable'],
                "club_organizacion" => ['nullable'],
                "estudio" => ['nullable', Rule::in(['Sí', 'No'])],
                "amistades" => ['nullable'],
                "amistades_municipio" => ['nullable'],
                "correo_electronico" => ['nullable'],
                "nombre_redes_sociales" => ['nullable'],
                "lugares_frecuentes" => ['nullable'],
                "vivienda_estado" => ['nullable', Rule::in(['Sí', 'No'])],
                'persona_id' => ['required', 'integer'],
            ];
        } else {
            return [
                "pasatiempos" => ['sometimes','nullable'],
                "club_organizacion" => ['sometimes','nullable'],
                "estudio" => ['sometimes','nullable', Rule::in(['Sí', 'No'])],
                "amistades" => ['sometimes','nullable'],
                "amistades_municipio" => ['sometimes','nullable'],
                "correo_electronico" => ['sometimes','nullable'],
                "nombre_redes_sociales" => ['sometimes','nullable'],
                "lugares_frecuentes" => ['sometimes','nullable'],
                "vivienda_estado" => ['sometimes','nullable', Rule::in(['Sí', 'No'])],
                'persona_id' => ['sometimes','required', 'integer'],
            ];
        }
    }

    public function authorize(): bool
    {
        return false;
    }
}
