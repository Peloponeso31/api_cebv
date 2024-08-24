<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IntervencionQuirurgica extends Model
{
    public $timestamps = false;

    protected $table = 'intervenciones_quirurgicas';

    protected $fillable = [
        'persona_id',
        'tipo_intervencion_quirurgica_id',
        'descripcion',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function tipoIntervencionQuirurgica(): BelongsTo
    {
        return $this->belongsTo(TipoIntervencionQuirurgica::class, 'tipo_intervencion_quirurgica_id');
    }
}
