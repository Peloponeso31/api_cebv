<?php

namespace App\Models\Catalogos;

use App\Models\Color;
use App\Models\GrupoPertenencia;
use App\Models\Pertenencia;
use App\Models\Reportes\Relaciones\Desaparecido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PrendaDeVestir extends Model
{
    protected $table = "prendas_vestir";

    protected $fillable = [
        'pertenencia_id',
        'color_id',
        'marca',
        'descripcion'
    ];

    public $timestamps = false;


    public function pertenencia(): BelongsTo
    {
        return $this->belongsTo(Pertenencia::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
}
