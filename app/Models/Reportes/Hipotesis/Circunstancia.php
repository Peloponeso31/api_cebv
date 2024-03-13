<?php

namespace App\Models\Reportes\Hipotesis;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Circunstancia extends Model
{
    protected $table = 'circunstancias';

    protected $fillable = ['descripcion'];

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
}