<?php

namespace App\Models\Reportes\Relaciones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocumentoLegal extends Model
{
    public $timestamps = false;

    protected $table = 'documentos_legales';

    protected $fillable = [
        'desaparecido_id',
        'tipo_documento',
        'numero_documento',
        'donde_radica',
        'nombre_servidor_publico',
        'fecha_recepcion',
    ];

    protected $casts = [
        'fecha_recepcion' => 'date',
    ];

    public function desaparecido(): BelongsTo
    {
        return $this->belongsTo(Desaparecido::class, 'desaparecido_id');
    }
}
