<?php

namespace App\Models\Catalogos\MediaFiliacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModificacionPabellonAuricular extends Model
{
    use HasFactory;
    protected $table = "modificacion_pabellon_auriculars";
    protected $fillable = ['modificacion_pabellon_auricular'];
    public $timestamps = true;

    public function pabellon_auricular(): BelongsTo {
        return $this->belongsTo(PabellonAuricular::class);
    }
}
