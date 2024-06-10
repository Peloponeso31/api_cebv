<?php

namespace App\Models\Catalogos\CaracteristicasFisicas;

use App\Models\CaracteristicasFisicas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peso extends Model
{
    use HasFactory;

    protected $table='pesos';
    protected $fillable=['peso'];
    public $timestamps= true;

    public function caracteristicas_fisicas():HasMany{
        return $this->hasMany(CaracteristicasFisicas::class);
    }
}
