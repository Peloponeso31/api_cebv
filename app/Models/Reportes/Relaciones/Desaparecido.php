<?php

namespace App\Models\Reportes\Relaciones;

use App\Models\Ocupacion;
use App\Models\Personas\EstatusPersona;
use App\Models\Personas\Persona;
use App\Models\Reportes\Reporte;
use App\Models\Ubicaciones\Municipio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Desaparecido extends Model
{
    protected $table = 'desaparecidos';

    protected $fillable = [
        'reporte_id',
        'persona_id',
        'estatus_rpdno_id',
        'estatus_cebv_id',
        'ocupacion_principal_id',
        'ocupacion_secundaria_id',
        'clasificacion_persona',
        'habla_espanhol',
        'sabe_leer',
        'sabe_escribir',
        'url_boletin',
        'declaracion_especial_ausencia',
        'accion_urgente',
        'dictamen',
        'ci_nivel_federal',
        'otro_derecho_humano',
        'identidad_resguardada',
        'alias',
        'descripcion_ocupacion_principal',
        'descripcion_ocupacion_secundaria',
        'otras_especificaciones_ocupacion',
        'nombre_pareja_conyugue',
    ];

    protected $casts = [
        'habla_espanhol' => 'boolean',
        'sabe_leer' => 'boolean',
        'sabe_escribir' => 'boolean',
        'declaracion_especial_ausencia' => 'boolean',
        'accion_urgente' => 'boolean',
        'dictamen' => 'boolean',
        'ci_nivel_federal' => 'boolean',
    ];

    protected function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class);
    }

    protected function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }

    protected function estatusRpdno(): BelongsTo
    {
        return $this->belongsTo(EstatusPersona::class, 'estatus_rpdno_id');
    }

    protected function estatusCebv(): BelongsTo
    {
        return $this->belongsTo(EstatusPersona::class, 'estatus_cebv_id');
    }

    public function ubicacionAmparoBuscador(): BelongsTo
    {
        return $this->belongsTo(Municipio::class);
    }

    public function prendaDeVestir(): HasMany
    {
        return $this->hasMany(Municipio::class);
    }

    public function documentosLegales(): HasMany
    {
        return $this->hasMany(DocumentoLegal::class);
    }

    public function ocupacionPrincipal(): BelongsTo
    {
        return $this->belongsTo(Ocupacion::class, 'ocupacion_principal_id');
    }

    public function ocupacionSecundaria(): BelongsTo
    {
        return $this->belongsTo(Ocupacion::class, 'ocupacion_secundaria_id');
    }
}
