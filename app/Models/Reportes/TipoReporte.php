<?php

namespace App\Models\Reportes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class TipoReporte extends Model
{
    use Searchable;

    protected $table = 'tipos_reportes';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    /**
     * Get all the reportes for the tipo de reporte.
     *
     * @return HasMany
     */
    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
        ];
    }
}
