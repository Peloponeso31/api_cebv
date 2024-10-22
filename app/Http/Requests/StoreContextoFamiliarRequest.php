<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContextoFamiliarRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            "personas_vive" => ['nullable'],
            "hijos"=> ['nullable', 'integer'],
            "familiar_cercano"=> ['nullable'],
            "familiar_violencia"=> ['nullable'],
            'persona_id' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');
    }
}
