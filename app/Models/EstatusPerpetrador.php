<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstatusPerpetrador extends Model
{
    public $timestamps = false;

    protected $table = 'estatus_perpetradores';

    protected $fillable = [
        'nombre',
    ];

    public function perpetradores(): HasMany
    {
        return $this->hasMany(Perpetrador::class);
    }
}
