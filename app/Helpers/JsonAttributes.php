<?php

namespace App\Helpers;

class JsonAttributes
{
    /**
     * Atributos del request
     */

    /** @var string */
    const Reportantes = 'reportantes';

    /** @var string */
    const Desaparecidos = 'desaparecidos';

    /** @var string */
    const DocumentosLegales = 'documentos_legales';

    const PrendasVestir = 'prendas_vestir';

    /** @var string */
    const Persona = 'persona';

    /** @var string */
    const EstaTerminado = 'esta_terminado';

    /**
     * Llaves foráneas
     */

    /** @var string */
    const ReporteId = 'reporte_id';

    /** @var string */
    const DesaparecidoId = 'desaparecido_id';
}
