<?php

namespace App\Models\Catalogos\CaracteristicasFisicas;

use App\Models\MediaFiliacion;
use App\Models\Salud;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Complexion extends Model
{
    protected $table = 'cat_complexiones';

    public $timestamps = false;

    protected $fillable = ['nombre'];

    public function  mediasFiliaciones(): HasMany
    {
        return $this->hasMany(MediaFiliacion::class);
    }

    public function salud(): HasMany
    {
        return $this->hasMany(Salud::class);
    }
}
