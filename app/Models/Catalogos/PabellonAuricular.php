<?php

namespace App\Models\Catalogos;

use App\Models\Catalogos\MediaFiliacion\MoodificacionPabellonAuricular;
use App\Models\Catalogos\MediaFiliacion\TipoPabellonAuricular;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class PabellonAuricular extends Model
{
    use HasFactory;

    protected $table = 'pabellon_auriculars';

    protected $fillable = [
        "persona_id",
        "tipoPabellonAuricular_id",
        "modificacionPabellonAuricular_id",    
        "cirugiasPabellonAuricular"
    ];

    public function tipoPabellonAuricular(): BelongsTo {
        return $this->belongsTo(TipoPabellonAuricular::class);
    }

    public function modificacionPabellonAuricular(): BelongsTo {
        return $this->belongsTo(MoodificacionPabellonAuricular::class);
    }

    public function persona(): BelongsTo {
        return $this->belongsTo(Persona::class);
    }
}
