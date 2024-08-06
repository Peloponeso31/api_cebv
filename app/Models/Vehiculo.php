<?php

namespace App\Models;

use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehiculo extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'reporte_id',
        'relacion_vehiculo_id',
        'tipo_vehiculo_id',
        'uso_vehiculo_id',
        'marca_vehiculo_id',
        'color_id',
        'submarca',
        'placa',
        'modelo',
        'numero_serie',
        'numero_motor',
        'numero_permiso',
        'descripcion',
        'localizado',
    ];

    protected $casts = [
        'localizado' => 'boolean',
    ];

    public function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }

    public function relacionVehiculo(): BelongsTo
    {
        return $this->belongsTo(RelacionVehiculo::class);
    }

    public function tipoVehiculo(): BelongsTo
    {
        return $this->belongsTo(TipoVehiculo::class);
    }

    public function usoVehiculo(): BelongsTo
    {
        return $this->belongsTo(UsoVehiculo::class);
    }

    public function marcaVehiculo(): BelongsTo
    {
        return $this->belongsTo(MarcaVehiculo::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
}
