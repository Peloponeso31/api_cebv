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
            
        ];
    }
}
