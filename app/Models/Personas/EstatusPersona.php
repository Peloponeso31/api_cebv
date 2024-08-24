<?php

namespace App\Models\Personas;

use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class EstatusPersona extends Model
{
    use Searchable;

    protected $table = 'estatus_personas';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'abreviatura'
    ];

    public function desaparecidosRpdno(): HasMany
    {
        return $this->hasMany(Desaparecido::class);
    }

    public function desaparecidosCebv(): HasMany
    {
        return $this->hasMany(Desaparecido::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'abreviatura' => $this->abreviatura
        ];
    }
}
