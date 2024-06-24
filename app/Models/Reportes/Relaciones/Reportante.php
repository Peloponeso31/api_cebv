<?php

namespace App\Models\Reportes\Relaciones;

use App\Models\Personas\Parentesco;
use App\Models\Personas\Persona;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Reportante extends Model
{
    use Searchable;

    protected $table = 'reportantes';

    protected $fillable = [
        'persona_id',
        'reporte_id',
        'parentesco_id',
        'colectivo_id',
        'denuncia_anonima',
        'informacion_consentimiento',
        'informacion_exclusiva_busqueda',
        'publicacion_registro_nacional',
        'publicacion_boletin',
        'informacion_relevante'
    ];

    protected $casts = [
        'denuncia_anonima' => 'boolean',
        'informacion_consentimiento' => 'boolean',
        'informacion_exclusiva_busqueda' => 'boolean',
        'publicacion_registro_nacional' => 'boolean',
        'publicacion_boletin' => 'boolean',
    ];

    protected function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class);
    }

    protected function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }

    protected function parentesco(): BelongsTo
    {
        return $this->belongsTo(Parentesco::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'reporte_id' => $this->reporte_id,
            'denuncia_anonima' => $this->denuncia_anonima,
            'informacion_consentimiento' => $this->informacion_consentimiento,
            'informacion_exclusiva_busqueda' => $this->informacion_exclusiva_busqueda,
            'publicacion_registro_nacional' => $this->publicacion_registro_nacional,
            'publicacion_boletin' => $this->publicacion_boletin,
            'pertenencia_colectivo' => $this->pertenencia_colectivo,
            'nombre_colectivo' => $this->nombre_colectivo,
            'informacion_relevante' => $this->informacion_relevante,
        ];
    }
}
