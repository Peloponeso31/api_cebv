<?php

namespace App\Models;

//Se agregan los catalogos complementarios
use App\Models\Catalogos\AusenciaDientes;
use App\Models\Catalogos\TratamientoDental;
use App\Models\Catalogos\TipoMenton;
use App\Models\Catalogos\EspecificacionMenton;
use App\Models\Catalogos\RegionDeformacion;
use App\Models\Catalogos\EspecificacionDeformacion;
use App\Models\Catalogos\IntervencionQuirurgica;
use App\Models\Catalogos\EspecificacionIntervencionQuirurgica;
use App\Models\Catalogos\TipoEnfermedadPiel;
use App\Models\Catalogos\EspecificacionEnfermedad;
use App\Models\Catalogos\ObservacionesGenerales;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MediaFiliacion extends Model
{
    use HasFactory;

    protected $fillable= [
        "persona_id",
        "ausencia_dientes_id",
        "tratamiento_dental_id",
        "tipo_menton_id",
        "especificacion_menton_id",
        "region_deformacion_id",
        "especificacion_deformacion_id",
        "intervencion_quirurgica_id",
        "especificacion_intervencion_quirurgica_id",
        "tipo_enfermedad_piel_id",
        "especificacion_enfermedad_id",
        "observaciones_generales_id",
    ];

    public function persona():BelongsTo{
        return $this->belongsTo(Persona::class);
    }

    public function ausencia_dientes():BelongsTo{
        return $this->belongsTo(AusenciaDientes::class);
    }

    public function tratamiento_dental():BelongsTo{
        return $this->belongsTo(TratamientoDental::class);
    }
    
    public function tipo_menton():BelongsTo{
        return $this->belongsTo(TipoMenton::class);
    }

    public function especificacion_menton():BelongsTo{
        return $this->belongsTo(EspecificacionMenton::class);
    }

    public function region_deformacion():BelongsTo{
        return $this->belongsTo(RegionDeformacion::class);
    }

    public function especificacion_deformacion():BelongsTo{
        return $this->belongsTo(EspecificacionDeformacion::class);
    }

    public function intervencion_quirurgica():BelongsTo{
        return $this->belongsTo(IntervencionQuirurgica::class);
    }

    public function especificacion_intervencion_quirurgica():BelongsTo{
        return $this->belongsTo(EspecificacionIntervencionQuirurgica::class);
    }

    public function tipo_enfermedad_piel():BelongsTo{
        return $this->belongsTo(TipoEnfermedadPiel::class);
    }

    public function especificacion_enfermedad():BelongsTo{
        return $this->belongsTo(EspecificacionEnfermedad::class);
    }

    public function observaciones_generales():BelongsTo{
        return $this->belongsTo(ObservacionesGenerales::class);
    }
}
