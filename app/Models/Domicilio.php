<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Persona;

class Domicilio extends Model
{
    use HasFactory;

    public function persona(): BelongsTo {
        return $this->belongsTo(Persona::class);
    }
}
