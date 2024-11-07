<?php

namespace App\Models\Reportes\Hipotesis;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Circunstancia extends Model
{
    use Searchable;

    protected $table = 'cat_circunstancias';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    /**
     * Get the tipos de hipotesis for the circunstancia.
     *
     * @return HasMany
     */
    public function tiposHipotesis(): HasMany
    {
        return $this->hasMany(TipoHipotesis::class);
    }

    /**
     * Get the hipotesis for the circunstancia.
     *
     * @return HasMany
     */
    public function hipotesis(): HasMany
    {
        return $this->hasMany(Hipotesis::class);
    }


    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'descripcion' => $this->descripcion,
        ];
    }
}
