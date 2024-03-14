<?php

namespace App\Models;

use App\Models\Catalogos\ColorCabello;
use App\Models\Catalogos\ColorOjos;
use App\Models\Catalogos\ColorPiel;
use App\Models\Catalogos\Complexion;
use App\Models\Catalogos\TamanoOjos;
use App\Models\Catalogos\TamanoOrejas;
use App\Models\Catalogos\TipoCabello;
use App\Models\Catalogos\TipoLabios;
use App\Models\Catalogos\TipoNariz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CaracteristicasFisicas extends Model
{
    use HasFactory;
    protected $fillable= [
        "color_cabello_id",
        "color_ojos_id",
        "tamano_ojos_id",
        "color_piel_id",
        "tipo_labios_id",
        "tipo_nariz_id",
        "tamano_orejas",
        "complexion_id"
        
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
}
