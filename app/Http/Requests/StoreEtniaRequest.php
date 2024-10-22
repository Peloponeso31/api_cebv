<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEtniaRequest extends FormRequest
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
            'religion_id' => ['required', 'integer'],
            'lengua_id' => ['required', 'integer'],
            'grupo_etnico_id' => ['required', 'integer'],
            'vestimenta_id' => ['required', 'integer'],
            'ascendencia_id' => ['required', 'integer'],
        ];
    }
}
