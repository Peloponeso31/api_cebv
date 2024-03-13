<?php

namespace App\Models;

use App\Models\Reportes\Informacion\HechoDesaparicion;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'curp',
        'ocupacion',
        'sexo',
        'genero',
    ];

    public function domicilio(): HasOne
    {
        return $this->hasOne(Domicilio::class);
    }
  
    /**
     * The reportes that belong to the persona.
     *
     * @return BelongsToMany
     */
    public function reportes(): BelongsToMany
    {
        return $this->belongsToMany(Reporte::class);
    }
}
