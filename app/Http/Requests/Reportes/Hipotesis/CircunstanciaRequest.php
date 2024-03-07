<?php

namespace App\Http\Requests\Reportes\Hipotesis;

use Illuminate\Foundation\Http\FormRequest;

class CircunstanciaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'descripcion' => ['required', 'string', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        $method = $this->method();

        return match ($method) {
            'PUT', 'STORE' => $this->user() != null && $this->user()->tokenCan('create'),
            default => $this->user() != null && $this->user()->tokenCan('update'),
        };
    }
}
