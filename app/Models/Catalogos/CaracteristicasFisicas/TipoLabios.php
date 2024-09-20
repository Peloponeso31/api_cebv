<?php

namespace App\Models\Catalogos\CaracteristicasFisicas;

use App\Models\Boca;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoLabios extends Model
{
    protected $table='cat_tamanos_labios';

    protected $fillable=['nombre'];

    public $timestamps= false;

    public function bocas(): HasMany
    {
        return $this->hasMany(Boca::class);
    }
}
