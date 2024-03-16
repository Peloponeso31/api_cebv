<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function edad_anos()
    {
        return Carbon::parse($this->attributes['fecha_nacimiento'])->age;
    }

    public function fecha_nacimiento_legible()
    {
        return Carbon::parse($this->attributes['fecha_nacimiento'])->translatedFormat("d \d\\e F \d\\e Y");
    }
  
    public function contexto_economico(): HasOne
    {
        return $this->hasOne(ContextoEconomico::class);
    }

    public function caracteristicasfisicas(): HasOne
    {
        return $this->hasOne(CaracteristicasFisicas::class);
    }
    public function etnia(): HasOne
    {
        return $this->hasOne(Etnia::class);
    }

    public function senasparticulares(): HasMany
    {
        return $this->hasMany(SenasParticulares::class);
    }
}
