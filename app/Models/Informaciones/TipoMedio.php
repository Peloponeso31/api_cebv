<?php

namespace App\Models\Informaciones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class TipoMedio extends Model
{
    use Searchable;

    protected $table = 'cat_tipos_medios';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    /**
     * Get all the medios for the tipo de medio.
     *
     * @return HasMany
     */
    public function medios(): HasMany
    {
        return $this->hasMany(Medio::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
        ];
    }
}
