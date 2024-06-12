<?php

namespace App\Models\Personas;

use App\Models\Apodo;
use App\Models\CaracteristicasFisicas;
use App\Models\Contacto;
use App\Models\ContextoEconomico;
use App\Models\ContextoFamiliar;
use App\Models\ContextoSocial;
use App\Models\Etnia;
use App\Models\Genero;
use App\Models\Nacionalidad;
use App\Models\Oficialidades\Folio;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Reportes\Reporte;
use App\Models\SenasParticulares;
use App\Models\Sexo;
use App\Models\Telefono;
use App\Models\Ubicaciones\Direccion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class Persona extends Model
{
    use HasFactory, Searchable;

    protected $table = 'personas';

    protected $fillable = [
        'lugar_nacimiento_id',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'pseudonimo_nombre',
        'pseudonimo_apellido_paterno',
        'pseudonimo_apellido_materno',
        'fecha_nacimiento',
        'curp',
        'observaciones_curp',
        'rfc',
        'ocupacion',
        'sexo_al_nacer',
        'genero',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public function sexo(): BelongsTo
    {
        return $this->belongsTo(Sexo::class, 'sexo_id');
    }

    public function genero(): BelongsTo
    {
        return $this->belongsTo(Genero::class, 'genero_id');
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

    public function caracteristicasfisicas(): HasOne
    {
        return $this->hasOne(CaracteristicasFisicas::class);
    }

    public function color_ojos()
    {
        return $this->caracteristicasfisicas->color_ojos->color;
    }

    public function color_piel()
    {
        return $this->caracteristicasfisicas->color_piel->colorpiel;
    }

    public function color_cabello()
    {
        return $this->caracteristicasfisicas->color_cabello->colorcabellos;
    }

    public function tipo_cabello()
    {
        return $this->caracteristicasfisicas->tipo_cabello->tipocabello;
    }

    public function contexto_familiar(): HasOne
    {
        return $this->hasOne(ContextoFamiliar::class);
    }

    public function contexto_economico(): HasOne
    {
        return $this->hasOne(ContextoEconomico::class);
    }

    public function contexto_social(): HasOne
    {
        return $this->hasOne(ContextoSocial::class);
    }


    public function etnia(): HasOne
    {
        return $this->hasOne(Etnia::class);
    }

    public function senasparticulares(): HasMany
    {
        return $this->hasMany(SenasParticulares::class);
    }

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

    public function folios(): HasMany
    {
        return $this->hasMany(Folio::class, 'persona_id');
    }

    public function nacionalidads(): BelongsToMany
    {
        return $this->belongsToMany(Nacionalidad::class);
    }

    public function telefonos(): HasMany
    {
        return $this->hasMany(Telefono::class);
    }

    public function contactos(): HasMany
    {
        return $this->hasMany(Contacto::class);
    }

    public function apodos(): HasMany
    {
        return $this->hasMany(Apodo::class, 'persona_id');
    }

    // TODO: Relacionar con el modelo de escolaridad
    // TODO: Relacionar con estado conyugal
    // TODO: Modelo y catalogo de redes sociales (tipo de red socual, usuario y observaciones).
    // TODO: Modelo y catalogo de ocupaciones.

    public function toSearchableArray()
    {
        return [
            'nombre' => $this->nombre,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'pseudonimo_nombre' => $this->pseudonimo_nombre,
            'pseudonimo_apellido_paterno' => $this->pseudonimo_apellido_paterno,
            'pseudonimo_apellido_materno' => $this->pseudonimo_apellido_materno,
        ];
    }
}
