<?php

namespace App\Models\Personas;

use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    /**
     * The reportes that belong to the persona.
     *
     * @return BelongsToMany
     */
    public function desaparecidos(): HasMany
    {
        return $this->hasMany(Desaparecido::class, 'persona_id');
    }

    public function reportantes(): HasMany
    {
        return $this->hasMany(Reportante::class, 'persona_id');
    }

    public function domicilios(): BelongsToMany
    {
        return $this->belongsToMany(Direccion::class, 'domicilios');
    }
}
