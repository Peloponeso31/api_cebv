<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMediaFiliacionRequest extends FormRequest
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
                'ausencia_dientes_id' => ['sometimes','integer'],
                'tratamiento_dental_id' => ['sometimes','integer'],
                'tipo_menton_id' => ['sometimes','integer'],
                'especificacion_menton_id' => ['sometimes','integer'],
                'region_deformacion_id' => ['sometimes','integer'],
                'especificacion_deformacion_id' => ['sometimes','integer'],
                'intervencion_quirurgica_id' => ['sometimes','integer'],
                'especificacion_intervencion_quirurgica_id' => ['sometimes','integer'],
                'tipo_enfermedad_piel_id' => ['sometimes','integer'],
                'especificacion_enfermedad_id' => ['sometimes','integer'],
                'observaciones_generales_id' => ['sometimes','integer'],
            ];
        } else {
            return [
                'persona_id' => ['required','integer'],
                'ausencia_dientes_id' => ['sometimes','integer'],
                'tratamiento_dental_id' => ['sometimes','integer'],
                'tipo_menton_id' => ['sometimes','integer'],
                'especificacion_menton_id' => ['sometimes','integer'],
                'region_deformacion_id' => ['sometimes','integer'],
                'especificacion_deformacion_id' => ['sometimes','integer'],
                'intervencion_quirurgica_id' => ['sometimes','integer'],
                'especificacion_intervencion_quirurgica_id' => ['sometimes','integer'],
                'tipo_enfermedad_piel_id' => ['sometimes','integer'],
                'especificacion_enfermedad_id' => ['sometimes','integer'],
                'observaciones_generales_id' => ['sometimes','integer'],

    }
}
