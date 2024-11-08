<?php

namespace App\Models\Catalogos\CaracteristicasFisicas;

use App\Models\Salud;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ColorPiel extends Model
{
    protected $table = 'cat_colores_piel';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function salud(): HasMany
    {
        return $this->hasMany(Salud::class);
    }

    public function scopeWithColorespielCount($query)
    {
        return $query->withCount('Salud');
    }
}
