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
use Illuminate\Database\Eloquent\Relations\HasOne;

class MediaFiliacion extends Model
{
    use HasFactory;

    protected $table = 'medias_filiaciones';

    protected $guarded = [];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function complexion(): BelongsTo
    {
        return $this->belongsTo(Complexion::class, 'complexion_id');
    }

    public function colorPiel(): BelongsTo
    {
        return $this->belongsTo(ColorPiel::class, 'color_piel_id');
    }

    public function formaCara(): HasOne
    {
        return $this->hasOne(FormaCara::class, 'id', 'forma_cara_id');
    }

    public function formaOjos(): HasOne
    {
        return $this->hasOne(FormaOjo::class, 'id', 'forma_ojos_id');
    }

    public function tamanoOjos(): HasOne
    {
        return $this->hasOne(TamanoOjos::class, "id", "tamano_ojos_id");
    }

    public function colorOjos(): BelongsTo
    {
        return $this->belongsTo(ColorOjos::class, 'color_ojos_id');
    }

    public function calvicie(): HasOne
    {
        return $this->hasOne(Calvicie::class, 'id', 'calvicie_id');
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

    public function tipoCeja(): HasOne
    {
        return $this->hasOne(Ceja::class, 'id', 'tipo_ceja_id');
    }

    public function tipoNariz(): HasOne
    {
        return $this->hasOne(TipoNariz::class, 'id', 'tipo_nariz_id');
    }

    public function tamanoBoca(): HasOne
    {
        return $this->hasOne(TamanoBoca::class, 'id', 'tamano_boca_id');
    }

    public function tamanoLabios(): HasOne
    {
        return $this->hasOne(TipoLabios::class, 'id', 'tamano_labios_id');
    }

    public function tamanoOrejas(): HasOne
    {
        return $this->hasOne(TamanoOrejas::class, 'id', 'tamano_orejas_id');
    }

    public function formaOrejas(): HasOne
    {
        return $this->hasOne(FormaOreja::class, 'id', 'tamano_orejas_id');
    }
}
