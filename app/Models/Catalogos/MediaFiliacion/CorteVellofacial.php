<?php

namespace App\Models\Catalogos\MediaFiliacion;

use App\Models\Catalogos\VelloFacial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CorteVellofacial extends Model
{
    use HasFactory;

    protected $table = "corte_vellofacials";
    protected $fillable = ['nombre'];
    public $timestamps = false;

    public function vello_facial(): HasMany {
        return $this->hasMany(VelloFacial::class);
    }
}
