<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Persona;

class ContextoEconomico extends Model
{
    use HasFactory;

    protected $fillable = [
        "empresa",
        "puesto",
        "fecha_ingreso",
        "relacion_colegas",
        "conflictos_trabajo",
        "deudas",
        "cambiosFinanzas",
        "actividadesExtralaborales",
        "emprendimientos",
        "saludMental",
        "ausenciaPrevia",
        "contactosRelevantes",
        "beneficios",
        "cambiosBeneficios",
        "ultimoContactoTrabajo",
        "sindicato",
        "fecha_ingreso_sindicato",
        "idSindicato",
        "posicionSindicato",
        "participacion",
        "relacion_sindicato",
        "conflictos_sindicato",
        "desacuerdos",
        "amenazasIntimidacion",
        "ult_cont_sindi"
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }
}
