<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoEnfoqueDiferenciado extends Model
{
    public $timestamps = false;

    protected $table = 'cat_tipo_enfoque_diferenciados';

    protected $fillable = [
        'nombre',
    ];

    public function enfoqueDiferenciado(): HasMany
    {
        return $this->hasMany(EnfoqueDiferenciado::class);
    }
}
