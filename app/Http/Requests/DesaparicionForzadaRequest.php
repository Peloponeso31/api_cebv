<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesaparicionForzadaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reporte_id' => ['required', 'exists:reportes,id'],
            'desaparecio_autoridad' => ['nullable', 'boolean'],
            'autoridad_id' => ['nullable', 'exists:autoridades,id'],
            'descripcion_autoridad' => ['nullable'],
            'particular_id' => ['nullable', 'exists:particulares,id'],
            'descripcion_particular' => ['nullable'],
            'desaparecio_particular' => ['nullable', 'boolean'],
            'metodo_captura_id' => ['nullable', 'exists:metodos_captura,id'],
            'descripcion_metodo_captura' => ['nullable'],
            'medio_captura_id' => ['nullable', 'exists:medios_captura,id'],
            'descripcion_medio_captura' => ['nullable'],
            'detencion_previa_extorsion' => ['nullable', 'boolean'],
            'descripcion_detencion_previa_extorsion' => ['nullable'],
            'ha_sido_avistado' => ['nullable', 'boolean'],
            'donde_ha_sido_avistado' => ['nullable'],
            'delitos_desaparicion' => ['nullable', 'boolean'],
            'descripcion_delitos_desaparicion' => ['nullable'],
        ];
    }
}
