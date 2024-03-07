<?php

namespace App\Models\Reportes;

use App\Models\Reportes\Hipotesis\Hipotesis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    protected $table = 'areas';

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
}
