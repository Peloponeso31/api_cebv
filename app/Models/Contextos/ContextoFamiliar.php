<?php

namespace App\Models\Contextos;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ContextoFamiliar extends Model
{
    use HasFactory;

    protected $fillable = [
        'persona_id',
        "personas_vive",
        "hijos",
        "familiar_cercano",
        "familiar_violencia"
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }
}
