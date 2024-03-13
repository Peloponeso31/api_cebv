<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiTokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "plain_text_token" => $this->plainTextToken,
            "token_name" => $this->accessToken->name,
            "user_id" => $this->accessToken->tokenable_id,
            "created_at" => $this->accessToken->created_at,
        ];
    }
}
