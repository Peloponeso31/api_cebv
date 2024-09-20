<?php

namespace App\Models;

use App\Models\Personas\Persona;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ContextoFamiliar extends Model
{
    use HasFactory;

    protected $table = 'contextos_familiares';

    // TODO: Completar model, controlador y resource
    protected $fillable = [
        'persona_id',
        'estado_conyugal_id',
        'numero_personas_vive',
        'nombre_pareja_conyugue',
    ];

    public $timestamps = false;

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function estadoConyugal(): BelongsTo
    {
        return $this->belongsTo(EstadoConyugal::class, 'estado_conyugal_id');
    }
}
