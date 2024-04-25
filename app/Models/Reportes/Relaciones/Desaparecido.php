<?php

namespace App\Models\Reportes\Relaciones;

use App\Models\Personas\EstatusPersona;
use App\Models\Personas\Persona;
use App\Models\Reportes\Reporte;
use App\Models\Ubicaciones\Municipio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Desaparecido extends Model
{
    protected $table = 'desaparecidos';

    protected $fillable = [
        'persona_id',
        'reporte_id',
        'clasificacion_persona',
        'habla_espanhol',
        'sabe_leer',
        "estatus_rpdno_id",
        "estatus_cebv_id",
        'sabe_escribir',
        'url_boletin',
    ];

    protected $casts = [
        'habla_espanhol' => 'boolean',
        'sabe_leer' => 'boolean',
        'sabe_escribir' => 'boolean',
    ];

    protected function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class);
    }

    protected function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }

    protected function estatusRpdno(): BelongsTo
    {
        return $this->belongsTo(EstatusPersona::class, 'estatus_rpdno_id');
    }

    protected function estatusCebv(): BelongsTo
    {
        return $this->belongsTo(EstatusPersona::class, 'estatus_cebv_id');
    }

    public function ubicacionAmparoBuscador(): BelongsTo
    {
        return $this->belongsTo(Municipio::class);
    }
}
