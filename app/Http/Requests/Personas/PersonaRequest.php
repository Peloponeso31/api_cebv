<?php

namespace App\Http\Requests\Personas;

use Illuminate\Foundation\Http\FormRequest;

class PersonaRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT' => [
                'nombre' => ['nullable', 'alpha:ascii', 'max:255'],
                'apellido_paterno' => ['nullable', 'alpha:ascii', 'max:255'],
                'apellido_materno' => ['nullable', 'alpha:ascii', 'max:255'],
                'fecha_nacimiento' => ['nullable', 'date'],
                'curp' => ['nullable', 'regex:/^([A-ZÑ][AEIOUXÁÉÍÓÚ][A-ZÑ]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/'],
                'ocupacion' => ['nullable', 'alpha', 'max:255'],
                'sexo_al_nacer' => ['nullable', 'max:255'],
                'genero' => ['nullable', 'max:255'],
            ],
            // Default case it's the same as 'PATCH'
            default => [
                'nombre' => ['sometimes', 'nullable', 'alpha:ascii', 'max:255'],
                'apellido_paterno' => ['sometimes', 'nullable', 'alpha:ascii', 'max:255'],
                'apellido_materno' => ['sometimes', 'nullable', 'alpha:ascii', 'max:255'],
                'fecha_nacimiento' => ['sometimes', 'nullable', 'date'],
                'curp' => ['sometimes', 'nullable', 'regex:/^([A-ZÑ][AEIOUXÁÉÍÓÚ][A-ZÑ]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/'],
                'ocupacion' => ['sometimes', 'nullable', 'alpha', 'max:255'],
                'sexo_al_nacer' => ['sometimes', 'nullable', 'max:255'],
                'genero' => ['sometimes', 'nullable', 'max:255'],
            ],
        };
    }
}
