<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContextoEconomico extends Model
{
    use HasFactory;

    protected $table = 'contextos_economicos';

    protected $fillable = [
        'persona_id',
        'donde_trabaja',
        'antiguedad_trabajo',
        'gusta_trabajo',
        'desea_trabajo_foraneo',
        'ubicacion_trabajo_foraneo',
        'violencia_laboral',
        'violentador_laboral',
        'tiene_deudas',
        'monto_deuda',
        'deuda_con',
    ];

    protected $casts = [
        'gusta_trabajo' => 'boolean',
        'desea_trabajo_foraneo' => 'boolean',
        'violencia_laboral' => 'boolean',
        'tiene_deudas' => 'boolean',
    ];


    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
