<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCaracteristicasFisicasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
                'persona_id' => ['required','integer'],
                'color_cabello_id' => ['required', 'integer'],
                'color_ojos_id' => ['required', 'integer'],
                'tamano_ojos_id' => ['required', 'integer'],
                'color_piel_id' => ['required', 'integer'],
                'tipo_cabello_id' => ['required', 'integer'],
                'tipo_labios_id' => ['required','integer'],
                'tipo_nariz_id' => ['required','integer'],
                'tamano_orejas_id' => ['required','integer'],
                'complexion_id' => ['required','integer'],

                
            'barba_id' => ['nullable', Rule::in(['Sí', 'No', 'No especifico'])] ,
            'bigote_id' => ['nullable', Rule::in(['Sí', 'No', 'No especifico'])] ,
            'calvicie_id' => ['nullable', Rule::in(['Sí', 'No'])] ,
            'especificacion_barba_id' => ['required','integer'] ,
            'especificacion_bigote_id' => ['required','integer'],
            'especificacion_cabello_id' => ['required','integer'],
            'especificacion_nariz_id' => ['required','integer'],
            'especificacion_ojos_id' => ['required','integer'],
            'especificacion_oreja_id' => ['required','integer'],
            'estatura_id' => ['required','integer'],
            'forma_cara_id' => ['required','integer'],
            'forma_ojos_id' => ['required','integer'],
            'forma_oreja_id' => ['required','integer'],
            'peso_id' => ['required','integer'],
            'tamano_boca_id' => ['required','integer'],
            'tamano_cabello_id' => ['required','integer'],
            'tipo_ceja_id' => ['required','integer'],
            
        ];
    }
}
