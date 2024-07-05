<?php

namespace App\Http\Requests;

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
            'medio_conocimiento.id' => ['nullable', 'exists:medios,id', 'numeric'],
            'tipo_reporte.id' => ['nullable', 'exists:tipos_reportes,id', 'numeric'],
            'area.id' => ['nullable', 'exists:areas,id', 'numeric'],
            'estado.id' => ['nullable', 'exists:estados,id', 'numeric'],
            'zona_estado.id' => ['nullable', 'exists:zonas_estados,id', 'numeric'],
            'hipotesis_oficial.id' => ['nullable', 'exists:tipos_hipotesis,id', 'numeric'],

            // Atributos
            'esta_terminado' => ['nullable', 'boolean'],
            'institucion_origen' => ['nullable', 'string'],
            'tipo_desaparicion' => ['nullable', 'string', Rule::in('U', 'M'), 'max:1'],
            'declaracion_especial_ausencia' => ['nullable', 'boolean'],
            'accion_urgente' => ['nullable', 'boolean'],
            'dictamen' => ['nullable', 'boolean'],
            'ci_nivel_federal' => ['nullable', 'boolean'],
            'otro_derecho_humano' => ['nullable', 'string'],
            'sintesis_localizacion' => ['nullable', 'string'],
            'fecha_localizacion' => ['nullable', 'date'],

            //hechos de_desapareicion
            'hechos_desaparicion.id' => ['nullable', 'exists:hechos_desapariciones,id', 'numeric'],
            'hechos_desaparicion.reporte_id' => ['nullable', 'exists:reportes,id', 'numeric'],
            'hechos_desaparicion.fecha_desaparicion' => ['nullable', 'date'],
            'hechos_desaparicion.fecha_desaparicion_cebv' => ['nullable', 'string'],
            'hechos_desaparicion.fecha_percato' => ['nullable', 'date'],
            'hechos_desaparicion.fecha_percato_cebv' => ['nullable', 'string'],
            'hechos_desaparicion.aclaraciones_fecha_hechos' => ['nullable', 'string'],
            'hechos_desaparicion.cambio_comportamiento' => ['nullable', 'boolean'],
            'hechos_desaparicion.descripcion_cambio_comportamiento' => ['nullable', 'string'],
            'hechos_desaparicion.fue_amenazado' => ['nullable', 'boolean'],
            'hechos_desaparicion.descripcion_amenaza' => ['nullable', 'string'],
            'hechos_desaparicion.contador_desapariciones' => ['nullable', 'numeric'],
            'hechos_desaparicion.situacion_previa' => ['nullable', 'string'],
            'hechos_desaparicion.informacion_relevante' => ['nullable', 'string'],
            'hechos_desaparicion.hechos_desaparicion' => ['nullable', 'string'],
            'hechos_desaparicion.sintesis_desaparicion' => ['nullable', 'string'],

            // Reportante
            //'reportantes.*.reporte_id' => ['exists:reportes,id', 'numeric'],
            //'reportantes.*.persona.id' => ['nullable', 'exists:personas,id', 'numeric'],
            'reportantes.*.parentesco.id' => ['nullable', 'exists:parentescos,id', 'numeric'],
            'reportantes.*.denuncia_anonima' => ['nullable', 'boolean'],
            'reportantes.*.informacion_consentimiento' => ['nullable', 'boolean'],
            'reportantes.*.informacion_exclusiva_busqueda' => ['nullable', 'boolean'],
            'reportantes.*.publicacion_registro_nacional' => ['nullable', 'boolean'],
            'reportantes.*.publicacion_boletin' => ['nullable', 'boolean'],
            'reportantes.*.pertenencia_colectivo' => ['nullable', 'boolean'],
            'reportantes.*.nombre_colectivo' => ['string', 'nullable'],
            'reportantes.*.informacion_relevante' => ['string', 'nullable'],
        ];
    }
}
