<?php

namespace App\Models\Ubicaciones;

use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Direccion extends Model
{
    // TODO Remove this line in production
    use HasFactory;

    protected $table = 'direcciones';

    public $timestamps = false;

    /**
     * Get the asentamiento that owns the direccion.
     *
     * @return BelongsTo
     */
    public function asentamiento(): BelongsTo
    {
        return $this->belongsTo(Asentamiento::class, 'asentamiento_id');
    }

    /**
     * Get the reportes for the direccion.
     *
     * @return HasMany
     */
    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class);
    }
}
