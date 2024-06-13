<?php

namespace App\Models\Catalogos;

use App\Models\Catalogos\MediaFiliacion\ColorVellofacial;
use App\Models\Catalogos\MediaFiliacion\CorteVellofacial;
use App\Models\Catalogos\MediaFiliacion\RegionVellofacial;
use App\Models\Catalogos\MediaFiliacion\VolumenVellofacial;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class VelloFacial extends Model
{
    use HasFactory;

    protected $table = 'vello_facials';

    protected $fillable = [
        "persona_id",
        "regionVellofacial_id",
        "corteVellofacial_id",
        "colorVellofacial_id",
        "volumenVellofacial_id",    
        "modificacionVellofacial"
    ];

    public function regionVellofacial(): BelongsTo {
        return $this->belongsTo(RegionVellofacial::class);
    }
    

    public function corteVellofacial(): BelongsTo {
        return $this->belongsTo(CorteVellofacial::class);
    }

    public function colorVellofacial(): BelongsTo {
        return $this->belongsTo(ColorVellofacial::class);
    }

    public function volumenVellofacial(): BelongsTo {
        return $this->belongsTo(VolumenVellofacial::class);
    }
    
    public function persona(): BelongsTo {
        return $this->belongsTo(Persona::class);
    }
}
