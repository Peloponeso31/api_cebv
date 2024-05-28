<?php

namespace App\Models\Catalogos;

use App\Models\Color;
use App\Models\GrupoPertenencia;
use App\Models\Pertenencia;
use App\Models\Reportes\Relaciones\Desaparecido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PrendaDeVestir extends Model
{
    use HasFactory;

    protected $table = "prenda-vestir";
    protected $fillable = [
        'grupo_pertenencia_id',
        'pertenencia_id',
        'color_id',
        'marca',
        'descripcion'
    ];
    public $timestamps = false;

    
    public function grupoPertenencia(): HasOne
    {
        return $this->hasOne(GrupoPertenencia::class, 'grupo_pertenencia_id');
    }

    public function pertenencia(): HasOne
    {
        return $this->hasOne(Pertenencia::class, 'pertenencia_id');
    }

    public function color(): HasOne
    {
        return $this->hasOne(Color::class, 'color_id');
    }
}
