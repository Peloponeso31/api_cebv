<?php

namespace App\Http\Resources\Telefono;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TelefonoResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            'numero' => $this -> numero,
            'observaciones'=> $this -> observaciones,
            'compania_id' => $this -> compania_id,
        ];
    }
}
