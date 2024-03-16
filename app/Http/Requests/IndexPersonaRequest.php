<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexPersonaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => ['alpha:ascii'],
            'apellido_paterno' => ['alpha:ascii'],
            'apellido_materno' => ['alpha:ascii'],
            'fecha_nacimiento' => ['date'],
            'curp' => ['regex:/^([A-ZÑ][AEIOUXÁÉÍÓÚ][A-ZÑ]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/'],
            'ocupacion' => ['alpha'],
            'sexo_al_nacer' => [],
            'genero' => [],

            'not_nombre' => [],
            'not_apellido_paterno' => [],
            'not_apellido_materno' => [],
            'not_fecha_nacimiento' => [],
            'not_ocupacion' => [],
            'not_genero' => [],

            'paginacion' => ['numeric', 'min:1'],
            'devolver_con' => ['regex:/^(?:[a-zA-Z\s]+,)*[a-zA-Z\s]+[a-zA-Z\s]$/'],
        ];
    }
}
