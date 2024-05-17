<?php

namespace App\Models\CondicionVulnerabilidad;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CondicionVulnerabilidad extends Model
{
    use HasFactory;

    protected $table = 'condicion_vulnerabilidad';
    public $timestamps = false;

    protected $fillable = [
        'tipo_sangre_id',
        'condicion',
        'tratamiento',
        'naturaleza',
        'condicion_actualmente',
        'pertenencia_g_e',
        'enfoque_diferenciado',
        'caracteristicas_vulnerabilidad',
        'info_localizacion',
        'embarazo',
        'meses_embarazo'
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }

    public function sangre(): BelongsTo
    {
        return $this->belongsTo(Sangre::class);
    }
}
