<?php

namespace App\Models\Catalogos\CaracteristicasFisicas;

use App\Models\Cabello;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoCabello extends Model
{
    protected $table = 'cat_tipos_cabello';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function cabellos(): HasMany
    {
        return $this->hasMany(Cabello::class);
    }
}
