<?php

namespace App\Http\Requests\Reportes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateHechoDesaparicionRequest extends FormRequest
{
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT') {
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
        } else {
            return [
                'persona_id' => ['sometimes', 'required', 'integer'],
                'direccion_id' => ['sometimes', 'required', 'integer'],
                'zona_estado' => ['sometimes', 'nullable', Rule::in(['Centro', 'Norte', 'Sur'])],
                'area_id' => ['sometimes', 'required', 'integer'],
                'dependencia' => ['sometimes', 'required'],
                'fecha_desaparicion' => ['sometimes', 'nullable', 'date'],
                'fecha_percato' => ['sometimes', 'nullable', 'date'],
                'cambio_comportamiento' => ['sometimes', 'required', 'boolean'],
                'fue_amenazado' => ['sometimes', 'required', 'boolean'],
                'descripcion_amenaza' => ['sometimes', 'nullable'],
                'contador_desapariciones' => ['sometimes', 'required', 'integer'],
                'situacion_previa' => ['sometimes', 'nullable'],
                'informacion_relevante' => ['sometimes', 'nullable'],
                'hechos_desaparicion' => ['sometimes', 'nullable'],
                'sintesis_Desaparicion' => ['sometimes', 'nullable'],
                'hipotesis_id' => ['sometimes', 'required', 'integer'],
            ];
        }

    }

    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('update');
    }

    /**
     * Cuando se recibe un PUT request, se debe hacer un merge de los datos recibidos
     * para su correcta inserción en la base de datos.
     *
     * Pero cuando se recibe un PATCH request, no se debe hacer un merge de los datos recibidos,
     * se tienen que validar los datos que se reciben.
     *
     *  if ($this->>hipotesisId) {
     *     $this->merge([
     *        'hipotesis_id' => $this->hipotesisId,
     *    ]);
     *
     */
}
