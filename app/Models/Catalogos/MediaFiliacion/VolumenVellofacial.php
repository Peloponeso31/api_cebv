<?php

namespace App\Models\Catalogos\MediaFiliacion;

use App\Models\Catalogos\VelloFacial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VolumenVellofacial extends Model
{
    use HasFactory;

    protected $table = "volumen_vellofacials";
    protected $fillable = ['volumen_vellofacial'];
    public $timestamps = false;

    public function vello_facial(): HasMany {
        return $this->hasMany(VelloFacial::class);
    }
}
