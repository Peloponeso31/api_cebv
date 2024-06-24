<?php

namespace App\Models;

use App\Models\Catalogos\PrendaDeVestir;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Pertenencia extends Model
{
    use Searchable;

    protected $table = 'pertenencias';

    protected $fillable = [
        'grupo_pertenencia_id',
        'nombre',
    ];

    public $timestamps = false;

    public function PrendaDeVestir(): HasMany
    {
        return $this->hasMany(PrendaDeVestir::class);
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
