<?php

namespace App\Models\Personas;

use App\Models\Apodo;
use App\Models\CaracteristicasFisicas;
use App\Models\Catalogos\Etnia\Lengua;
use App\Models\Catalogos\Etnia\Religion;
use App\Models\Contacto;
use App\Models\ContextoEconomico;
use App\Models\ContextoFamiliar;
use App\Models\ContextoSocial;
use App\Models\Escolaridad;
use App\Models\EstadoConyugal;
use App\Models\EstatusEscolaridad;
use App\Models\Etnia;
use App\Models\Expediente;
use App\Models\Genero;
use App\Models\GrupoVulnerable;
use App\Models\MediaFiliacion;
use App\Models\Nacionalidad;
use App\Models\Ocupacion;
use App\Models\Oficialidades\Folio;
use App\Models\RedSocial;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Reportes\Reporte;
use App\Models\SenasParticulares;
use App\Models\Sexo;
use App\Models\Telefono;
use App\Models\Ubicaciones\Direccion;
use App\Models\Ubicaciones\Estado;
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
        'sexo_id',
        'genero_id',
        'media_filiacion_id',
        'lugar_nacimiento_id',
        'religion_id',
        'lengua_id',
        'estado_conyugal_id',
        'escolaridad_id',
        'estatus_escolaridad_id',
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
        // Contexto social
        'numero_personas_vive'
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

    public function lugar_nacimiento(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'lugar_nacimiento_id');
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

    public function tamaño_ojos()
    {
        return $this->caracteristicasfisicas->tamaño_ojos->tamañoojos;
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

    public function senasParticulares(): HasMany
    {
        return $this->hasMany(SenasParticulares::class);
    }

    public function desaparecidos(): HasMany
    {
        return $this->hasMany(Desaparecido::class);
    }

    public function reportantes(): HasMany
    {
        return $this->hasMany(Reportante::class);
    }

    public function direcciones(): BelongsToMany
    {
        return $this->belongsToMany(Direccion::class, 'domicilios');
    }

    public function folios(): HasMany
    {
        return $this->hasMany(Folio::class, 'persona_id');
    }

    public function nacionalidades(): BelongsToMany
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
        return $this->hasMany(Apodo::class);
    }

    public function redesSociales(): HasMany
    {
        return $this->hasMany(Redsocial::class);
    }

    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class, 'religion_id');
    }

    public function lengua(): BelongsTo
    {
        return $this->belongsTo(Lengua::class, 'lenuga_id');
    }

    public function estadoConyugal(): BelongsTo
    {
        return $this->belongsTo(EstadoConyugal::class, 'estado_conyugal_id');
    }

    public function escolaridad(): BelongsTo
    {
        return $this->belongsTo(Escolaridad::class, 'escolaridad_id');
    }

    public function ocupaciones(): BelongsToMany
    {
        return $this->belongsToMany(Ocupacion::class, 'ocupacion_persona');
    }

    public function gruposVulnerables(): BelongsToMany
    {
        return $this->belongsToMany(GrupoVulnerable::class, "grupos_vulnerables_personas");
    }

    public function mediaFiliacion(): HasOne
    {
        return $this->hasOne(MediaFiliacion::class);
    }

    public function expedientes(): HasMany
    {
        return $this->hasMany(Expediente::class);
    }

    public function estatusEscolaridad(): BelongsTo
    {
        return $this->belongsTo(EstatusEscolaridad::class, 'estatus_escolaridad_id');
    }


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
