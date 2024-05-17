<?php

namespace App\Models\Telefono;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Telefono extends Model
{
    use HasFactory;

    protected $table = 'telefonos';
    public $timestamps = false;

    protected $fillable = [
        'numero',
        'observaciones',
        'compania_id',
    ];

    public function personas(): HasMany
    {
        return $this->hasMany(Persona::class);
    }

    public function compania(): BelongsTo
    {
        return $this->belongsTo(CompaniaTelefonica::class,"compania_id");
    }
}
