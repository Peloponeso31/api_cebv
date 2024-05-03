<?php

namespace App\Models\Catalogos\MediaFiliacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoPabellonAuricular extends Model
{
    use HasFactory;
    protected $table = "tipo_pabellon_auriculars";
    protected $fillable = ['tipo_pabellonauricular'];
    public $timestamps = false;

    public function pabellon_auricular(): BelongsTo {
        return $this->belongsTo(PabellonAuricular::class);
    }
}
