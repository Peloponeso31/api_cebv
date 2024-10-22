<?php

namespace App\Http\Requests\Personas;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PersonaRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string
     */
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'lugar_nacimiento_id' => ['sometimes', 'exists:personas,id', 'max:2', 'string'],
                'nombre' => ['nullable', 'alpha:ascii', 'max:255'],
                'apellido_paterno' => ['nullable', 'alpha:ascii', 'max:255'],
                'apellido_materno' => ['nullable', 'alpha:ascii', 'max:255'],
                'apodo' => ['nullable', 'alpha:ascii', 'max:255'],
                'fecha_nacimiento' => ['nullable', 'date'],
                'curp' => ['nullable', 'regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/'],
                'observaciones_curp' => ['nullable', 'string', 'max:255'],
                'rfc' => ['nullable', 'string', 'max:13'],
                'ocupacion' => ['nullable', 'alpha', 'max:255'],
                'sexo_id' => ['nullable', 'numeric'],
                'genero_id' => ['nullable', 'numeric'],
            ],
            // Default case it's the same as 'PATCH'
            default => [
                'lugar_nacimiento_id' => ['sometimes', 'exists:personas,id', 'max:2', 'string'],
                'nombre' => ['sometimes', 'alpha:ascii', 'max:255'],
                'apellido_paterno' => ['sometimes', 'alpha:ascii', 'max:255'],
                'apellido_materno' => ['sometimes', 'alpha:ascii', 'max:255'],
                'apodo' => ['nullable', 'alpha:ascii', 'max:255'],
                'fecha_nacimiento' => ['sometimes', 'date'],
                'curp' => ['sometimes', 'regex:/^([A-ZÑ][AEIOUXÁÉÍÓÚ][A-ZÑ]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/'],
                'observaciones_curp' => ['sometimes', 'string', 'max:255'],
                'rfc' => ['sometimes', 'string', 'max:13'],
                'ocupacion' => ['sometimes', 'alpha', 'max:255'],
                'sexo' => ['sometimes', 'string', Rule::in('H', 'M'), 'max:1'],
                'genero' => ['sometimes', 'string', 'max:50'],
            ],
        };
    }
}
