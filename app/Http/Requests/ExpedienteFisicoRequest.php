<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpedienteFisicoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reporte_id' => ['required', 'exists:reportes'],
            'area_receptora_id' => ['nullable', 'exists:cat_areas'],
            'solicitante_expediente_id' => ['nullable', 'exists:users'],
            'fecha_cambio_area' => ['nullable', 'date'],
            'fecha_prestamo' => ['nullable', 'date'],
            'fecha_devolucion' => ['nullable', 'date'],
            'observaciones' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
