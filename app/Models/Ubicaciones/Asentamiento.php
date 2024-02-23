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

    public function municipio(): BelongsTo
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

    public function direcciones(): HasMany
    {
        return $this->hasMany(Direccion::class);
    }
}
