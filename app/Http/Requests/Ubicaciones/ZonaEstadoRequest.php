
<?php

namespace App\Http\Requests\Ubicaciones;

use Illuminate\Foundation\Http\FormRequest;

class ZonaEstadoRequest extends FormRequest
{
    public function rules(): array
    {
        return match ($this -> method()){
            'POST', 'PUT' => [
                'nombre' => ['required', 'string', 'max:100'],
                'abreviatura' => ['required', 'string', 'max:10'],
            ],
            default =>[
                'nombre' => ['sometimes', 'string', 'max:100'],
                'abreviatura' => ['sometimes', 'string', 'max:10'],
            ],
        };
    }

    public function authorize(): bool
    {
        return true;
    }
}
