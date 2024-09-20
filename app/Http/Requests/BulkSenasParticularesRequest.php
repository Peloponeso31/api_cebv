<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BulkSenasParticularesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            '*.persona_id' => ['required','integer'],
            '*.region_cuerpo_id' => ['required', 'integer'],
            //'region_cuerpo_rnpdno_id' => ['required', 'integer'],
            '*.vista_id' => ['required', 'integer'],
            '*.lado_id' => ['required', 'integer'],
            '*.tipo_id' => ['required', 'integer'],
            '*.cantidad' => ['integer'],
            '*.descripcion' => ['sometimes','nullable','string'],
            '*.foto' => ['sometimes','nullable','string'],
        ];
    }
}
