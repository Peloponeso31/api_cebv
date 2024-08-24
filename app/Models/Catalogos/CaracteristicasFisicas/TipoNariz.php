<?php

namespace App\Models\Catalogos\CaracteristicasFisicas;

use App\Models\CaracteristicasFisicas;
use App\Models\MediaFiliacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoNariz extends Model
{
    protected $table = 'cat_tipos_narices';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function caracteristicas_fisicas(): HasMany
    {
        return $this->hasMany(CaracteristicasFisicas::class);
    }

    public function mediasFiliaciones(): HasMany
    {
        return $this->hasMany(MediaFiliacion::class);
    }
}
