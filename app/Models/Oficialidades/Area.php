<?php

namespace App\Models\Oficialidades;

use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Models\Reportes\Reporte;
use App\Models\Ubicaciones\Municipio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Area extends Model
{
    use Searchable;

    protected $table = 'areas';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    /**
     * Get the reportes for the area.
     *
     * @return HasMany
     */
    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class);
    }

    /**
     * Get the hipotesis for the area.
     *
     * @return HasMany
     */
    public function hipotesis(): HasMany
    {
        return $this->hasMany(Hipotesis::class);
    }

    public function municipios(): HasMany
    {
        return $this->hasMany(Municipio::class, 'area_atiende_id', 'id');
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id
        ];
    }
}
