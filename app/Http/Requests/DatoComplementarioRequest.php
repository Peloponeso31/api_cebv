<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatoComplementarioRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'direccion_id' => ['nullable', 'exists:direcciones'],
            'reporte_id' => ['required', 'exists:reportes'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
