<?php

namespace App\Models;

use App\Models\Catalogos\PrendaVestir;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Color extends Model
{
    use HasFactory;

    protected $table = 'cat_colores';

    protected $fillable = [
        'nombre'
    ];

    public $timestamps = false;

    public function prendaVestir(): HasMany
    {
        return $this->hasMany(PrendaVestir::class);
    }

    public function vehiculos(): HasMany
    {
        return $this->hasMany(Vehiculo::class);
    }

    public function scopeWithColoresCount($query)
    {
        return $query->withCount('prendaVestir');
    }
}
