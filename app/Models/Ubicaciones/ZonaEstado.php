<?php

namespace App\Models\Ubicaciones;

use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ZonaEstado extends Model
{
    public $timestamps = false;

    protected $table = 'zonas_estados';

    protected $fillable = [
        'nombre',
        'abreviatura',
    ];

    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class);
    }
}
