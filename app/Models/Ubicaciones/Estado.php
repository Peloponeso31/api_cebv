<?php

namespace App\Models\Ubicaciones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estado extends Model
{
    protected $table = 'estados';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public $timestamps = false;

    public function municipios(): HasMany
    {
        return $this->hasMany(Municipio::class);
    }
}
