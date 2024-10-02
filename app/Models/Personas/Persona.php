<?php

namespace App\Models\Personas;

use App\Models\Amistad;
use App\Models\Boca;
use App\Models\Cabello;
use App\Models\ClubPersona;
use App\Models\EnfoquePersonal;
use App\Models\Nariz;
use App\Models\OcupacionPersona;
use App\Models\Ojo;
use App\Models\Oreja;
use App\Models\PasatiempoPersona;
use App\Models\Pseudonimo;
use App\Models\Catalogos\Etnia\Lengua;
use App\Models\Catalogos\Etnia\Religion;
use App\Models\Club;
use App\Models\CondicionSalud;
use App\Models\Contacto;
use App\Models\ContextoEconomico;
use App\Models\ContextoFamiliar;
use App\Models\ContextoSocial;
use App\Models\Embarazo;
use App\Models\Empleado\Empleado;
use App\Models\EnfermedadPiel;
use App\Models\EnfoqueDiferenciado;
use App\Models\EstadoConyugal;
use App\Models\Estudio;
use App\Models\Etnia;
use App\Models\Expediente;
use App\Models\Familiar;
use App\Models\Genero;
use App\Models\GrupoVulnerable;
use App\Models\IntervencionQuirurgica;
use App\Models\MediaFiliacionComplementaria;
use App\Models\Nacionalidad;
use App\Models\Ocupacion;
use App\Models\Oficialidades\Folio;
use App\Models\Pasatiempo;
use App\Models\RazonCurp;
use App\Models\RedSocial;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Salud;
use App\Models\SenasParticulares;
use App\Models\Sexo;
use App\Models\Telefono;
use App\Models\TipoEnfoqueDiferenciado;
use App\Models\Ubicaciones\Direccion;
use App\Models\Ubicaciones\Estado;
use App\Models\VelloFacial;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'sexo_id',
        'genero_id',
        'religion_id',
        'lengua_id',
        'razon_curp_id',
        'lugar_nacimiento_id',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'apodo',
        'fecha_nacimiento',
        'curp',
        'observaciones_curp',
        'rfc',
        'habla_espanhol',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'datetime',
        'habla_espanhol' => 'boolean',
    ];

    public function nombreCompleto()
    {
        return $this->nombre . ' ' . $this->apellido_paterno . ' ' . $this->apellido_materno;
    }

    /**
     * Atributos propios de persona
     */
    public function edadAnhos(): int
    {
        return Carbon::parse($this->attributes['fecha_nacimiento'])->age;
    }

    public function fechaNacimientoLegible(): string
    {
        return Carbon::parse($this->attributes['fecha_nacimiento'])->translatedFormat("d \d\\e F \d\\e Y");
    }

    // TODO: Revisar todo este bloque pq creo que me lo desmadré
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

    /**
     * LLaves foráneas
     */
    /**
     * @return BelongsTo
     */
    public function sexo(): BelongsTo
    {
        return $this->belongsTo(Sexo::class, 'sexo_id');
    }

    /**
     * @return BelongsTo
     */
    public function genero(): BelongsTo
    {
        return $this->belongsTo(Genero::class, 'genero_id');
    }

    /**
     * @return BelongsTo
     */
    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class, 'religion_id');
    }

    /**
     * @return BelongsTo
     */
    public function lengua(): BelongsTo
    {
        return $this->belongsTo(Lengua::class, 'lengua_id');
    }

    /**
     * @return BelongsTo
     */
    public function razonCurp(): BelongsTo
    {
        return $this->belongsTo(RazonCurp::class, 'razon_curp_id');
    }

    /**
     * @return BelongsTo
     */
    public function lugarNacimiento(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'lugar_nacimiento_id');
    }

    /**
     * Relaciones
     */
    public function contextoFamiliar(): HasOne
    {
        return $this->hasOne(ContextoFamiliar::class);
    }

    public function contextoEconomico(): HasOne
    {
        return $this->hasOne(ContextoEconomico::class);
    }

    public function contextoSocial(): HasOne
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
        return $this->belongsToMany(Nacionalidad::class, 'nacionalidad_persona');
    }

    public function telefonos(): HasMany
    {
        return $this->hasMany(Telefono::class);
    }

    public function contactos(): HasMany
    {
        return $this->hasMany(Contacto::class);
    }

    public function pseudonimos(): HasMany
    {
        return $this->hasMany(Pseudonimo::class);
    }

    public function redesSociales(): HasMany
    {
        return $this->hasMany(Redsocial::class);
    }


    public function estadoConyugal(): BelongsTo
    {
        return $this->belongsTo(EstadoConyugal::class, 'estado_conyugal_id');
    }

    public function ocupaciones(): BelongsToMany
    {
        return $this->belongsToMany(Ocupacion::class, 'ocupacion_persona')->using(OcupacionPersona::class);
    }

    public function getOcupaciones()
    {
        return OcupacionPersona::where('persona_id', $this->id)->get();
    }

    public function gruposVulnerables(): BelongsToMany
    {
        return $this->belongsToMany(GrupoVulnerable::class, "grupos_vulnerables_personas");
    }

    /**
     * Media Filiación
     */
    public function ojos(): HasOne
    {
        return $this->hasOne(Ojo::class);
    }

    public function cabello(): HasOne
    {
        return $this->hasOne(Cabello::class);
    }

    public function velloFacial(): HasOne
    {
        return $this->hasOne(VelloFacial::class);
    }

    public function nariz(): HasOne
    {
        return $this->hasOne(Nariz::class);
    }

    public function boca(): HasOne
    {
        return $this->hasOne(Boca::class);
    }

    public function oreja(): HasOne
    {
        return $this->hasOne(Oreja::class);
    }


    public function mediaFiliacionComplementaria(): HasOne
    {
        return $this->hasOne(MediaFiliacionComplementaria::class);
    }

    public function expedientes(): HasMany
    {
        return $this->hasMany(Expediente::class);
    }

    public function intervencionesQuirurgicas(): HasMany
    {
        return $this->hasMany(IntervencionQuirurgica::class);
    }

    public function enfermedadesPiel(): HasMany
    {
        return $this->hasMany(EnfermedadPiel::class);
    }

    public function condicionesSalud(): HasMany
    {
        return $this->hasMany(CondicionSalud::class);
    }

    public function salud(): HasOne
    {
        return $this->hasOne(Salud::class);
    }

    public function enfoqueDiferenciado(): HasOne
    {
        return $this->hasOne(EnfoqueDiferenciado::class);
    }

    public function familiares(): HasMany
    {
        return $this->hasMany(Familiar::class);
    }

    public function amistades(): HasMany
    {
        return $this->hasMany(Amistad::class);
    }

    public function pasatiempos(): BelongsToMany
    {
        return $this->belongsToMany(Pasatiempo::class, 'pasatiempo_persona')->using(PasatiempoPersona::class);
    }

    public function getPasatiempos()
    {
        return PasatiempoPersona::where('persona_id', $this->id)->get();
    }

    public function clubes(): BelongsToMany
    {
        return $this->belongsToMany(Club::class, 'club_persona')->using(ClubPersona::class);
    }

    public function getClubes()
    {
        return ClubPersona::where('persona_id', $this->id)->get();
    }

    public function estudio(): HasOne
    {
        return $this->hasOne(Estudio::class);
    }

    public function empleado(): HasMany
    {
        return $this->hasMany(Empleado::class);
    }

    public function embarazo(): HasOne
    {
        return $this->hasOne(Embarazo::class);
    }

    public function enfoquesPersonales(): BelongsToMany
    {
        return $this->belongsToMany(TipoEnfoqueDiferenciado::class)->using(EnfoquePersonal::class);
    }

    public function getEnfoquesPersonales()
    {
        return EnfoquePersonal::where('persona_id', $this->id)->get();
    }
}
