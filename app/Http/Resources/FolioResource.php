<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Oficialidades\Folio */
class FolioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $user = User::findOrFail($this->user_id);

        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'reporte_id' => $this->reporte_id,
            'user' => UserAdminResource::make($user),
            'folio_cebv' => $this->folio_cebv,
            'folio_fub' => $this->folio_fub,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
