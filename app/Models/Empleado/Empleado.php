<?php

namespace App\Models\Empleado;

use App\Models\Catalogos\Oficina;
use App\Models\Catalogos\Puesto;
use App\Models\Personas\Persona;
use App\Models\Sexo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'sexo_id',
        'puesto_id',
        'oficina_id',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
    ];

    public function usuario(): HasOne
    {
        return $this->HasOne(User::class);
    }

    public function oficina(): BelongsTo
    {
        return $this->belongsTo(Oficina::class, 'oficina_id');
    }

    public function puesto(): BelongsTo
    {
        return $this->belongsTo(Puesto::class, 'puesto_id');
    }

    public function sexo(): BelongsTo
    {
        return $this->belongsTo(Sexo::class, 'sexo_id');
    }

    public function nombreCompleto(): string
    {
        return $this->nombre . ' ' . $this->apellido_paterno . ' ' . $this->apellido_materno;
    }

    public function Iniciales(): string
    {
        preg_match_all('/[A-Z]/', $this->nombreCompleto(), $coincidencias);
        return implode('', $coincidencias[0]);
    }
}
