<?php

namespace App\Http\Requests\Ubicaciones;

use Illuminate\Foundation\Http\FormRequest;

class DireccionRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'asentamiento_id' => ['required','exists:asentamientos,id', 'max:9'],
                'calle' => ['required', 'string', 'max:255'],
                'numero_exterior' => ['nullable', 'string', 'max:10'],
                'numero_interior' => ['nullable', 'string', 'max:10'],
                'calle_1' => ['nullable', 'string', 'max:255'],
                'calle_2' => ['nullable', 'string', 'max:255'],
                'tramo_carretero' => ['nullable', 'string', 'max:100'],
                'codigo_postal' => ['nullable', 'string', 'max:5'],
                'referencia' => ['nullable', 'string'],
            ],
            default => [
                'asentamiento_id' => ['sometimes','exists:asentamientos,id', 'max:9'],
                'calle' => ['sometimes', 'string', 'max:255'],
                'numero_exterior' => ['sometimes', 'nullable', 'string', 'max:10'],
                'numero_interior' => ['sometimes', 'nullable', 'string', 'max:10'],
                'calle_1' => ['sometimes', 'nullable', 'string', 'max:255'],
                'calle_2' => ['sometimes', 'nullable', 'string', 'max:255'],
                'tramo_carretero' => ['sometimes', 'nullable', 'string', 'max:100'],
                'codigo_postal' => ['sometimes', 'nullable', 'string', 'max:5'],
                'referencia' => ['sometimes', 'nullable', 'string'],
            ]
        };
    }
}
