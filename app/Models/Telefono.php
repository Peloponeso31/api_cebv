<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Telefono extends Model
{
    use HasFactory;

    protected $table = 'telefonos';
    public $timestamps = false;

    protected $fillable = [
        'persona_id',
        'compania_id',
        'numero',
        'observaciones',
    ];

    public function personas(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function compania(): BelongsTo
    {
        return $this->belongsTo(CompaniaTelefonica::class);
    }
}
