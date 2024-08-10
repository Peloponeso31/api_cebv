<?php

namespace App\Models;

use App\Models\Catalogos\CaracteristicasFisicas\ColorCabello;
use App\Models\Catalogos\CaracteristicasFisicas\ColorOjos;
use App\Models\Catalogos\CaracteristicasFisicas\ColorPiel;
use App\Models\Catalogos\CaracteristicasFisicas\Complexion;
use App\Models\Catalogos\CaracteristicasFisicas\TipoCabello;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MediaFiliacion extends Model
{
    use HasFactory;

    protected $table = 'medias_filiaciones';

    protected $fillable = [
        "persona_id",
        "estatura",
        "peso",
        "complexion_id",
        "color_piel_id",
        "color_ojos_id",
        "color_cabello_id",
        "tamano_cabello_id",
        "tipo_cabello_id",
    ];

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

    public function colorOjos(): BelongsTo
    {
        return $this->belongsTo(ColorOjos::class, 'color_ojos_id');
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
}
