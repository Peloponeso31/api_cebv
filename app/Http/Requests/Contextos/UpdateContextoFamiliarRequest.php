<?php

namespace App\Http\Requests\Contextos;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContextoFamiliarRequest extends FormRequest
{
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                "personas_vive" => ['nullable'],
                "hijos" => ['nullable', 'integer'],
                "familiar_cercano" => ['nullable'],
                "familiar_violencia" => ['nullable'],
                'persona_id' => ['required', 'integer'],
            ];
        } else {
            return [
                "personas_vive" => ['sometimes','nullable'],
                "hijos" => ['sometimes','nullable', 'integer'],
                "familiar_cercano" => ['sometimes','nullable'],
                "familiar_violencia" => ['sometimes','nullable'],
                'persona_id' => ['sometimes','required', 'integer'],
            ];
        }
    }


    public function authorize(): bool
    {
        return false;
    }
}
