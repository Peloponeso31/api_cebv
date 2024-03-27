<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateEtniaRequest extends FormRequest
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
            'religion_id' => ['sometimes', 'integer'],
            'lengua_id' => ['sometimes', 'integer'],
            'grupo_etnico_id' => ['sometimes', 'integer'],
            'vestimenta_id' => ['sometimes', 'integer'],
            'ascendencia_id' => ['sometime', 'integer'],
        ];
    } else {
        return [
            'persona_id' => ['required','integer'],
            'religion_id' => ['sometimes', 'integer'],
            'lengua_id' => ['sometimes', 'integer'],
            'grupo_etnico_id' => ['sometimes', 'integer'],
            'vestimenta_id' => ['sometimes', 'integer'],
            'ascendencia_id' => ['sometime', 'integer'],
        ];
    }
    }
}
