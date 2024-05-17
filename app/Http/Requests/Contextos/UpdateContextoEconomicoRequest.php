<?php

namespace App\Http\Requests\Contextos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContextoEconomicoRequest extends FormRequest
{
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'empresa' => ['nullable'],
                'puesto' => ['nullable'],
                'fecha_ingreso' => ['nullable', 'date'],
                'relacion_colegas' => ['nullable', Rule::in(['Sí', 'No'])],
                'conflictos_trabajo' => ['nullable'],
                'cambiosFinanzas' => ['nullable', Rule::in(['Sí', 'No'])],
                'deudas' => ['nullable', 'integer'],
                'actividadesExtralaborales' => ['nullable', Rule::in(['Sí', 'No'])],
                'emprendimientos' => ['nullable', Rule::in(['Sí', 'No'])],
                'saludMental' => ['required'],
                'ausenciaPrevia' => ['nullable', Rule::in(['Sí', 'No'])],
                'contactosRelevantes' => ['required', 'boolean'],
                'beneficios' => ['required'],
                'cambiosBeneficios' => ['required'],
                'ultimoContactoTrabajo' => ['required', 'boolean'],
                'sindicato' => ['nullable'],
                'fecha_ingreso_sindicato' => ['nullable', 'date'],
                'idSindicato' => ['nullable', 'integer'],
                'posicionSindicato' => ['nullable'],
                'participacion' => ['nullable', Rule::in(['Sí', 'No'])],
                'relacion_sindicato' => ['nullable'],
                'conflictos_sindicato' => ['nullable'],
                'desacuerdos' => ['nullable'],
                'amenazasIntimidacion' => ['nullable'],
                'ult_cont_sindi' => ['nullable'],
                'persona_id' => ['required', 'integer'],
            ];
        } else {
            return [
                'empresa' => ['sometimes', 'nullable'],
                'puesto' => ['sometimes', 'nullable'],
                'fecha_ingreso' => ['sometimes', 'nullable', 'date'],
                'relacion_colegas' => ['sometimes', 'nullable', Rule::in(['Sí', 'No'])],
                'conflictos_trabajo' => ['sometimes', 'nullable'],
                'cambiosFinanzas' => ['sometimes', 'nullable', Rule::in(['Sí', 'No'])],
                'deudas' => ['sometimes', 'nullable', 'integer'],
                'actividadesExtralaborales' => ['sometimes', 'nullable', Rule::in(['Sí', 'No'])],
                'emprendimientos' => ['sometimes', 'nullable', Rule::in(['Sí', 'No'])],
                'saludMental' => ['sometimes', 'required'],
                'ausenciaPrevia' => ['sometimes', 'nullable', Rule::in(['Sí', 'No'])],
                'contactosRelevantes' => ['sometimes', 'required', 'boolean'],
                'beneficios' => ['sometimes', 'required'],
                'cambiosBeneficios' => ['sometimes', 'required'],
                'ultimoContactoTrabajo' => ['sometimes', 'required', 'boolean'],
                'sindicato' => ['sometimes', 'nullable'],
                'fecha_ingreso_sindicato' => ['sometimes', 'nullable', 'date'],
                'idSindicato' => ['sometimes', 'nullable', 'integer'],
                'posicionSindicato' => ['sometimes', 'nullable'],
                'participacion' => ['sometimes', 'nullable', Rule::in(['Sí', 'No'])],
                'relacion_sindicato' => ['sometimes', 'nullable'],
                'conflictos_sindicato' => ['sometimes', 'nullable'],
                'desacuerdos' => ['sometimes', 'nullable'],
                'amenazasIntimidacion' => ['sometimes', 'nullable'],
                'ult_cont_sindi' => ['sometimes', 'nullable'],
                'persona_id' => ['sometimes', 'required', 'integer'],
            ];
        }
    }


    public function authorize(): bool
    {
        return false;
    }
}
