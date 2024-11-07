<?php

namespace App\Models\Catalogos\CaracteristicasFisicas;

use App\Models\Ojo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ColorOjos extends Model
{
    protected $table='cat_colores_ojos';

    protected $fillable=['nombre'];

    public $timestamps= false;

    public function ojos(): HasMany
    {
        return $this->hasMany(Ojo::class);
    }

    public function scopeWithColoresojosCount($query)
    {
        return $query->withCount('ojos');
    }

}
