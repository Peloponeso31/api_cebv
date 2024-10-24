<?php

namespace App\Models\Ubicaciones;

use App\Models\Amistad;
use App\Models\DatoComplementario;
use App\Models\Estudio;
use App\Models\Personas\Persona;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Direccion extends Model
{
    use HasFactory, Searchable;

    protected $table = 'direcciones';

    protected $fillable = [
        'asentamiento_id',
        'direccion_concatenable',
        'calle',
        'colonia',
        'numero_exterior',
        'numero_interior',
        'calle_1',
        'calle_2',
        'tramo_carretero',
        'codigo_postal',
        'referencia',
    ];

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

    public function personas(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class, 'domicilios');
    }

    public function hechosDesaparicion(): HasMany
    {
        return $this->hasMany(HechoDesaparicion::class);
    }

    public function amistad(): BelongsToMany
    {
        return $this->belongsToMany(Amistad::class);
    }

    public function estudio(): HasMany
    {
        return $this->hasMany(Estudio::class);
    }

    public function datoComplementario(): HasMany
    {
        return $this->hasMany(DatoComplementario::class);
    }


    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'asentamiento_id' => $this->asentamiento_id,
            'calle' => $this->calle,
            'numero_exterior' => $this->numero_exterior,
            'numero_interior' => $this->numero_interior,
            'calle_1' => $this->calle_1,
            'calle_2' => $this->calle_2,
            'tramo_carretero' => $this->tramo_carretero,
            'codigo_postal' => $this->codigo_postal,
            'referencia' => $this->referencia,
        ];
    }
}
