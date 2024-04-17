<?php

namespace App\Models\Catalogos\CaracteristicasFisicas;

use App\Models\CaracteristicasFisicas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ColorPiel extends Model
{
    use HasFactory;
    protected $table='color_piels';
    protected $fillable=['colorpiel'];
    public $timestamps= true;

    public function caracteristicas_fisicas():HasMany{
        return $this->hasMany(CaracteristicasFisicas::class);
    }
}