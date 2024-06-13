<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCaracteristicasFisicasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT') {
        return [
            'persona_id' => ['required','integer'],
            'color_cabello_id' => ['sometimes', 'integer'],
            'color_ojos_id' => ['sometimes', 'integer'],
            'tamano_ojos_id' => ['sometimes', 'integer'],
            'color_piel_id' => ['sometimes', 'integer'],
            'tipo_cabello_id' => ['sometime', 'integer'],
            'tipo_labios_id' => ['sometimes','integer'],
            'tipo_nariz_id' => ['sometimes','integer'],
            'tamano_orejas_id' => ['sometimes','integer'],
            'complexion_id' => ['sometimes','integer'],

            'barba_id' => ['sometimes','nullable', Rule::in(['Sí', 'No', 'No especifico'])] ,
            'bigote_id' => ['sometimes','nullable', Rule::in(['Sí', 'No', 'No especifico'])] ,
            'calvicie_id' => ['sometimes','nullable', Rule::in(['Sí', 'No'])] ,
            'especificacion_barba_id' => ['sometimes','integer'] ,
            'especificacion_bigote_id' => ['sometimes','integer'],
            'especificacion_cabello_id' => ['sometimes','integer'],
            'especificacion_nariz_id' => ['sometimes','integer'],
            'especificacion_ojos_id' => ['sometimes','integer'],
            'especificacion_oreja_id' => ['sometimes','integer'],
            'estatura_id' => ['sometimes','integer'],
            'forma_cara_id' => ['sometimes','integer'],
            'forma_ojos_id' => ['sometimes','integer'],
            'forma_oreja_id' => ['sometimes','integer'],
            'peso_id' => ['sometimes','integer'],
            'tamano_boca_id' => ['sometimes','integer'],
            'tamano_cabello_id' => ['sometimes','integer'],
            'tipo_ceja_id' => ['sometimes','integer'],
        ];
    } else {
        return [
            'persona_id' => ['required','integer'],
            'color_cabello_id' => ['sometimes', 'integer'],
            'color_ojos_id' => ['sometimes', 'integer'],
            'tamano_ojos_id' => ['sometimes', 'integer'],
            'color_piel_id' => ['sometimes', 'integer'],
            'tipo_cabello_id' => ['sometime', 'integer'],
            'tipo_labios_id' => ['sometimes','integer'],
            'tipo_nariz_id' => ['sometimes','integer'],
            'tamano_orejas_id' => ['sometimes','integer'],
            'complexion_id' => ['sometimes','integer'],

            'barba_id' => ['sometimes','nullable', Rule::in(['Sí', 'No', 'No especifico'])] ,
            'bigote_id' => ['sometimes','nullable', Rule::in(['Sí', 'No', 'No especifico'])] ,
            'calvicie_id' => ['sometimes','nullable', Rule::in(['Sí', 'No'])] ,
            'especificacion_barba_id' => ['sometimes','integer'] ,
            'especificacion_bigote_id' => ['sometimes','integer'],
            'especificacion_cabello_id' => ['sometimes','integer'],
            'especificacion_nariz_id' => ['sometimes','integer'],
            'especificacion_ojos_id' => ['sometimes','integer'],
            'especificacion_oreja_id' => ['sometimes','integer'],
            'estatura_id' => ['sometimes','integer'],
            'forma_cara_id' => ['sometimes','integer'],
            'forma_ojos_id' => ['sometimes','integer'],
            'forma_oreja_id' => ['sometimes','integer'],
            'peso_id' => ['sometimes','integer'],
            'tamano_boca_id' => ['sometimes','integer'],
            'tamano_cabello_id' => ['sometimes','integer'],
            'tipo_ceja_id' => ['sometimes','integer'],
        ];
    }
}
}