<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method) {
            'POST' => [
                'relacion_vehiculo_id' => ['required', 'exists:relaciones_vehiculos,id'],
                'tipo_vehiculo_id' => ['required', 'exists:tipos_vehiculos,id'],
                'uso_vehiculo_id' => ['required', 'exists:usos_vehiculos,id'],
                'marca_vehiculo_id' => ['nullable', 'exists:marcas_vehiculos,id'],
                'color_id' => ['required', 'exists:colores,id'],
                'submarca' => ['nullable'],
                'placa' => ['nullable'],
                'modelo' => ['nullable'],
                'numero_serie' => ['nullable'],
                'numero_motor' => ['nullable'],
                'numero_permiso' => ['nullable'],
                'descripcion' => ['nullable'],
                'localizado' => ['boolean'],
            ],
            default => [
                'relacion_vehiculo_id' => ['sometimes', 'exists:relaciones_vehiculos,id'],
                'tipo_vehiculo_id' => ['sometimes', 'exists:tipos_vehiculos,id'],
                'uso_vehiculo_id' => ['sometimes', 'exists:usos_vehiculos,id'],
                'marca_vehiculo_id' => ['sometimes', 'exists:marcas_vehiculos,id'],
                'color_id' => ['sometimes', 'exists:colores,id'],
                'submarca' => ['sometimes'],
                'placa' => ['sometimes'],
                'modelo' => ['sometimes'],
                'numero_serie' => ['sometimes'],
                'numero_motor' => ['sometimes'],
                'numero_permiso' => ['sometimes'],
                'descripcion' => ['sometimes'],
                'localizado' => ['sometimes'],
            ]
        };
    }
}
