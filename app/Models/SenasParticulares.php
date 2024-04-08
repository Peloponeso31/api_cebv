<?php

namespace App\Models;

use App\Models\Catalogos\Lado;
use App\Models\Catalogos\RegionCuerpo;
use App\Models\Catalogos\RegionCuerpoRnpdno;
use App\Models\Catalogos\Tipo;
use App\Models\Catalogos\Vista;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SenasParticulares extends Model
{
    use HasFactory;

    protected $table = 'senas_particulares';

    protected $fillable = [
        "persona_id",
        "region_cuerpo_id",
        //"region_cuerpo_rnpdno_id",
        "lado_id",
        "vista_id",
        "tipo_id",
        "cantidad",
        "descripcion",
        "foto",
    ];

    public function region_cuerpo(): BelongsTo {
        return $this->belongsTo(RegionCuerpo::class);
    }

    public function region_cuerpo_rnpdno(): BelongsTo {
        return $this->belongsTo(RegionCuerpoRnpdno::class);
    }

    public function vista(): BelongsTo {
        return $this->belongsTo(Vista::class);
    }

    public function lado(): BelongsTo {
        return $this->belongsTo(Lado::class);
    }

    public function tipo(): BelongsTo {
        return $this->belongsTo(Tipo::class);
    }

    public function persona(): BelongsTo {
        return $this->belongsTo(Persona::class);
    }
}
