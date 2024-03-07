<?php

namespace App\Models\Ubicaciones;

use App\Models\Desaparicion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direcciones';

    public $timestamps = false;

    public function asentamiento(): BelongsTo
    {
        return $this->belongsTo(Asentamiento::class, 'asentamiento_id');
    }

    public function desapariciones(): HasMany
    {
        return $this->hasMany(Desaparicion::class);
    }
}
