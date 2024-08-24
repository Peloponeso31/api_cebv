<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSenasParticularesRequest extends FormRequest
{
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'persona_id' => ['sometimes','integer'],
                'region_cuerpo_id' => ['integer'],
                //'region_cuerpo_rnpdno_id' => ['integer'],
                'vista_id' => ['integer'],
                'lado_id' => ['integer'],
                'tipo_id' => ['integer'],
                'cantidad' => ['integer'],
                'descripcion' => ['string'],
                'foto' => ['string'],
            ];
        } else{
            return [
                'persona_id' => ['sometimes','required','integer'],
                'region_cuerpo_id' => ['sometimes','required', 'integer'],
                //'region_cuerpo_rnpdno_id' => ['sometimes','required', 'integer'],
                'vista_id' => ['sometimes','required', 'integer'],
                'lado_id' => ['sometimes','required', 'integer'],
                'tipo_id' => ['sometimes','required', 'integer'],
                'cantidad' => ['sometimes','integer'],
                'descripcion' => ['sometimes','nullable','string'],
                'foto' => ['sometimes','nullable','string'],
            ];
        }
    }
}
