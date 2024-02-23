<?php

namespace App\Models\Ubicaciones;

use App\Models\Desaparicion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipio extends Model
{
    protected $table = 'municipios';

    public $timestamps = false;

    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function asentamientos(): HasMany
    {
        return $this->hasMany(Asentamiento::class);
    }
}
