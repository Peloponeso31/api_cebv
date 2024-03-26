<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FolioRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
           'POST', 'PUT' => [
                'persona_id' => ['required', 'exists:personas,id', 'integer'],
                'reporte_id' => ['required', 'exists:reportes,id', 'integer'],
                'user_id' => ['required', 'exists:users,id', 'integer'],
                'folio_cebv' =>['required', 'string', 'max:20'],
                'folio_fub' => ['required', 'string', 'max:37'],
            ],
            default => [
                'folio_fub' => ['sometimes', 'string', 'max:37'],],
        };
    }

    public function authorize(): bool
    {
        return true;
    }
}
