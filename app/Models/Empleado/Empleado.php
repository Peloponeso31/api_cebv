<?php

namespace App\Models\Empleado;

use App\Models\Catalogos\Oficina;
use App\Models\Catalogos\Puesto;
use App\Models\Personas\Persona;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'persona_id',
        'puesto_id',
        'oficina_id',
    ];

    public function usuario(): HasOne {
        return $this->HasOne(User::class);
    }

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function oficina(): BelongsTo {
        return $this->belongsTo(Oficina::class, 'oficina_id');
    }

    public function puesto(): BelongsTo {
        return $this->belongsTo(Puesto::class, 'puesto_id');
    }
}
