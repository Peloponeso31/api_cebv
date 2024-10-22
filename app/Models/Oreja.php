<?php

namespace App\Models;

use App\Models\Catalogos\CaracteristicasFisicas\TamanoOrejas;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Oreja extends Model
{
    protected $table = 'orejas';

    protected $fillable = [
        'persona_id',
        'tamano_orejas_id',
        'forma_orejas_id',
        'especificaciones_orejas',
    ];

    public $timestamps = false;

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function tamanoOrejas(): BelongsTo
    {
        return $this->belongsTo(TamanoOrejas::class, 'tamano_orejas_id');
    }

    public function formaOrejas(): BelongsTo
    {
        return $this->belongsTo(FormaOreja::class, 'forma_orejas_id');
    }
}
