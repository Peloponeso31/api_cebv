<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDesaparicionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'persona_id' => ['required', 'integer'],
            'direccion_id' => ['required', 'integer'],
            'zona_estado' => ['nullable', Rule::in(['Centro', 'Norte', 'Sur'])],
            'area_id' => ['required', 'integer'],
            'dependencia' => ['required'],
            'fecha_desaparicion' => ['nullable', 'date'],
            'fecha_percato' => ['nullable', 'date'],
            'cambio_comportamiento' => ['required', 'boolean'],
            'fue_amenazado' => ['required', 'boolean'],
            'descripcion_amenaza' => ['nullable'],
            'contador_desapariciones' => ['required', 'integer'],
            'situacion_previa' => ['nullable'],
            'informacion_relevante' => ['nullable'],
            'hechos_desaparicion' => ['nullable'],
            'sintesis_Desaparicion' => ['nullable'],
            'hipotesis_id' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');
    }

    /**
     * Ejemplo del merge de datos recibidos en DesaparicionResource.php
     * para su correcta inserción en la base de datos.
    /*
    protected function prepareForValidation()
    {
        $this->merge([
            'hipotesis_id' => $this->hipotesisId,
        ]);
    }
    */
}
