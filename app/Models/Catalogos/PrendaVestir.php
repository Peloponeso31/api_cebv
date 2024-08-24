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

class PrendaVestir extends Model
{
    protected $table = 'prendas_vestir';

    protected $fillable = [
        'desaparecido_id',
        'pertenencia_id',
        'color_id',
        'marca',
        'descripcion'
    ];

    public $timestamps = false;

    public function desaparecido(): BelongsTo
    {
        return $this->belongsTo(Desaparecido::class, 'desaparecido_id');
    }

    public function pertenencia(): BelongsTo
    {
        return $this->belongsTo(Pertenencia::class, 'pertenencia_id');
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

}
