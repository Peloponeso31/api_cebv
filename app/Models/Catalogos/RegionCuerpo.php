<?php

namespace App\Models\Catalogos;

use App\Models\SenasParticulares;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegionCuerpo extends Model
{
    protected $table = 'cat_regiones_cuerpo';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function senas_particulares(): HasMany
    {
        return $this->hasMany(SenasParticulares::class);
    }
}
