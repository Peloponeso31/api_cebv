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
            'reporte_uno_id' => ['required', 'exists:reportes,id'],
            'reporte_dos_id' => ['required', 'exists:reportes,id'],
            'parentesco_id' => ['required', 'exists:cat_parentescos,id'],
            'tipo' => ['required', Rule::in(TipoExpediente::cases())],
        ];
    }
}
