<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamiliarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'persona_id' => ['required', 'exists:personas'],
            'parentesco_id' => ['required', 'exists:parentescos'],
            'nombre' => ['required'],
            'ha_ejercido_violencia' => ['nullable', 'boolean'],
            'es_familiar_cercano' => ['nullable', 'boolean'],
            'observaciones' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
