<?php

namespace App\Models\Catalogos;

use App\Models\Catalogos\MediaFiliacion\TipoCeja;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ceja extends Model
{
    use HasFactory;

    protected $table = 'cejas';

    protected $fillable = [
        "persona_id",
        "tipoCeja_id",    
        "modificacionCeja"
    ];

    public function tipoCeja(): BelongsTo {
        return $this->belongsTo(TipoCeja::class);
    }
    
    public function persona(): BelongsTo {
        return $this->belongsTo(Persona::class);
    }
}
