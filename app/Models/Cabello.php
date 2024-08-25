<?php

namespace App\Models;

use App\Models\Catalogos\CaracteristicasFisicas\ColorCabello;
use App\Models\Catalogos\CaracteristicasFisicas\TipoCabello;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cabello extends Model
{
    protected $table = 'cabellos';

    protected $fillable = [
        'persona_id',
        'calvicie_id',
        'color_cabello_id',
        'tamano_cabello_id',
        'tipo_cabello_id',
        'especificaciones_cabello',
    ];

    public $timestamps = false;

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

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
}
