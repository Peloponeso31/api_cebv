<?php

namespace App\Models\Catalogos\CaracteristicasFisicas;

use App\Models\CaracteristicasFisicas;
use App\Models\MediaFiliacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Complexion extends Model
{
    protected $table = 'cat_complexiones';

    public $timestamps = false;

    protected $fillable = ['nombre'];


    public function caracteristicas_fisicas(): HasMany
    {
        return $this->hasMany(CaracteristicasFisicas::class);
    }

    public function  mediasFiliaciones(): HasMany
    {
        return $this->hasMany(MediaFiliacion::class);
    }
}
