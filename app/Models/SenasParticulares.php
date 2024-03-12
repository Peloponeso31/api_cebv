<?php

namespace App\Models;

use App\Models\Catalogos\RegionCuerpo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SenasParticulares extends Model
{
    use HasFactory;

    protected $fillable = [
        //"tipo_id",
        //"lado_id",
        //"vista_id",
        "region_cuerpo_id",
        "descripcion",
        "foto"
    ];

    public function region_cuerpo(): BelongsTo {
        return $this->belongsTo(RegionCuerpo::class);
    }
}
