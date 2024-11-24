<?php

namespace App\Http\Requests;

use App\Enums\OpcionesCebv;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaludRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'persona_id' => ['required', 'exists:personas,id'],
            'tipo_sangre_id' => ['required', 'exists:cat_tipos_sangre,id'],
            'factor_rhesus' => ['required', Rule::in(OpcionesCebv::cases())],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
