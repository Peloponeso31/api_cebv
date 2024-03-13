<?php

namespace App\Http\Requests\Reportes;

use Illuminate\Foundation\Http\FormRequest;

class ReporteRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'tipo_reporte_id' => ['required', 'exists:tipos_reportes,id'],
                'area_id' => ['nullable', 'exists:areas,id', 'integer'],
                'medio_id' => ['required', 'exists:medios,id', 'integer'],
                'direccion_id' => ['nullable', 'exists:direcciones,id', 'integer'],
                'zona_estado' => ['required', 'in:Norte,Centro,Sur,Sin zona', 'string'],
                'tipo_desaparicion' => ['required', 'in:U,M', 'string'],
                'estatus' => ['required', 'in:Localizada con vida,Localizada sin vida,No localizada', 'string'],
                'fecha_desaparicion' => ['nullable', 'date'],
                'fecha_percato' => ['nullable', 'date'],
                'folio' => ['nullable', 'max:20', 'string'],
            ],
            default => [
                'tipo_reporte_id' => ['sometimes', 'exists:tipos_reportes,id'],
                'area_id' => ['sometimes', 'nullable', 'exists:areas,id', 'integer'],
                'medio_id' => ['sometimes', 'exists:medios,id', 'integer'],
                'direccion_id' => ['sometimes', 'nullable', 'exists:direcciones,id', 'integer'],
                'zona_estado' => ['sometimes', 'in:Norte,Centro,Sur,Sin zona', 'string'],
                'tipo_desaparicion' => ['sometimes', 'in:U,M', 'string'],
                'estatus' => ['sometimes', 'in:Localizada con vida,Localizada sin vida,No localizada', 'string'],
                'fecha_desaparicion' => ['sometimes', 'nullable', 'date'],
                'fecha_percato' => ['sometimes', 'nullable', 'date'],
                'folio' => ['sometimes', 'nullable', 'max:20', 'string'],
            ]
        };
    }
}
