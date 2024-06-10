<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaFiliacionRequest extends FormRequest
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
            'ausencia_dientes_id' => ['required','integer'],
            'tratamiento_dental_id' => ['required','integer'],
            'tipo_menton_id' => ['required','integer'],
            'especificacion_menton_id' => ['required','integer'],
            'region_deformacion_id' => ['required','integer'],
            'especificacion_deformacion_id' => ['required','integer'],
            'intervencion_quirurgica_id' => ['required','integer'],
            'especificacion_intervencion_quirurgica_id' => ['required','integer'],
            'tipo_enfermedad_piel_id' => ['required','integer'],
            'especificacion_enfermedad_id' => ['required','integer'],
            'observaciones_generales_id' => ['required','integer'],
            
        ];
    }
}
