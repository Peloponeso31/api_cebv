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
   
    public function reporto(): HasMany
    {
        return $this->hasMany(Reporte::class, 'reportante_id');
    }

    public function reportada(): HasOne
    {
        return $this->hasOne(Reporte::class, 'reportada_id');
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

    public function caracteristicasfisicas(): HasOne
    {
        return $this->hasOne(CaracteristicasFisicas::class);
    }
    public function etnia(): HasOne
    {
        return $this->hasOne(Etnia::class);
    }
}
