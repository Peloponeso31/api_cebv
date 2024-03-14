<?php

namespace App\Models\Catalogos;

use App\Models\CaracteristicasFisicas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoLabios extends Model
{
    use HasFactory;
    public function caracteristicas_fisicas():HasMany {
        return $this->hasMany(CaracteristicasFisicas::class);
    }
}
