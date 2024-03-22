<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmpleadoRequest extends FormRequest
{


    public function rules(): array
    {

        $method = $this->method();

        if ($method == 'PUT') {
            return [
                "nombre" => ['nullable'],
                "apellido_paterno" => ['nullable'],
                "apellido_materno" => ['nullable'],
                "fecha_nacimiento" => ['nullable', 'date'],
                "puesto" => ['nullable'],
                "area" => ['nullable'],
            ];
        } else {
            return [
                "nombre" => ['sometimes', 'nullable'],
                "apellido_paterno" => ['sometimes', 'nullable'],
                "apellido_materno" => ['sometimes', 'nullable'],
                "fecha_nacimiento" => ['sometimes', 'nullable', 'date'],
                "puesto" => ['sometimes', 'nullable'],
                "area" => ['sometimes', 'nullable'],
            ];
        }
    }


    public function authorize(): bool
    {
        return false;
    }
}
