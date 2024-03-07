<?php

namespace App\Models\Reportes\Informacion;

use App\Models\Persona;
use App\Models\Reportes\Area;
use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Models\Reportes\Reporte;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HechoDesaparicion extends Model
{
    use HasFactory;

    protected $table = 'hechos_desapariciones';

    /**
     * Get the reporte that owns the hecho de desaparicion.
     *
     * @return BelongsTo
     */
    public function reportes(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }
}
