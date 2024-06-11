<?php

namespace App\Models\Personas;

use App\Models\RedesSociales_Persona;
use App\Models\TipoRedSocial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RedesSocial extends Model
{
    use HasFactory;
    protected $fillable=['usuario',
                        'observaciones',
                        'tipo_red_social_id'];

    public function redessociales_redes(): BelongsTo
    {
        return $this->belongsTo(RedesSociales_Persona::class);
    }

    public function toporedsocial(): BelongsTo
    {
        return $this->belongsTo(TipoRedSocial::class);
    }
}
