# Documentación de Filtrado API

Esta API pueda realizar busquedas de reporte de manera nomal y a travez de filtrado unico o multiple

## Requisitos
- HTTPie o cualquier herramienta que permita operaciones API (Recomendable).
- API corriendo en `http://127.0.0.1:8000`.

## Formato de Filtrado
Para aplicar un filtro, usa el siguiente formato:
```bash
http://localhost:8000/api/reportes?filter[categoria/subcategoria]=valor
```

### Por ejemplo:
```bash
http://localhost:8000/api/reportes?filter[desaparecido/lugar_nacimiento]=Puebla 
```
Donde:
- `Reportes` es el endpoint de la API.
- `Desaparecido` es la categoría.
- `lugar_nacimiento` es la subcategoría.
- `Puebla` es el valor a filtrar.

El signo `?` indica que se esta aplicando un filtro, `=` asigna un valor al filtro.

## Filtrado Multiple
El signo `&` indica que se agregara otro filtro, esto sirve para aplicar 2 o mas filtros.

Para aplicar un filtro multiple, usa el siguiente formato:
```bash
http://localhost:8000/api/reportes?filter[categoria/subcategoria]=valor&filter[categoria/subcategoria]=valor
```

### Por ejemplo:
```bash
http://localhost:8000/api/reportes?filter[desaparecido/lugar_nacimiento]=Puebla&filter[desaparecido/sexo]=M
```

## Filtros Disponibles
Esto tiene la finalidad de concentrar los filtros disponibles que se pueden usar al momento de filtrar, todas las categorias y subcategorias aqui expuestas deberan siempre ir dentro de sus respectivos corchetes "` []`".

Por ejemplo `Filter[reportante/lengua_id]=2`

**Filtros generales**

<div style="display: flex; justify-content: space-between; gap: 20px;">
  <table>
    <thead>
      <tr>
        <th>Estado</th>
        <th>Tipo Reporte</th>
        <th>Medio Conocimiento</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><code>estado/nombre</code></td>
        <td><code>tipo_reporte/nombre</code></td>
        <td><code>medio_conocimiento/nombre</code></td>
      </tr>
      <tr>
        <td><code>estado/abreviatura_inegi</code></td>
        <td><code>tipo_reporte_id</code></td>
        <td><code>medio_conocimiento_id</code></td>
      </tr>
      <tr>
        <td><code>estado/abreviatura_cebv</code></td>
        <td><code>tipo_reporte/abreviatura</code></td>
        <td><code>tipo_medio/nombre</code></td>
      </tr>
      <tr>
        <td><code>estado_id</code></td>
        <td><code>esta_terminado</code></td>
        <td><code>tipo_medio_id</code></td>
      </tr>
    </tbody>
  </table>

  <table>
    <thead>
      <tr>
        <th>Zona Estado</th>
        <th>Area Atiende</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><code>zona_estado_id</code></td>
        <td><code>area_atiende_id</code></td>
      </tr>
      <tr>
        <td><code>zona_estado/nombre</code></td>
        <td><code>area_atiende/nombre</code></td>
      </tr>
      <tr>
        <td><code>zona_estado/abreviatura</code></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>

**Desaparecido**

| **Nombre**                     | **Pseudonimo**                           |
|--------------------------------|------------------------------------------|
| `nombreCompleto_desaparecido`  | `pseudonimoCompleto_desaparecido`        |
| `nombre_desaparecido`          | `pseudonimoNombre_desaparecido`          |
| `apellidoPaterno_desaparecido` | `pseudonimoApellidoMaterno_desaparecido` |
| `apellidoMaterno_desaparecido` | `pseudonimoApellidoMaterno_desaparecido` |

**Reportante**

| **Nombre**                   | **Pseudonimo**                         |
|------------------------------|----------------------------------------|
| `nombreCompleto_reportante`  | `pseudonimoCompleto_reportante`        |
| `nombre_reportante`          | `pseudonimoNombre_reportante`          |
| `apellidoPaterno_reportante` | `pseudonimoApellidoPaterno_reportante` |
| `apellidoMaterno_reportante` | `pseudonimoApellidoMaterno_reportante` |

**Persona reportante**

| **Lugar nacimiento**              | **Escolaridad**                  | **Sexo**                     |
|-----------------------------------|----------------------------------|------------------------------|
| `reportante/lugar_nacimiento_id`  | `reportante/escolaridad_id`      | `reportante/sexo_id`         |
| `reportante/lugar_nacimiento`     | `reportante/escolaridad`         | `reportante/sexo`            |
| **Genero**                        | **Nacionalidad**                 | **Religion**                 |
| `reportante/genero_id`            | `reportante/nacionalidad_id`     | `reportante/religion_id`     |
| `reportante/genero`               | `reportante/nacionalidad`        | `reportante/religion`        |
| **Lengua**                        | **Parentesco**                   | **Colectivo**                |
| `reportante/lengua_id`            | `reportante/parentesco_id`       | `reportante/colectivo_id`    |
| `reportante/lengua`               | `reportante/parentesco`          | `reportante/colectivo`       |
| **Estado conyugal**               | **Publicacion**                  | **Descripcion**              |
| `reportante/estado_conyugal_id`   | `publicacion_registro_nacional`  | `descripcion_extorsion`      |
| `reportante/estado_conyugal`      | `publicacion_boletin`            | `descripcion_donde_proviene` |
| **Telefono**                      | **Informacion**                  |
| `reportante/telefono`             | `informacion_consentimiento`     |
| `reportante/telefono/compania_id` | `informacion_exclusiva_busqueda` |
| `reportante/telefono/compania`    | `informacion_relevante`          |
| `reportante/telefono/es_movil`    |

| **Reportante (otros)**             |                                    |
|------------------------------------|------------------------------------|
| `reportante/fecha_nacimiento`      | `reportante/denuncia_anonima`      |
| `reportante/curp`                  | `reportante/pertenencia_colectivo` |
| `reportante/rfc`                   | `participacion_busqueda`           |
| `reportante/ocupacion`             | `reportante/edad_estimada`         |
| `reportante/nivel_escolaridad`     | `reportante/numero_personas_vive`  |
| `reportante/apodo`                 |

**Persona desaparecida**

| **Lugar nacimiento**                | **Escolaridad**                             | **Sexo**                                        |
|-------------------------------------|---------------------------------------------|-------------------------------------------------|
| `desaparecido/lugar_nacimiento_id`  | `desaparecido/escolaridad_id`               | `desaparecido/sexo_id`                          |
| `desaparecido/lugar_nacimiento`     | `desaparecido/escolaridad`                  | `desaparecido/sexo`                             |
| **Genero**                          | **Nacionalidad**                            | **Religion**                                    |
| `desaparecido/genero_id`            | `desaparecido/nacionalidad_id`              | `desaparecido/religion_id`                      |
| `desaparecido/genero`               | `desaparecido/nacionalidad`                 | `desaparecido/religion`                         |
| **Lengua**                          | **Fecha nacimiento**                        | **Descripcion**                                 |
| `desaparecido/lengua_id`            | `desaparecido/fecha_nacimiento_aproximada`  | `desaparecido/descripcion_ocupacion_principal`  |
| `desaparecido/lengua`               | `desaparecido/fecha_nacimiento_cebv`        | `desaparecido/descripcion_ocupacion_secundaria` |

| **Telefono**                             | **Edad**                                             | **Comunicacion**                    |
|------------------------------------------|------------------------------------------------------|-------------------------------------|
| `desaparecido/telefono`                  | `desaparecido/edad_anos`                             | `desaparecido/habla_espanhol`       |
| `desaparecido/telefono/compania_id`      | `desaparecido/edad_meses`                            | `desaparecido/sabe_leer`            |
| `desaparecido/telefono/compania`         | `desaparecido/edad_dias`                             | `desaparecido/sabe_escribir`        |
| **Estatus**                              | **Ocupacion**                                        | **Telefono**                        |
| `desaparecido/estatus_rpdno_id`          | `desaparecido/ocupacion_principal_id`                | `desaparecido/telefono`             |
| `desaparecido/estatus_rpdno`             | `desaparecido/ocupacion_principal`                   | `desaparecido/telefono/compania_id` |
| `desaparecido/estatus_rpdno/abreviatura` | `desaparecido/ocupacion_principal/tipo_ocupacion_id` | `desaparecido/telefono/compania`    |
| `desaparecido/estatus_cebv_id`           | `desaparecido/ocupacion_principal/tipo_ocupacion`    | `desaparecido/telefono/es_movil`    |
| `desaparecido/estatus_cebv`              |                                                      |                                     |
| `desaparecido/estatus_cebv/abreviatura`  |                                                      |                                     |

| **Desaparecido (otros)**                     |                                       |
|----------------------------------------------|---------------------------------------|
| `desaparecido/fecha_nacimiento`              | `desaparecido/accion_urgente`         |
| `desaparecido/curp`                          | `desaparecido/dictamen`               |
| `desaparecido/rfc`                           | `desaparecido/ci_nivel_federal`       |
| `desaparecido/ocupacion`                     | `desaparecido/otro_derecho_humano`    |
| `desaparecido/nivel_escolaridad`             | `desaparecido/identidad_resguardada`  |
| `desaparecido/apodo`                         | `desaparecido/alias`                  |
| `desaparecido/clasificacion_persona`         | `desaparecido/nombre_pareja_conyugue` |
| `desaparecido/url_boletin`                   | `desaparecido/boletin_img_path`       |
| `desaparecido/declaracion_especial_ausencia` |


**Folios**
- `folio_cebv`
- `folio_fub`

**Hechos Desaparición**

<div style="display: flex;  gap: 20px;">
  <table>
    <thead>
      <tr>
        <th>Desaparición</th>
        <th>Percato</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><code>hechoDesaparicion/fecha_desaparicion</code></td>
        <td><code>hechoDesaparicion/fecha_percato</code></td>
      </tr>
      <tr>
        <td><code>hechoDesaparicion/fecha_desaparicion_aproximada</code></td>
        <td><code>hechoDesaparicion/fecha_percato_cebv</code></td>
      </tr>
      <tr>
        <td><code>hechoDesaparicion/fecha_desaparicion_cebv</code></td>
        <td><code>hechoDesaparicion/hora_percato</code></td>
      </tr>
      <tr>
        <td><code>hechoDesaparicion/hora_desaparicion</code></td>
        <td></td>
      </tr>
      <tr>
        <td><code>hechoDesaparicion/hechos_desaparicion</code></td>
        <td></td>
      </tr>
    </tbody>
  </table>

  <table>
    <thead>
      <tr>
        <th>Amenaza cambio comportamiento</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><code>hechoDesaparicion/amenaza_cambio_comportamiento</code></td>
      </tr>
      <tr>
        <td><code>hechoDesaparicion/descripcion/amenaza_cambio_comportamiento</code></td>
      </tr>
    </tbody>
  </table>
</div>

| `hechoDesaparicion/direccion_id`                              | `hechoDesaparicion/situacion_previa`      |
|---------------------------------------------------------------|-------------------------------------------|
| `hechoDesaparicion/aclaraciones_fecha_hechos`                 | `hechoDesaparicion/informacion_relevante` |
| `hechoDesaparicion/amenaza_cambio_comportamiento`             | `hechoDesaparicion/sintesis_desaparicion` |
| `hechoDesaparicion/descripcion/amenaza_cambio_comportamiento` | `hechoDesaparicion/personas_mismo_evento` |
| `hechoDesaparicion/contador_desapariciones`                   |

**Hipotesis oficial**

| `hipotesis_oficial_id`              | 
|-------------------------------------|
| `hipotesisOficial/descripcion`      |
| `hipotesisOficial/abreviatura`      |
| `hipotesisOficial/circunstancia_id` |
| `hipotesisOficial/circunstancia`    |

**Media Filicacion Y señas particulares**

| **Media filiacion**                              | **Senas Particulares**                                |
|--------------------------------------------------|-------------------------------------------------------|
| `desaparecido/media_filiacion_id`                | `desaparecido/senas_particulares_id`                  |
| `desaparecido/media_filiacion/estatura`          | `desaparecido/senas_particulares/region_cuerpo_id`    |
| `desaparecido/media_filiacion/peso`              | `desaparecido/senas_particulares/region_cuerpo`       |
| `desaparecido/media_filiacion/complexion_id`     | `desaparecido/senas_particulares/region_cuerpo/color` |
| `desaparecido/media_filiacion/complexion`        | `desaparecido/senas_particulares/vista_id`            |
| `desaparecido/media_filiacion/color_piel_id`     | `desaparecido/senas_particulares/vista`               |
| `desaparecido/media_filiacion/color_piel`        | `desaparecido/senas_particulares/lado_id`             |
| `desaparecido/media_filiacion/color_ojos_id`     | `desaparecido/senas_particulares/lado`                |
| `desaparecido/media_filiacion/color_ojos`        | `desaparecido/senas_particulares/lado/color`          |
| `desaparecido/media_filiacion/color_cabello_id`  | `desaparecido/senas_particulares/tipo_id`             |
| `desaparecido/media_filiacion/color_cabello`     | `desaparecido/senas_particulares/tipo`                |
| `desaparecido/media_filiacion/tamano_cabello_id` | `desaparecido/senas_particulares/cantidad`            |
| `desaparecido/media_filiacion/tamano_cabello`    | `desaparecido/senas_particulares/descripcion`         |
| `desaparecido/media_filiacion/tipo_cabello_id`   |
| `desaparecido/media_filiacion/tipo_cabello`      |


**FIltros reporte (Otros)**
- `fecha_localizacion`
- `sintesis_localizacion`
- `institucion_origen`
- `declaracion_especial_ausencia`
- `accion_urgente`
