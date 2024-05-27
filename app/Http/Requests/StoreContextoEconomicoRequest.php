<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContextoEconomicoRequest extends FormRequest
{
    public function rules(): array
    {
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
    }


    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');
    }
}
