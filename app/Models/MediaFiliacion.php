<?php

namespace App\Models;

use App\Models\Catalogos\CaracteristicasFisicas\ColorCabello;
use App\Models\Catalogos\CaracteristicasFisicas\ColorOjos;
use App\Models\Catalogos\CaracteristicasFisicas\ColorPiel;
use App\Models\Catalogos\CaracteristicasFisicas\Complexion;
use App\Models\Catalogos\CaracteristicasFisicas\TamanoOjos;
use App\Models\Catalogos\CaracteristicasFisicas\TamanoOrejas;
use App\Models\Catalogos\CaracteristicasFisicas\TipoCabello;
use App\Models\Catalogos\CaracteristicasFisicas\TipoLabios;
use App\Models\Catalogos\CaracteristicasFisicas\TipoNariz;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MediaFiliacion extends Model
{
    use HasFactory;

    protected $table = 'medias_filiaciones';

    protected $fillable = [
        'persona_id',
        // Perfil Corporal
        'complexion_id',
        'color_piel_id',
        'forma_cara_id',
        'estatura_centimetros',
        'peso_kilogramos',
        // Ojos
        'color_ojos_id',
        'forma_ojos_id',
        'tamano_ojos_id',
        'especificaciones_ojos',
        // Cabello
        'calvicie_id',
        'color_cabello_id',
        'tamano_cabello_id',
        'tipo_cabello_id',
        'especificaciones_cabello',
        // Vello facial
        'cejas_id',
        'especificaciones_cejas',
        'tiene_bigote',
        'especificaciones_bigote',
        'tiene_barba',
        'especificaciones_barba',
        // Nariz
        'tipo_nariz_id',
        'especificaciones_nariz',
        // Boca
        'tamano_boca_id',
        'tamano_labios_id',
        'especificaciones_boca',
        // Orejas
        'tamano_orejas_id',
        'forma_orejas_id',
        'especificaciones_orejas',
    ];

    protected $casts = [
        'peso_kilogramos' => 'float',
        'tiene_bigote' => 'boolean',
        'tiene_barba' => 'boolean',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    /**
     * Perfil Corporal
     */
    public function complexion(): BelongsTo
    {
        return $this->belongsTo(Complexion::class, 'complexion_id');
    }

    public function colorPiel(): BelongsTo
    {
        return $this->belongsTo(ColorPiel::class, 'color_piel_id');
    }

    public function formaCara(): BelongsTo
    {
        return $this->belongsTo(FormaCara::class, 'forma_cara_id');
    }

    /**
     * Ojos
     */
    public function colorOjos(): BelongsTo
    {
        return $this->belongsTo(ColorOjos::class, 'color_ojos_id');
    }

    public function formaOjos(): BelongsTo
    {
        return $this->belongsTo(FormaOjo::class, 'forma_ojos_id');
    }

    public function tamanoOjos(): BelongsTo
    {
        return $this->belongsTo(TamanoOjos::class, 'tamano_ojos_id');
    }

    /**
     * Cabello
     */
    public function calvicie(): BelongsTo
    {
        return $this->belongsTo(Calvicie::class, 'calvicie_id');
    }

    public function colorCabello(): BelongsTo
    {
        return $this->belongsTo(ColorCabello::class, 'color_cabello_id');
    }

    public function tamanoCabello(): BelongsTo
    {
        return $this->belongsTo(TamanoCabello::class, 'tamano_cabello_id');
    }

    public function tipoCabello(): BelongsTo
    {
        return $this->belongsTo(TipoCabello::class, 'tipo_cabello_id');
    }

    /**
     * Vello facial
     */
    public function cejas(): BelongsTo
    {
        return $this->belongsTo(Ceja::class, 'cejas_id');
    }

    /**
     * Nariz
     */
    public function tipoNariz(): BelongsTo
    {
        return $this->belongsTo(TipoNariz::class, 'tipo_nariz_id');
    }

    /**
     * Boca
     */
    public function tamanoBoca(): BelongsTo
    {
        return $this->belongsTo(TamanoBoca::class, 'tamano_boca_id');
    }

    public function tamanoLabios(): BelongsTo
    {
        return $this->belongsTo(TipoLabios::class, 'tamano_labios_id');
    }

    /**
     * Orejas
     */
    public function tamanoOrejas(): BelongsTo
    {
        return $this->belongsTo(TamanoOrejas::class, 'tamano_orejas_id');
    }

    public function formaOrejas(): BelongsTo
    {
        return $this->belongsTo(FormaOreja::class, 'forma_orejas_id');
    }
}
