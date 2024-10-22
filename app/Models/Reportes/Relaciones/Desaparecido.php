<?php

namespace App\Models\Reportes\Relaciones;

use App\Models\Catalogos\PrendaVestir;
use App\Models\Localizacion;
use App\Models\Oficialidades\Folio;
use App\Models\Personas\EstatusPersona;
use App\Models\Personas\Persona;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Desaparecido extends Model
{
    protected $table = 'desaparecidos';

    protected $fillable = [
        'reporte_id',
        'persona_id',
        'estatus_preliminar_id',
        'estatus_formalizado_id',
        'clasificacion_persona',
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
        'senas_particulares_boletin',
        'informacion_adicional_boletin',
        'boletin_img_path',
        'fecha_estatus_preliminar',
        'fecha_estatus_formalizado',
        'fecha_captura_estatus_formalizado',
        'observaciones_actualizacion_estatus',
    ];

    protected $casts = [
        'declaracion_especial_ausencia' => 'boolean',
        'accion_urgente' => 'boolean',
        'dictamen' => 'boolean',
        'ci_nivel_federal' => 'boolean',
        'fecha_estatus_preliminar' => 'date',
        'fecha_estatus_formalizado' => 'date',
        'fecha_captura_estatus_formalizado' => 'date',
    ];

    protected function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }

    protected function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function estatusPreliminar(): BelongsTo
    {
        return $this->belongsTo(EstatusPersona::class, 'estatus_preliminar_id');
    }

    public function estatusFormalizado(): BelongsTo
    {
        return $this->belongsTo(EstatusPersona::class, 'estatus_formalizado_id');
    }

    public function documentosLegales(): HasMany
    {
        return $this->hasMany(DocumentoLegal::class);
    }

    public function prendasVestir(): HasMany
    {
        return $this->hasMany(PrendaVestir::class);
    }

    public function folio(): ?Folio
    {
        return Folio::where('persona_id', $this->persona_id)
            ->where('reporte_id', $this->reporte_id)
            ->first();
    }

    public function localizacion(): HasOne
    {
        return $this->hasOne(Localizacion::class);
    }

}
