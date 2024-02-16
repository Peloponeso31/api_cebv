<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reporte extends Model
{
    use HasFactory;

    protected $fillable = [
        'reportante_id',
        'reportada_id'
    ];

    public function reportante(): BelongsTo {
        return $this->belongsTo(Persona::class);
    }

    public function reportada(): BelongsTo {
        return $this->belongsTo(Persona::class);
    }
}
