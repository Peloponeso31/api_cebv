<?php

namespace App\Models;

use App\Models\Informaciones\Sitio;
use App\Models\Oficialidades\Area;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Ubicaciones\Municipio;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Localizacion extends Model
{
    public $timestamps = false;

    protected $table = 'localizaciones';

    protected $fillable = [
        'desaparecido_id',
        'sitio_id',
        'area_id',
        'municipio_localizacion_id',
        'hipotesis_deb_id',
        'fecha_localizacion',
        'fecha_hallazgo',
        'fecha_identificacion_familiar',
        'sintesis_localizacion',
        'descripcion_condicion_persona',
        'descripcion_causas_fallecimiento',
    ];

    protected $casts = [
        'fecha_localizacion' => 'datetime',
        'fecha_hallazgo' => 'datetime',
        'fecha_identificacion_familiar' => 'datetime',
    ];

    public function desaparecido(): BelongsTo
    {
        return $this->belongsTo(Desaparecido::class, 'desaparecido_id');
    }

    public function sitio(): BelongsTo
    {
        return $this->belongsTo(Sitio::class, 'sitio_id');
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function municipioLocalizacion(): BelongsTo
    {
        return $this->belongsTo(Municipio::class, 'municipio_localizacion_id');
    }

    public function hipotesisDeb(): BelongsTo
    {
        return $this->belongsTo(TipoHipotesisInmediata::class, 'hipotesis_deb_id');
    }
}
