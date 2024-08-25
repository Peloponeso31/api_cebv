<?php

namespace App\Models\Catalogos\CaracteristicasFisicas;

use App\Models\Oreja;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TamanoOrejas extends Model
{
    protected $table = 'cat_tamanos_orejas';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function orejas(): HasMany
    {
        return $this->hasMany(Oreja::class);
    }
}
