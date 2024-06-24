<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApodoRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'persona_id' => ['required', 'exists:personas,id', 'integer'],
                'apodo' => ['required', 'string', 'max:255'],
            ],
            default => [
                'persona_id' => ['sometimes', 'exists:personas,id', 'integer'],
                'apodo' => ['sometimes', 'string', 'max:255'],
            ]
        };
    }
}
