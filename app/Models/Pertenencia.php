<?php

namespace App\Models;

use App\Models\Catalogos\PrendaVestir;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Pertenencia extends Model
{
    use Searchable;

    protected $table = 'cat_pertenencias';

    protected $fillable = [
        'grupo_pertenencia_id',
        'nombre',
    ];

    public $timestamps = false;

    public function prendaVestir(): HasMany
    {
        return $this->hasMany(PrendaVestir::class);
    }

    public function scopeWithPrendasCount($query)
    {
        return $query->withCount('prendaVestir');  // Cuenta las prendas asociadas a cada pertenencia
    }

    public function grupoPertenencia(): BelongsTo
    {
        return $this->belongsTo(GrupoPertenencia::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'grupo_pertenencia_id' => (int)$this->grupo_pertenencia_id,
        ];
    }
}
