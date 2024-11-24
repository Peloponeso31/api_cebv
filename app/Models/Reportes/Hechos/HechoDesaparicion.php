<?php

namespace App\Models\Reportes\Hechos;

use App\Enums\OpcionesCebv;
use App\Models\Informaciones\Sitio;
use App\Models\Oficialidades\Area;
use App\Models\Reportes\Reporte;
use App\Models\Ubicaciones\Direccion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class HechoDesaparicion extends Model
{
    use HasFactory, Searchable;

    protected $table = 'hechos_desapariciones';

    protected $fillable = [
        'reporte_id',
        'direccion_id',
        'sitio_id',
        'area_asigna_sitio_id',
        'fecha_desaparicion_desconocida',
        'fecha_desaparicion',
        'fecha_desaparicion_cebv',
        'hora_desaparicion', // Cast to time
        'fecha_percato',
        'fecha_percato_cebv',
        'hora_percato', // Cast to time
        'aclaraciones_fecha_hechos',
        'amenaza_cambio_comportamiento',
        'descripcion_amenaza_cambio_comportamiento',
        'contador_desapariciones',
        'situacion_previa',
        'informacion_relevante',
        'hechos_desaparicion',
        'sintesis_desaparicion',
        'desaparecio_acompanado',
        'personas_mismo_evento',
        'resultado_rnd',
        'contexto_desaparicion',
    ];

    protected $casts = [
        'fecha_desaparicion_desconocida' => 'boolean',
        'fecha_desaparicion' => 'datetime',
        'fecha_percato' => 'datetime',
        'cambio_comportamiento' => 'boolean',
        'fue_amenazado' => 'boolean',
        'resultado_rnd' => OpcionesCebv::class,
    ];

    /**
     * Get the reporte that owns the hecho de desaparicion.
     *
     * @return BelongsTo
     */
    public function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }

    public function sitio(): BelongsTo
    {
        return $this->belongsTo(Sitio::class, 'sitio_id');
    }

    public function areaAsignaSitio(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_asigna_sitio_id');
    }

    public function lugarHechos(): BelongsTo
    {
        return $this->belongsTo(Direccion::class, 'direccion_id');
    }

    public function desaparecidos()
    {
        return $this->reporte->desaparecidos;
    }

    /**
     * Funciones de ayuda para consultar información de la persona
     * de manera más sencilla
     */
    public function getSoloFechaDesaparicion(): string
    {
        return $this->fecha_desaparicion
            ? $this->fecha_desaparicion->locale('es')->isoFormat(config('constants.only_date_iso_format'))
            : 'Fecha no disponible';
    }

    public function getMunicipioDesaparicion()
    {
        return $this->lugarHechos->asentamiento
            ? $this->lugarHechos->asentamiento->municipio->nombre
            : 'Lugar no disponible';
    }


    /**
     * Este metodo verifica si la desaparición de una mujer o una niña ha sido
     * menor a 72 horas.
     * @param int|null $sexoId Id del sexo de la persona, se espera que sea 2
     * @return bool Retorna <b>true</b> si persona desaparecida es mujer y han pasado menos de 72 horas
     * desde su desaparición, de lo contrario retorna <b>false</b>.
     */
    public function desaparicionMujerMenor72h(int|null $sexoId): bool
    {
        if ($sexoId != 2) return false;

        $reporte = $this->reporte;

        if ($reporte->hechosDesaparicion->fecha_desaparicion == null) return false;
        if ($reporte->hechosDesaparicion->hora_desaparicion == null) return false;

        $fechaDesaparicion = Carbon::parse($reporte?->hechosDesaparicion?->fecha_desaparicion);
        $horaDesaparicion = Carbon::parse($reporte?->hechosDesaparicion?->hora_desaparicion);

        $fechaActualizada = $fechaDesaparicion->setTime(
            $horaDesaparicion?->hour,
            $horaDesaparicion?->minute,
            $horaDesaparicion?->second
        );

        $diferenciaHoras = $fechaActualizada->diffInHours(Carbon::now());

        return $diferenciaHoras < 72;
    }
}
