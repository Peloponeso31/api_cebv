<?php

namespace App\Models\Catalogos;

use App\Models\CaracteristicasFisicas;
use App\Models\MediaFiliacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoCabello extends Model
{
    use HasFactory;
    protected $table='tipo_cabellos';
    protected $fillable=['tipo'];
    public $timestamps= true;

    public function caracteristicas_fisicas():HasMany {
        return $this->hasMany(CaracteristicasFisicas::class);
    }

    public function  MediasFiliaciones(): HasMany
    {
        return $this->hasMany(MediaFiliacion::class);
    }
}
