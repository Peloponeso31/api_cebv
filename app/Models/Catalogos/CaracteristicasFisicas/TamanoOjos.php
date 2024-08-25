<?php

namespace App\Models\Catalogos\CaracteristicasFisicas;

use App\Models\Ojo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TamanoOjos extends Model
{
    protected $table= 'cat_tamanos_ojos';

    protected $fillable=['nombre'];

    public $timestamps= false;

    public function ojos(): HasMany
    {
        return $this->hasMany(Ojo::class);
    }
}
