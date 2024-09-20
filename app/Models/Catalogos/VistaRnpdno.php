<?php

namespace App\Models\Catalogos;

use App\Models\SenasParticulares;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VistaRnpdno extends Model
{
    use HasFactory;
    protected $table = "vista_rnpdno";
    public $timestamps = false;

    public function senas_particulares(): HasMany {
        return $this->hasMany(SenasParticulares::class);
    }
}
