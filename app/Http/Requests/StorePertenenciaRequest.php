<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePertenenciaRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'nombre' => ['nullable'],
        ];
    }
}
