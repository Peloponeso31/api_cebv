<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpleadoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "nombre" => ['nullable'],
            "apellido_paterno" => ['nullable'],
            "apellido_materno"=> ['nullable'],
            "fecha_nacimiento"=> ['nullable', 'date'],
            "puesto"=> ['nullable'],
            "area"=> ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');
    }
}
