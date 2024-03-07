<?php

namespace App\Models;

use App\Models\Ubicaciones\Direccion;
use App\Models\Ubicaciones\Estado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Desaparicion extends Model
{
    use HasFactory;

    protected $table = 'desapariciones';

    public $timestamps = false;

    protected $fillable = [
        'persona_id',
        'direccion_id',
        'zona_estado',
        'area_id',
        'dependencia',
        'fecha_desaparicion',
        'fecha_percato',
        'cambio_comportamiento',
        'fue_amenazado',
        'descripcion_amenaza',
        'contador_desapariciones',
        'situacion_previa',
        'informacion_relevante',
        'hechos_desaparicion',
        'sintesis_desaparicion',
        'hipotesis_id',
    ];

    protected $casts = [
        'fecha_desaparicion' => 'datetime',
        'fecha_percato' => 'datetime',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function direccion(): BelongsTo
    {
        return $this->belongsTo(Direccion::class, 'direccion_id');
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function hipotesis(): BelongsTo
    {
        return $this->belongsTo(Hipotesis::class, 'hipotesis_id');
    }
}
