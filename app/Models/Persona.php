<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Reporte;
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

    public function reporto(): HasMany
    {
        return $this->hasMany(Reporte::class, 'reportante_id');
    }

    public function reportada(): HasOne
    {
        return $this->hasOne(Reporte::class, 'reportada_id');
    }

    public function desaparicion(): HasMany
    {
        return $this->hasMany(Desaparicion::class);
    }

    public function senasparticulares(): HasMany
    {
        return $this->hasMany(SenasParticulares::class);
    }
}
