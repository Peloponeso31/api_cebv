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
    const Persona = 'persona';

    const PrendasVestir = 'prendas_vestir';

    /** @var string */
    const EstaTerminado = 'esta_terminado';

    /**
     * Llaves foráneas
     */
    const PersonaId = 'persona_id';

    const ReporteId = 'reporte_id';

    const DesaparecidoId = 'desaparecido_id';
}
