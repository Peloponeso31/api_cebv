<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoVehiculo extends Model
{
    public $timestamps = false;

    protected $table = 'cat_tipos_vehiculos';

    protected $fillable = [
        'nombre',
    ];

    public function vehiculos(): HasMany
    {
        return $this->hasMany(Vehiculo::class);
    }

    public function scopeWithTiposvehiculosCount($query)
    {
        return $query->withCount('vehiculos');
    }
}
