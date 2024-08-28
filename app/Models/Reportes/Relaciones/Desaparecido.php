<?php

namespace App\Models\Reportes\Relaciones;

use App\Models\Catalogos\PrendaVestir;
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
       'clasificacion_persona',
       'habla_espanhol',
       'url_boletin',
       'declaracion_especial_ausencia',
       'accion_urgente',
       'dictamen',
       'ci_nivel_federal',
       'otro_derecho_humano',
       'fecha_nacimiento_aproximada',
       'fecha_nacimiento_cebv',
       'observaciones_fecha_nacimiento',
       'edad_momento_desaparicion_anos',
       'edad_momento_desaparicion_meses',
       'edad_momento_desaparicion_dias',
       'identidad_resguardada',
       'alias',
       'boletin_img_path',
    ];

    protected $casts = [
        'habla_espanhol' => 'boolean',
        'declaracion_especial_ausencia' => 'boolean',
        'accion_urgente' => 'boolean',
        'dictamen' => 'boolean',
        'ci_nivel_federal' => 'boolean',
    ];

    protected function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }

    protected function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    protected function estatusRpdno(): BelongsTo
    {
        return $this->belongsTo(EstatusPersona::class, 'estatus_rpdno_id');
    }

    protected function estatusCebv(): BelongsTo
    {
        return $this->belongsTo(EstatusPersona::class, 'estatus_cebv_id');
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

    public function prendasVestir(): HasMany
    {
        return $this->hasMany(PrendaVestir::class);
    }
}
