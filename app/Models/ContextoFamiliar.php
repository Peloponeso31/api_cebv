<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Persona;

class ContextoFamiliar extends Model
{
    use HasFactory;

    protected $fillable = [
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
