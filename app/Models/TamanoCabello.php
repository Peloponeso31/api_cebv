<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TamanoCabello extends Model
{
    public $timestamps = false;

    protected $table = 'tamanos_cabellos';

    protected $fillable = [
        'nombre',
    ];

    public function  MediasFiliaciones(): HasMany
    {
        return $this->hasMany(MediaFiliacion::class);
    }
}
