<?php

namespace App\Models\Catalogos\MediaFiliacion;

use App\Models\Catalogos\Ceja;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoCeja extends Model
{
    use HasFactory;

    protected $table = "tipo_cejas";
    protected $fillable = ['tipo_ceja'];
    public $timestamps = false;

    public function ceja(): HasMany {
        return $this->hasMany(VelloFacial::class);
    }
}
