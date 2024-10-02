<?php

namespace App\Http\Requests;

use App\Enums\EtapaHipotesis;
use App\Enums\TipoDesaparicion;
use App\Helpers\EnumHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReporteTotalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Llaves foraneas directas
            'medio_conocimiento.id' => ['nullable', 'exists:cat_medios,id', 'numeric'],
            'tipo_reporte.id' => ['nullable', 'exists:cat_tipos_reportes,id', 'numeric'],
            'area.id' => ['nullable', 'exists:cat_areas,id', 'numeric'],
            'estado.id' => ['nullable', 'exists:cat_estados,id', 'numeric'],
            'zona_estado.id' => ['nullable', 'exists:cat_zonas_estados,id', 'numeric'],
            'institucion_origen.id' => ['nullable', 'exists:cat_instituciones,id', 'numeric'],
            'hipotesis_oficial.id' => ['nullable', 'exists:cat_tipos_hipotesis,id', 'numeric'],

            // Atributos

            'esta_terminado' => ['nullable', 'boolean'],
            'tipo_desaparicion' => ['nullable', 'string', Rule::in(EnumHelper::toList(TipoDesaparicion::class)), 'max:1'],


            //hechos de_desaparicion
            'hechos_desaparicion.id' => ['nullable', 'exists:hechos_desapariciones,id', 'numeric'],
            'hechos_desaparicion.reporte_id' => ['nullable', 'exists:reportes,id', 'numeric'],
            'hechos_desaparicion.fecha_desaparicion' => ['nullable', 'date'],
            'hechos_desaparicion.fecha_desaparicion_cebv' => ['nullable', 'string'],
            'hechos_desaparicion.fecha_percato' => ['nullable', 'date'],
            'hechos_desaparicion.fecha_percato_cebv' => ['nullable', 'string'],
            'hechos_desaparicion.aclaraciones_fecha_hechos' => ['nullable', 'string'],
            'hechos_desaparicion.amenaza_cambio_comportamiento' => ['nullable', 'boolean'],
            'hechos_desaparicion.descripcion_amenaza_cambio_comportamiento' => ['nullable', 'string'],
            'hechos_desaparicion.contador_desapariciones' => ['nullable', 'numeric'],
            'hechos_desaparicion.situacion_previa' => ['nullable', 'string'],
            'hechos_desaparicion.informacion_relevante' => ['nullable', 'string'],
            'hechos_desaparicion.hechos_desaparicion' => ['nullable', 'string'],
            'hechos_desaparicion.sintesis_desaparicion' => ['nullable', 'string'],
            'hechos_desaparicion.hora_desaparicion' => ['nullable', 'string'],
            'hechos_desaparicion.hora_percato' => ['nullable', 'string'],
            'hechos_desaparicion.desaparecio_acompanado' => ['nullable', 'boolean'],
            'hechos_desaparicion.personas_mismo_evento' => ['nullable', 'numeric'],

            //hipotesis
            'hipotesis.*.reporte_id' => ['nullable', 'exists:reportes,id', 'numeric'],
            'hipotesis.*.tipo_hipotesis_id' => ['nullable', 'exists:cat_tipos_hipotesis,id', 'numeric'],
            'hipotesis.*.etapa' => ['nullable', Rule::in(EnumHelper::toList(EtapaHipotesis::class))],

            // Reportante
            //'reportantes.*.reporte_id' => ['exists:reportes,id', 'numeric'],
            //'reportantes.*.persona.id' => ['nullable', 'exists:personas,id', 'numeric'],
            'reportantes.*.parentesco.id' => ['nullable', 'exists:cat_parentescos,id', 'numeric'],
            'reportantes.*.denuncia_anonima' => ['nullable', 'boolean'],
            'reportantes.*.informacion_consentimiento' => ['nullable', 'boolean'],
            'reportantes.*.informacion_exclusiva_busqueda' => ['nullable', 'boolean'],
            'reportantes.*.publicacion_registro_nacional' => ['nullable', 'boolean'],
            'reportantes.*.publicacion_boletin' => ['nullable', 'boolean'],
            'reportantes.*.pertenencia_colectivo' => ['nullable', 'boolean'],
            'reportantes.*.nombre_colectivo' => ['string', 'nullable'],
            'reportantes.*.informacion_relevante' => ['string', 'nullable'],

            // Control OGPI
            'control_ogpi.id' => ['nullable', 'exists:control_ogpis,id', 'numeric'],
            'control_ogpi.fecha_codificacion' => ['nullable', 'date'],
            'control_ogpi.nombre_codificador' => ['nullable'],
            'control_ogpi.observaciones' => ['nullable'],
            'control_ogpi.numero_tarjeta' => ['nullable'],

            // Desaparicion Forzada
            'desaparicion_forzada.id' => ['nullable', 'exists:desapariciones_forzadas,id', 'numeric'],
            //'desaparicion_forzada.reporte_id' => ['nullable', 'exists:reportes,id', 'numeric'],
            'desaparicion_forzada.desaparecio_autoridad' => ['nullable', 'boolean'],
            'desaparicion_forzada.autoridad.id' => ['nullable', 'exists:autoridades,id', 'numeric'],
            'desaparicion_forzada.descripcion_autoridad' => ['nullable'],
            'desaparicion_forzada.desaparecio_particular' => ['nullable', 'boolean'],
            'desaparicion_forzada.particular.id' => ['nullable', 'exists:particulares,id', 'numeric'],
            'desaparicion_forzada.descripcion_particular' => ['nullable'],
            'desaparicion_forzada.metodo_captura.id' => ['nullable', 'exists:metodos_captura,id', 'numeric'],
            'desaparicion_forzada.descripcion_metodo_captura' => ['nullable'],
            'desaparicion_forzada.medio_captura.id' => ['nullable', 'exists:medios_captura,id', 'numeric'],
            'desaparicion_forzada.descripcion_medio_captura' => ['nullable'],
            'desaparicion_forzada.detencion_previa_extorsion' => ['nullable', 'boolean'],
            'desaparicion_forzada.descripcion_detencion_previa_extorsion' => ['nullable'],
            'desaparicion_forzada.ha_sido_avistado' => ['nullable', 'boolean'],
            'desaparicion_forzada.donde_ha_sido_avistado' => ['nullable'],
            'desaparicion_forzada.delitos_desaparicion' => ['nullable', 'boolean'],
            'desaparicion_forzada.descripcion_delitos_desaparicion' => ['nullable'],
            'desaparicion_forzada.descripcion_grupo_perpetrador' => ['nullable'],
        ];
    }
}
