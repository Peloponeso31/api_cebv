<?php

namespace App\Models;

use App\Models\Catalogos\Ascendencia;
use App\Models\Catalogos\GrupoEtnico;
use App\Models\Catalogos\Lengua;
use App\Models\Catalogos\Religion;
use App\Models\Catalogos\Vestimenta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Etnia extends Model
{
    use HasFactory;

    protected $fillable = [
        "religion_id",
        "lengua_id",
        "grupo_etnico_id",
        "vestimenta_id",
        "ascendencia_id"
    ];

    public function persona():BelongsTo{
        return $this->belongsTo(Persona::class);
    }

    public function religion():BelongsTo{
        return $this->belongsTo(Religion::class);
    }
    
    public function lengua():BelongsTo{
        return $this->belongsTo(Lengua::class);

    }

    public function grupo_etnico():BelongsTo{
        return $this->belongsTo(GrupoEtnico::class);
    }

    public function vestimenta():BelongsTo{
        return $this->belongsTo(Vestimenta::class);
    }

    public function ascendencia():BelongsTo{
        return $this->belongsTo(Ascendencia::class);
    }
}
