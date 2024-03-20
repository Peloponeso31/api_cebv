<?php

namespace App\Models\Personas;

use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstatusPersona extends Model
{
    protected $table = 'estatus_personas';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'abreviatura'
    ];

    public function desaparecidosRpdno(): HasMany
    {
        return $this->hasMany(Desaparecido::class, 'estatus_rpdno_id');
    }

    public function desaparecidosCebv(): HasMany
    {
        return $this->hasMany(Desaparecido::class, 'estatus_cebv_id');
    }
}
