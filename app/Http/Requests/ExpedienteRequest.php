<?php

namespace App\Http\Requests;

use App\Enums\TipoExpediente;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExpedienteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reporte_id' => ['required', 'exists:reportes,id'],
            'persona_id' => ['nullable', 'exists:personas,id'],
            'parentesco_id' => ['required', 'exists:cat_parentescos,id'],
            'tipo' => ['required', Rule::in(TipoExpediente::cases())],
        ];
    }
}
