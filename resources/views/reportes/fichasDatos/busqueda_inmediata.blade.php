<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

    <title>Document</title>
</head>

<style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
        font-family: "Arial", sans-serif;
    }

    pre {
        font-family: "Arial", sans-serif;
    }

    .image-header {
        width: 100%;
        height: 100%;
        margin: 5px;
        text-align: center;
        position: fixed;
        left: auto;
        right: auto;
    }

    .header {
        margin: 5px;
        text-align: left;
        left: 0;
        right: 100px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr;
    }

    .table {
        margin: 5px;
        text-align: left;
        left: 0;
        right: 100px;
        display: grid;
    }
</style>

<body>
<div id="image-header">
    <img src="C:\Users\JuniorCrack\Desktop\Cap\Documentos\ImagenesPrueba\Logos-header.png" width="472">
</div>

<div id="header">
    <table>
        <tr>
            <th>Fecha:</th>
            <td>20/03/2024</td>
        </tr>
        <tr>
            <th>Hora:</th>
            <td>10:23:45</td>
        </tr>
    </table>
</div>

<div>

</div>

<section id="Datos reportante">
    <h2>DAROS DEL REPORTANTE</h2>
    <table>
        <tr>
            <th>Nombre completo*</th>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Edad y<br>fecha de nacimiento</th>
            <td></td>
            <th>Sexo</th>
            <td></td>
        </tr>
        <tr>
            <th>Domicilio</th>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Telefono(s)*</th>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Correo electronico</th>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Relación con la persona<br>Desaparecida o No Localizada*</th>
            <td></td>
            <th>Tipo de reporte</th>
            <td></td> <!-- EN est campo debe ir anotado (presencial, noticia, denuncia) -->
        </tr>
    </table>
</section>

<section id="Datos de saparecido">
    <h2>DATOS DE LA PERSONA DESAPARECIDA O NO LOCALIZADA</h2>
    <table>
        <tr>
            <th>Nombre completo*</th>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Género</th>
            <td></td> <!-- EN este campo debe ir anotado (Femenino, Masculino, Otro) -->
            <th>Nacionalidad y<br>Estatus migratorio</th>
            <td></td>
        </tr>
        <tr>
            <th>Edad y<br>Fecha de nacimiento*</th>
            <td></td>
            <th>Tipo de sangre</th>
            <td></td>
        </tr>
        <tr>
            <th>Ocupación</th>
            <td></td>
            <th>Escolaridad</th>
            <td></td>
        </tr>
        <tr>
            <th>Condición de salud</th>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Teléfono celular*</th>
            <td></td>
            <th>CURP</th>
            <td></td>
        </tr>
        <tr>
            <th>Dirección de residencia</th>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>¿Tiene conocimiento de que<br>consuma tabaco, alcohol o<br>alguna otras sustancia?</th>
            <td>
                <p>¿Si, cual?</p>
                <br><br>
                <p>¿Con qué frecuencia?</p>
                <br><br>
            </td>
            <th>¿Ha recibido<br>alguna llamada de<br>exigencia<br>monetaria?</th>
            <td>
                <p>¿Si, cuanto?</p>
                <br><br>
                <p>¿Por qué medio?</p>
                <br><br>
            </td>
        </tr>
    </table>
</section>

<section id="Información desaparición">
    <h2>INFORMACIÓN SOBRE LA DESAPARICIÓN</h2>
    <table>
        <tr>
            <th>Lugar de desaparición*</th>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Fecha de desaparición*</th>
            <td></td>
            <th>Hora aproximada<br>
                de la desaparición<br>
                o última hora de<br>
                contacto *</th>
            <td></td>
        </tr>
        <tr>
            <th>Datos de personas que<br>pueden brindar<br>información y/o<br>probblemente involucradas</th>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Narrativa de los hechos<br>que se reportan*</th>
            <td colspan="3"></td>
        </tr>
    </table>
</section>

<section id="caracteristicas media filiacion deseaparecido">
    <h2>CARACTERISTICAS DE MEDIA FILIACIÓN DE LA PERSONA DESAPARECIDA O NO<<br>LOCALIZADA</h2>
    <table>
        <tr>
            <th>Vestimemnta que porta</th>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Señas particulares*</th>
            <td colspan="3"></td> <!-- Anotar letras pequeñas deñ documento-->
        </tr>
        <tr>
            <th>Tatuajes</th>
            <td colspan="3"></td> <!-- Anotar letras pequeñas deñ documento-->
        </tr>
    </table>

    <!--Estatura y peso-->
    <p>Complexión:</p>
    <table>
        <tr>
            <td>Regular</td>
            <td>Obesa</td>
            <td>Robusta</td>
            <td>Delgada</td>
            <td>Atlética</td>
        </tr>
    </table>
    <p>Color de Piel:</p>
    <table>
        <tr>
            <td>Blanca</td>
            <td>Moreno claro</td>
            <td>Moreno oscuro</td>
            <td>Negra</td>
            <td>Amarillo</td>
            <td>Albino</td>
        </tr>
    </table>
    <p>Color de ojos:</p>
    <!--Pendiente-->
    <p>Forma de ojos:</p>
    <table>
        <tr>
            <td>Redondos</td>
            <td>Ovales</td>
            <td>Rasgados</td>
            <td>Alargados</td>
        </tr>
    </table>
    <p>Color de cabello:</p>
    <p>Corto/largo:</p>
    <p>Tipo de cabello;</p>
    <table>
        <tr>
            <td>Lacio</td>
            <td>Rizado</td>
            <td>Crespo</td>
            <td>Ondulado</td>
        </tr>
    </table>
    <p>Cantidad de cabello</p>
    <table>
        <tr>
            <td>Abundante</td>
            <td>Regular</td>
            <td>Escaso</td>
            <td>Calvicie</td>
        </tr>
    </table>
    <p>Forma e cara:</p>
    <table>
        <tr>
            <td>Redonda</td>
            <td>Ovalada</td>
            <td>Triangular</td>
            <td>Cuadrada/rectangular</td>
            <td>Alargada</td>
        </tr>
    </table>
    <p>Tipo de ceja:</p>
    <table>
        <tr>
            <td>Poblada</td>
            <td>Regulares</td>
            <td>Escasa</td>
            <td>Depilada</td>
            <td>Raurada</td>
        </tr>
    </table>
    <p>Modificaciones de la ceja:</p>
    <table>
        <tr>
            <td>Tatuadas</td>
            <td>Perforadas</td>
            <td>Teñidas</td>
        </tr>
    </table>
    <p>Orejas por su forma</p>
    <table>
        <tr>
            <td>Cuadrada</td>
            <td>Ovalada</td>
            <td>Redonda</td>
            <td>Triangular</td>
        </tr>
    </table>
    <p>Orejas por su tamaño</p>
    <table>
        <tr>
            <td>Chica</td>
            <td>Mediana</td>
            <td>Grande</td>
        </tr>
    </table>
    <br>
    <p>Nariz por su forma</p>
    <table>
        <tr>
            <td>Chata</td>
            <td>Aguileña</td>
            <td>Recta</td>
        </tr>
    </table>
    <p>Boca</p>
    <table>
        <tr>
            <td>Chica</td>
            <td>Mediana</td>
            <td>Grande</td>
        </tr>
    </table>
    <p>Labios</p>
    <table>
        <tr>
            <td>Delgados</td>
            <td>Grueso</td>
            <td>Mistos</td>
        </tr>
    </table>
    <p>Dientes:</p>
    <table>
        <tr>
            <td>Ausencia</td>
            <td>No ausencia</td>
        </tr>
    </table>
    <p>Bigote:</p>
    <table>
        <tr>
            <td>Lampiño</td>
            <td>Poblado</td>
            <td>Recortado</td>
        </tr>
    </table>
    <!--Señas particulares-->
</section>

<section id="Contexto familiar">
    <h2>CONTEXTO FAMILIAR</h2>
    <table>
        <tr>
            <th>Estado conyugal</th>
            <td>(Soltera (o), casada (o), viuda (o),<br>
                divorciada (o) o en unión libre)</td>
            <th>¿Con qué personas<br>
                vive?</th>
            <td>¿Quiénes? ¿Cuántas (os)?</td>
        </tr>
        <tr>
            <th>Datos de la última<br>
                pareja sentimental<br>
                conocida</th>
            <td>(Nombre, apodo, edad, teléfono,<br>
                dirección)</td>
            <th>Hijas (os)</th>
            <td>Edades, viven juntos…</td>
        </tr>
        <tr>
            <th>¿Quién es el integrante<br>
                de su familia más<br>
                cercano?</th>
            <td></td>
            <th>¿Conoce si ha<br>
                sufrido algún tipo de<br>
                violencia por parte de<br>
                algún integrante de la<br>
                familia</th>
            <td>¿Por prte de quién?</td>
        </tr>
    </table>
</section>

<section id="Contexto economico-laboral">
    <h2>CONTEXTO ECONÓMICO-LABORAL</h2>
    <table>
        <tr>
            <th>¿Dónde trabaja o cuál
                es su medio de
                subsistencia?</th>
            <td>(Empresa, institución, tiempo,
                dirección, teléfono)</td>
            <th>¿Sabe si le gusta su<br>
                trabajo</th>
            <td></td>
            <th>¿Ha manifestado la<br>
                intensión de irse a<br>
                trabajar fuera de la<br>
                ciudad?</th>
            <td>¿Si, a dónde?</td>
            <th¿Conoce si ha<br>
            sufrido algún tipo<br>
            de violencia por<br>
            parte de algún<br>
            integrante de su<br>
            trabajo?></th>
            <td>¿Por quién?</td>
            <th>¿Sae si tiene<br>deudas?</th>
            <td>¿Por qué monto, con quién?</td>
        </tr>
    </table>
</section>

<section id="contexto social">
    <h2>CONTEXTO SOCIAL</h2>
    <table>
        <tr>
            <th>¿Qué pasatiempos<br>tiene?</th>
            <td>(Deportes, viajes, hobbies)</td>
            <th>¿Pertenece a algún<br>
                club u organización?</th>
            <td>¿Sí, cuál? ¿Con qué frecuencia?</td>
        </tr>
        <tr>
            <th>¿Estudia?</th>
            <td>(Nivel, institución, horario, dirección)</td>
            <th>¿Puede mencionar<br>
                sus amistades más<br>
                cercanas?</th>
            <td>(Nombre, apodo, teléfono, dirección)</td>
            <th>¿Ha manifestado<br>
                tener amistades<br>
                en otro municipio<br>
                o Estado?</th>
            <td>¿Dónde?</td>
            <th>Correo electrónico,<br>
                nombre en sus Redes<br>
                Sociales</th>
            <td>(Facebook, Twitter, Instagram, otro)</td>
        </tr>
    </table>
</section>
</body>
</html>
