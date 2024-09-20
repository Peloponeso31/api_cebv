<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmbarazoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'persona_id' => ['required', 'exists:personas,id'],
            'meses' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
