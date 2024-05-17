<?php

namespace App\Http\Requests\Personas;

use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
{
    
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'persona_id' => ['required','exists:personas,id','integer'],
                'tipo' => ['required','string'],
                'contacto' => ['required','string'],
                'observaciones' => ['nullable','string'],
            ],
            default => [
                'persona_id' => ['sometimes','exists:personas,id','integer'],
                'tipo' => ['sometimes','string'],
                'contacto' => ['sometimes','string'],
                'observaciones' => ['sometimes','string'],
            ],
        };
    }
}
