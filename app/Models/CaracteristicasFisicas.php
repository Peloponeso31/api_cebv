<?php

namespace App\Models;

use App\Models\Catalogos\Barba;
use App\Models\Catalogos\Bigote;
use App\Models\Catalogos\Calvicie;
use App\Models\Catalogos\EspecificacionBarba;
use App\Models\Catalogos\EspecificacionBigote;
use App\Models\Catalogos\EspecificacionCabello;
use App\Models\Catalogos\EspecificacionNariz;
use App\Models\Catalogos\EspecificacionOjos;
use App\Models\Catalogos\EspecificacionOreja;
use App\Models\Catalogos\Estatura;
use App\Models\Catalogos\FormaCara;
use App\Models\Catalogos\FormaOjos;
use App\Models\Catalogos\FormaOreja;
use App\Models\Catalogos\Peso;
use App\Models\Catalogos\TamanoBoca;
use App\Models\Catalogos\TamanoCabello;
use App\Models\Catalogos\TipoCeja;
use App\Models\Catalogos\ColorCabello;
use App\Models\Catalogos\ColorOjos;
use App\Models\Catalogos\ColorPiel;
use App\Models\Catalogos\Complexion;
use App\Models\Catalogos\TamanoOjos;
use App\Models\Catalogos\TamanoOrejas;
use App\Models\Catalogos\TipoCabello;
use App\Models\Catalogos\TipoLabios;
use App\Models\Catalogos\TipoNariz;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CaracteristicasFisicas extends Model
{
    use HasFactory;
    protected $fillable= [
        "persona_id",
        "tipo_cabello_id",
        "color_cabello_id",
        "color_ojos_id",
        "tamano_ojos_id",
        "color_piel_id",
        "tipo_cabello_id",
        "tipo_labios_id",
        "tipo_nariz_id",
        "tamano_orejas_id",
        "complexion_id",
        "barba_id",
        "bigote_id",
        "calvicie_id", 
        "especificacion_barba_id",
        "especificacion_bigote_id",
        "especificacion_cabello_id",
        "especificacion_nariz_id",
        "especificacion_ojos_id",
        "especificacion_oreja_id",
        "estatura_id",
        "forma_cara_id",
        "forma_ojos_id",
        "forma_oreja_id",
        "peso_id",
        "tamano_boca_id",
        "tamano_cabello_id",
        "tipo_ceja_id",
    ];

        public function persona():BelongsTo{
            return $this->belongsTo(Persona::class);
        }
        
        public function color_cabello():BelongsTo{
            return $this->belongsTo(ColorCabello::class);
        }
        public function color_ojos():BelongsTo{
            return $this->belongsTo(ColorOjos::class);
        }
        public function tamano_ojos():BelongsTo{
            return $this->belongsTo(TamanoOjos::class);
        }

        public function color_piel():BelongsTo{
            return $this->belongsTo(ColorPiel::class);
        }
        public function tipo_cabello():BelongsTo{
            return $this->belongsTo(TipoCabello::class);
        }

        public function tipo_labios():BelongsTo{
            return $this->belongsTo(TipoLabios::class);
        }
        public function tipo_nariz():BelongsTo{
            return $this->belongsTo(TipoNariz::class);
        }

        public function tamano_orejas():BelongsTo{
            return $this->belongsTo(TamanoOrejas::class);
        }

        public function complexion():BelongsTo{
            return $this->belongsTo(Complexion::class);
        }

        public function barba():BelongsTo{
            return $this->belongsTo(Barba::class);
        }

        public function bigote():BelongsTo{
            return $this->belongsTo(Bigote::class);
        }

        public function calvicie():BelongsTo{
            return $this->belongsTo(Calvicie::class);
        }

        public function especificacion_barba():BelongsTo{
            return $this->belongsTo(EspecificacionBarba::class);
        }

        public function especificacion_bigote():BelongsTo{
            return $this->belongsTo(EspecificacionBigote::class);
        }

        public function especificacion_cabello():BelongsTo{
            return $this->belongsTo(EspecificacionCabello::class);
        }

        public function especificacion_nariz():BelongsTo{
            return $this->belongsTo(EspecificacionNariz::class);
        }

        public function especificacion_ojos():BelongsTo{
            return $this->belongsTo(EspecificacionOjos::class);
        }

        public function especificacion_oreja():BelongsTo{
            return $this->belongsTo(EspecificacionOreja::class);
        }

        public function estatura():BelongsTo{
            return $this->belongsTo(Estatura::class);
        }

        public function forma_cara():BelongsTo{
            return $this->belongsTo(FormaCara::class);
        }

        public function forma_ojos():BelongsTo{
            return $this->belongsTo(FormaOjos::class);
        }

        public function forma_oreja():BelongsTo{
            return $this->belongsTo(FormaOreja::class);
        }

        public function peso():BelongsTo{
            return $this->belongsTo(Peso::class);
        }

        public function tamano_boca():BelongsTo{
            return $this->belongsTo(TamanoBoca::class);
        }

        public function tamano_cabello():BelongsTo{
            return $this->belongsTo(TamanoCabello::class);
        }

        public function tipo_ceja():BelongsTo{
            return $this->belongsTo(TipoCeja::class);
        }

}
