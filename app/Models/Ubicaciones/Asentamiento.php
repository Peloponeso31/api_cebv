<?php

namespace App\Models\Ubicaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asentamiento extends Model
{
    use HasFactory;

    protected $table = 'asentamientos';

    public $timestamps = false;

    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function direcciones(): HasMany
    {
        return $this->hasMany(Direccion::class);
    }
}
