<?php

namespace App\Models\Catalogos;

use App\Models\Catalogos\MediaFiliacion\TipoProyeccionMenton;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class ProyeccionMenton extends Model
{
    use HasFactory;

    protected $table = 'proyeccion_mentons';
    public $timestamps= true;
    protected $fillable = [
        "persona_id",
        "tipoProyeccionMenton_id",   
        "modificacionProyeccionMenton",
        'cirugiasProyeccionMenton'
    ];

    public function tipoProyeccionMenton(): BelongsTo {
        return $this->belongsTo(TipoProyeccionMenton::class);
    }
    
    public function persona(): BelongsTo {
        return $this->belongsTo(Persona::class);
    }

}
