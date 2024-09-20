<?php

namespace App\Models;

use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DesaparicionForzada extends Model
{
    public $timestamps = false;

    protected $table = 'desapariciones_forzadas';

    protected $fillable = [
        'reporte_id',
        'autoridad_id',
        'particular_id',
        'metodo_captura_id',
        'medio_captura_id',
        'desaparecio_autoridad',
        'descripcion_autoridad',
        'descripcion_particular',
        'desaparecio_particular',
        'descripcion_metodo_captura',
        'descripcion_medio_captura',
        'detencion_previa_extorsion',
        'descripcion_detencion_previa_extorsion',
        'ha_sido_avistado',
        'donde_ha_sido_avistado',
        'delitos_desaparicion',
        'descripcion_delitos_desaparicion',
        'descripcion_grupo_perpetrador',
    ];

    protected $casts = [
        'desaparecio_autoridad' => 'boolean',
        'desaparecio_particular' => 'boolean',
        'detencion_previa_extorsion' => 'boolean',
        'ha_sido_avistado' => 'boolean',
        'delitos_desaparicion' => 'boolean',
    ];

    public function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }

    public function autoridad(): BelongsTo
    {
        return $this->belongsTo(Autoridad::class, 'autoridad_id');
    }

    public function particular(): BelongsTo
    {
        return $this->belongsTo(Particular::class, 'particular_id');
    }

    public function metodoCaptura(): BelongsTo
    {
        return $this->belongsTo(MetodoCaptura::class, 'metodo_captura_id');
    }

    public function medioCaptura(): BelongsTo
    {
        return $this->belongsTo(MedioCaptura::class, 'medio_captura_id');
    }
}
