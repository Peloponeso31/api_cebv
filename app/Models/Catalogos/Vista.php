<?php

namespace App\Models\Catalogos;

use App\Models\SenasParticulares;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vista extends Model
{
    protected $table = 'cat_vistas';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function senas_particulares(): HasMany {
        return $this->hasMany(SenasParticulares::class);
    }
}
