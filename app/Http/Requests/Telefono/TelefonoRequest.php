<?php

namespace App\Http\Requests\Telefono;

use Illuminate\Foundation\Http\FormRequest;

class TelefonoRequest extends FormRequest
{

    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'numero' => ['required','string'],
                'observaciones' => ['nullable','string'],
                'compania_id' => ['required','exists:companias_telefonicas,id','integer'],
            ],
            default => [
                'numero' => ['sometimes','string'],
                'observaciones' => ['sometimes','string'],
                'compania_id' => ['sometimes','exists:companias_telefonicas,id','integer'],
            ],
        };
    }
}
