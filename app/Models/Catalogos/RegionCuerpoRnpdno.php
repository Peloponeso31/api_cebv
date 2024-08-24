<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\SenasParticulares;

class RegionCuerpoRnpdno extends Model
{
    use HasFactory;

    protected $table = "region_cuerpo_rnpdno";
    public $timestamps = false;

    public function senas_particulares(): HasMany {
        return $this->hasMany(SenasParticulares::class);
    }
}
