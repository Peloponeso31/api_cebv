<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>


    @page {
        margin: 100px 50px;
    }


    #header {
        position: fixed;
        left: 0px;
        top: -100px;
        right: 0px;
        height: 100px;
        text-align: center;
    }


    #footer {
        position: fixed;
        left: 0px;
        bottom: -100px;
        right: 0px;
        height: 100px;
        display: inline-block;
    }


    #footer .page:after {
        content: counter(page, upper-roman);
    }


    h1, h2 {
        margin-top: 40px;
        margin-bottom: 20px;
    }

    h1 {
        font-size: 1.5em;
        text-align: left;
    }

    h2 {
        font-size: 1em;
        text-align: left;
        text-transform: uppercase;
    }

    .Fecha-Folio {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr;
    }

    .container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
        border: 2px solid black;
        padding: 10px;
    }

    .container p {
        margin: 5px 0;
    }


    .Nombre,
    .Edad,
    .Sexo,
    .Domicilio,
    .Telefono,
    .Correo,
    .Relacion,
    .Tipo {
        border: 1px solid black; /* Borde sólido negro alrededor de cada elemento */
        padding: 5px;
    }

    .container2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
        border: 2px solid black;
        padding: 10px;
    }

    .container2 p {
        margin: 5px 0;
    }

    .Nombre,
    .Genero,
    .Nacionalidad,
    .Edad,
    .Sangre,
    .Ocupacion,
    .Escolaridad,
    .Salud,
    .Telefono,
    .CURP,
    .Direccion,
    .Pregunta1,
    .Pregunta2 {
        border: 1px solid black; /* Borde sólido negro alrededor de cada elemento */
        padding: 5px;
    }

    .container3 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
        border: 2px solid black;
        padding: 10px;
    }

    .container3 p {
        margin: 5px 0;
    }

    .Lugar,
    .Fecha,
    .Hora,
    .Datos,
    .Narrativa {
        border: 1px solid black;
        padding: 5px;
        text-align: justify;
    }

    .container4 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
        border: 2px solid black;
        padding: 10px;
    }


    .container4 p {
        margin: 5px 0;
    }

    .Vestimenta,
    .Tatuajes {
        border: 1px solid black;
        padding: 5px;
        text-align: justify;
    }

    .Señas {
        border: 1px solid black;
        padding: 5px;
        text-align: justify;
    }

    .Estatura-Peso {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
    }

    .Complexion {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        border: 1px solid black;
    }

    .R,
    .O,
    .Ro,
    .D,
    .A {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }


    .Piel {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
        border: 1px solid black;
    }

    .B,
    .Mc,
    .Mo,
    .N,
    .A,
    .Al {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

    .Ojos {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        border: 1px solid black;
    }

    .R,
    .O,
    .Ra,
    .A {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }


    .Tamaño {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        border: 1px solid black;
    }

    .G,
    .M,
    .P {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

    .Tcabello {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        border: 1px solid black;
    }

    .L,
    .R,
    .C,
    .O {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

    .Ccabello {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        border: 1px solid black;
    }

    .A,
    .R,
    .E,
    .C {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

    .Cara {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        border: 1px solid black;
    }

    .R,
    .O,
    .T,
    .Cr,
    .A {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

    .Ceja {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        border: 1px solid black;
    }

    .P,
    .R,
    .E,
    .D,
    .R {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }


    .Modicejas {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        border: 1px solid black;
    }

    .T,
    .P,
    .Te {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

    .OrejasF {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        border: 1px solid black;
    }

    .C,
    .O,
    .R,
    .T {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

    .OrejasT {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        border: 1px solid black;
    }

    .C,
    .M,
    .G {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

    .NarizF {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        border: 1px solid black;
    }

    .C,
    .A,
    .G {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

    .Boca {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        border: 1px solid black;
    }

    .C,
    .M,
    .G {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

    .Labios {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        border: 1px solid black;
    }

    .D,
    .G,
    .M {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

    .Dientes {
        display: grid;
        grid-template-columns: 1fr 1fr;
        border: 1px solid black;
    }

    .A,
    .Na {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

    .Bigote {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        border: 1px solid black;
    }

    .L,
    .P,
    .R {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

    .CF {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
        border: 2px solid black;
        padding: 10px;
    }

    .CF p {
        margin: 5px 0;
    }

    .Conyugal,
    .PVive,
    .ParejaS,
    .Hijos,
    .IntCercano,
    .Violencia {
        border: 1px solid black;
        padding: 5px;
        text-align: justify;
    }

    .CEL {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
        border: 2px solid black;
        padding: 10px;
    }

    .CEL p {
        margin: 5px 0;
    }

    .Trabaja,
    .Gtrabajo,
    .FueraCiudad,
    .VioTrabajo,
    .Deudas {
        border: 1px solid black;
        padding: 5px;
        text-align: justify;
    }

    .CS {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
        border: 2px solid black;
        padding: 10px;
    }

    .CS p {
        margin: 5px 0;
    }

    .Pasatiempos,
    .Organizacion,
    .Estudia,
    .Amistades,
    .AMuniEsta,
    .Redes {
        border: 1px solid black;
        padding: 5px;
        text-align: justify;
    }


    table {
        border-collapse: collapse;
        width: 100%;
    }

    th {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
        text-transform: uppercase;
    }

    td {
        border: 1px solid black;
        padding: 8px;
        text-align: justify;
        text-transform: none;
    }


</style>

<body>


<section id="header">
    <div id="header">
        <header>
            <img src="{{ public_path("reportes/ficha_de_datos/Logos-header.png") }}" width="700"/>
    </div>
    </header>
</section>


<section id="Reportante">
    <div class="Fecha-Folio">
        <table>
            <tr>
                <th>Fecha de inicio:</th>
                <td>20/03/2024</td>
            </tr>
            <tr>
                <th>Hora de inicio:</th>
                <td>10:23:45</td>
            </tr>
        </table>
    </div>

    <h2>Fuente de información</h2>
    <table>
        <tr>
            <th>Medio de conocimiento genérico:</th>
            <th>Medio de conocimiento especifico:</th>
            <th>estado de donde proviene el reporte:</th>
            <th>institución de origen:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2>Información de consentimiento</h2>
    <table>
        <tr>
            <th>Uso exclusivo de la información e identificación de la Persona Desaparecida o No Localizada.</th>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <th>¿Solicita que se haga pública la información de la Persona Desaparecida o No Localizada?</th>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>

    <h2>DATOS DEL REPORTANTE</h2>

    <table>
        <tr>
            <th>Nombre(S)*:</th>
            <th>Primer apellido:</th>
            <th>Segundo apellido:</th>
            <th>¿Usted que es de la persona desaparecida o no localizada?</th>
        </tr>
        <tr>
            <td>Ismael</td>
            <td>Matus</td>
            <td>García</td>
            <td>Hermano</td>
        </tr>
        <tr>
            <th>Sexo:</th>
            <th>Genero:</th>
            <th>Religión:</th>
            <th>Lengua:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Fecha de nacimiento:</th>
            <th colspan="3">Edad(Años):</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Lugar de nacimiento:</th>
            <th colspan="3">Nacionalidad:</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>RFC:</th>
            <th colspan="3">CURP:</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="3"></td>
        </tr>

    </table>

    <h2>DATOS DE CONTACTO</h2>
    <table>
        <tr>
            <th>Teléfono móvil:</th>
            <th>Compañia:</th>
            <th>Observaciones:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Teléfono fijo:</th>
            <th colspan="2">Observaciones:</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>Correo electronico:</th>
            <th colspan="2">Observaciones:</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"></td>
        </tr>
    </table>

    <h2>Domicilio de la persona</h2>
    <table>
        <tr>
            <th>Calle:</th>
            <th>N° Exterior:</th>
            <th>N° Interior:</th>
            <th>Colonia</th>
            <th>Código Postal:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Estado:</th>
            <th>Municipio:</th>
            <th colspan="3">Localidad:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Entre calle 1:</th>
            <th>Entre calle 2:</th>
            <th colspan="3">Tramo carretero:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th colspan="5">Referencia:</th>
        </tr>
        <tr>
            <td colspan="5"></td>
        </tr>
    </table>

    <h2>Información relevante</h2>
    <table>
        <tr>
            <th>Nivel de escolaridad:</th>
            <th>Avance de escolaridad:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Estado conyugal:</th>
            <th>Pertenecia a grupo de población vulnerable:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th colspan="2">Información relevante que quiera añadir:</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
    </table>

    <h2>Participación en búsquedas</h2>
    <table>
        <tr>
            <th colspan="2">¿Ha realizado búsquedas con anterioridad?</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th colspan="2">¿En dónde?</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>Pertenece a algún colectivo:</th>
            <th>Nombre del colectivo:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2>Datos de posible extorsión o amenaza</h2>
    <table>
        <tr>
            <th>¿Ha sido victima de extorsión o fraude?</th>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <th>Descripción de la situación:</th>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <th>¿Ha recibido amenazas?</th>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <th>¿Sabe de donde proviene?</th>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>

</section>

<section id="Desaparecida">
    <h2>Persona reportada</h2>
    <h2>Datos De identificación de la persona</h2>

    <table>
        <tr>
            <th>Nombre(S)*</th>
            <th>Primer apellido:</th>
            <th>Segundo apellido:</th>
            <th>Identidad resguardada:</th>
        </tr>
        <tr>
            <td>{{ $desaparecido->persona->nombre }}</td>
            <td>{{ $desaparecido->persona->apellido_paterno }}</td>
            <td>{{ $desaparecido->persona->apellido_materno }}</td>
            <td></td>
        </tr>
        <tr>
            <th>Pseudónimo(S) Nombre(S):</th>
            <th>Pseudónimo primer apellido:</th>
            <th colspan="2">Pseudónimo segundo apellido:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>Alias:</th>
            <th>Sexo:</th>
            <th colspan="2">Genero:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="2">{{ $desaparecido->persona->genero }}</td>
        </tr>
        <tr>
            <th colspan="3">¿Se desconoce fecha exacta?</th>
            <td>No</td>
        </tr>
        <tr>
            <th colspan="4">Fecha de nacimiento específica:</th>
        </tr>
        <tr>
            <td colspan="4">{{ $desaparecido->persona->fecha_nacimiento }}</td>
        </tr>
        <tr>
            <th colspan="4">Edad al momento de la desaparición</th>
        </tr>
        <tr>
            <th>Edad(Años):</th>
            <th>Edad(Meses):</th>
            <th colspan="2">Edad(Días):</th>
        </tr>
        <tr>
            <td>{{ $desaparecido->persona->edadAnhos() }} años</td>
            <td> meses</td>
            <td colspan="2"> días</td>
        </tr>
        <tr>
            <th colspan="4">Edad actual</th>
        </tr>
        <tr>
            <th>Edad(Años):</th>
            <th>Edad(Meses):</th>
            <th colspan="2">Edad(Días):</th>
        </tr>
        <tr>
            <td>{{ $desaparecido->persona->edadAnhos() }} años</td>
            <td> meses</td>
            <td colspan="2"> días</td>
        </tr>
        <tr>
            <th>Lugar de nacimiento:</th>
            <th colspan="3">Nacionalidad:</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th colspan="4">Información extra sobre su situación migratoria</th>
        </tr>
        <tr>
            <th colspan="4">¿Se encuentra en transito a Estados Unidos de Norte America?</th>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>RFC:</th>
            <th colspan="3">CURP:</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">{{ $desaparecido->persona->curp }}</td>
        </tr>
        <tr>
            <th colspan="4">Observaciones del CURP:</th>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
    </table>

    <h2>Domicilio de la persona</h2>

    <table>
        <tr>
            <th>Calle:</th>
            <th>N° Exterior:</th>
            <th>N° Interior:</th>
            <th>Colonia</th>
            <th>Código Postal:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Estado:</th>
            <th>Municipio:</th>
            <th colspan="3">Localidad:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Entre calle 1:</th>
            <th>Entre calle 2:</th>
            <th colspan="3">Tramo carretero:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th colspan="5">Referencia:</th>
        </tr>
        <tr>
            <td colspan="5"></td>
        </tr>
    </table>

    <h2>Datos de Contacto</h2>
    <table>
        <tr>
            <th>Teléfono móvil:</th>
            <th>Compañia:</th>
            <th>Observaciones:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Teléfono fijo:</th>
            <th colspan="2">Observaciones:</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>Correo electronico:</th>
            <th colspan="2">Observaciones:</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>Tipo de red social:</th>
            <th>Usuario:</th>
            <th>Observaciones:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2>Datos sociodemográficos</h2>
    <table>
        <tr>
            <th>¿Habla español?</th>
            <th>¿Sabe leer?</th>
            <th>¿Sabe escribir?</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Nivel de escolaridad:</th>
            <th>Avance de escolaridad:</th>
            <th>Religión:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Ocupacion Principal:</th>
            <th colspan="2">Detalles sobre la ocupación principal:</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>Ocupacion Secundaria:</th>
            <th colspan="2">Detalles sobre la ocupación Secundaria:</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>Estado conyugal:</th>
            <th colspan="2">Nombre de la pareja o conyuge:</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"></td>
        </tr>
    </table>

</section>

<section id="Juridico">
    <h2>Instrumentos juridicos asociados</h2>
    <h2>Carpeta de investigación</h2>
    <table>
        <tr>
            <th colspan="4">Específica si hay o existe carpeta de investigación(ci).</th>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>Número de ci, im o reporte de fge:</th>
            <th>dónde radica la ci, im o reporte de fge:</th>
            <th>nombre del servidor(a) público:</th>
            <th>fecha de recepción de ci, im o reporte de fge:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2>Amparo buscador</h2>
    <table>
        <tr>
            <th colspan="4">Escífica si hay o existe amparo buscador:</th>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>número de amparo buscador:</th>
            <th>Dónde radica el amparo buscador:</th>
            <th>Nombre del juez:</th>
            <th>Fecha de recepción:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2>Recomendación de derechos humanos</h2>
    <table>
        <tr>
            <th colspan="4">Específica si hay o existe recomendación de derechos humanos(dh):</th>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>Número de recomendación derechos humanos:</th>
            <th>Dónde radica la recomendación derechos humanos:</th>
            <th>Nombre del servidor(a) público:</th>
            <th>Fecha de recepción recomendación dh:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4"><!--La que se seccione la muestra --> </td>
        </tr>
    </table>
</section>

<div class="Estatura-Peso">
    <h2>Media filiación</h2>
    <h2>Perfil corporal</h2>
    <table>
        <tr>
            <th>Estaura:</th>
            <th>Peso:</th>
            <th>Complexión:</th>
            <th>Color de piel:</th>
            <th>Forma de la cara:</th>
        </tr>
        <tr>
            <td>{{ $desaparecido->persona->estatura }}m</td>
            <td>{{ $desaparecido->persona->peso }}kg</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>
</section>

<section id="Complexion">
    <h2>Ojos:</h2>
    <table>
        <tr>
            <th>Color de ojos:</th>
            <th>Forma de ojos:</th>
            <th>Tamaño de ojos:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th colspan="3">Otra especificacion de ojos:</th>
        </tr>
        <tr>
            <td colspan="3"></td>
        </tr>
    </table>
</section>

<section id="Piel">
    <br>
    <h2>Cabello:</h2>

    <table>
        <tr>
            <th>Calvicie:</th>
            <th>Color de cabello:</th>
            <th>Tamaño de cabello:</th>
            <th>Tipo de cabello:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th colspan="4">Cualquier otra especificación del cabello:</th>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
    </table>
</section>


<section id="Ojos">
    <br>
    <h2>Vello facial:</p>

        <table>
            <tr>
                <th colspan="2">Cejas:</th>
            </tr>
            <tr>
                <td colspan="2"></td>
            </tr>
            <tr>
                <th>Bigote:</th>
                <th>Cualquier otra especificacion del bigote:</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Barba:</th>
                <th>Cualquier otra especificacion de la barba:</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
</section>

<section id="TamañoO">
    <br>
    <h2>Nariz:</h2><br>

    <table>
        <tr>
            <th>Forma de la nariz:</th>
            <th>Cualquier otra especificación de la nariz:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
</section>

<section id="Cabello">
    <b><h2>Boca:</h2>

        <table>
            <tr>
                <th>Tamaño de boca:</th>
                <th>Tamoño de labios:</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
</section>

<section id="CantidadC">
    <br><b><h2>Orejas:</h2></b>

    <table>
        <tr>
            <th>Tamaño de orejas:</th>
            <th>Formas de orejas:</th>
            <th>Cualquier otra especificación de la oreja:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</section>


<section id="información desaparición">
    <h2>Media filiacion complementaria</h2>
    <h2>Dientes</h2>

    <table>
        <tr>
            <th>¿Presenta ausencia de dientes?</th>
            <th>Especifique la ausencia dental:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>¿Tiene algún tratamiento dental?</th>
            <th>Especifique el tratamiento dental:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2>Proyeccion del menton</h2>
    <table>
        <tr>
            <th>Tipo de mentón:</th>
            <th>Cualquier especificacion del menton</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2>Deformaciones</h2>
    <table>
        <tr>
            <th>Región de la deformacion</th>
            <th>Especificacion de la deformacion:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2>Intervenciones quirurgicas</h2>
    <table>
        <tr>
            <th>Intervencion quirurjica:</th>
            <th>Especificacion de la intervencion quirurjica:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2>Enfermedades de la piel</h2>
    <table>
        <tr>
            <th>Tipo de enfermedad:</th>
            <th>Especificacion de la enfermedad en la piel:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2>Observaciones generales</h2>
    <table>
        <tr>
            <td></td>
        </tr>
    </table>

</section>

<section id="caracteristicas afiliacion">
    <h2>PRENDAS DE VESTIR</h2>

    <table>

        <tr>
            <th>Grupo Pertenecia</th>
            <th>Pertenecia</th>
            <th>Color</th>
            <th>Material</th>
            <th>Marca</th>
            <th>Descripcion</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</section>
<br>


<section id="Fcara">
    <br>
    <h2>SEÑAS PARTICULARES</h2>

    <table>
        <tr>
            <th>Region del cuerpo</th>
            <th>Vista</th>
            <th>Lado</th>
            <th>Tipo</th>
            <th>Cantidad</th>
            <th>Descripcion</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</section>

<section id="Tceja">
    <br>
    <h2>CONDICIONES DE VULNERABILIDAD</h2>
    <table>
        <tr>
            <th>Tipo de sangre</th>
            <th>RH</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
</section>

<section id="Mcejas">
    <br>
    <h2>Condiciones de salud</h2><br>

    <table>
        <tr>
            <th>Condicion</th>
            <th>Tratamiento</th>
            <th>Naturaleza</th>
            <th>Observaciones</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</section>

<section id="Orejast">
    <br>
    <h2>Enfermedades de la piel</h2><br>

    <table>
        <tr>
            <th>Tipo de enfermedades:</th>
            <th>Especificacion de la enfermedad de la piel:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
</section>

<section id="Orejasf">
    <br>
    <h2>Enfoque diferenciado</h2><br>

    <table>
        <tr>
            <th>Pertenecia grupal o étnica</th>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <th>Enfoque diferenciado</th>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <th>CARACTERISTICA PERSONAL QUE PUEDA COLOCAR A LA PERSONA EN MAYOR VULNERAVILIDAD</th>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <th>INFORMACIÓN PERSONAL ADICIONL QUE SE CONSIDERE RELEVANTE PARA LA BUSQUEDA Y LOCALIZACION DE LA PERSONA
            </th>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>
</section>


<section id="Narizf">
    <br>
    <h2>Embarazo</h2><br>

    <table>
        <tr>
            <th colspan="2">¿Esta emabarazada?</th>
        </tr>
        <tr>
            <th>Meses de embarazo</th>
            <td></td>
        </tr>
    </table>
</section>


<section id="contexto familiar">
    <h2>Modo, tiempo y lugar de la desaparición</h2>
    <h2>Hora y fecha de los hechos</h2>
    <table>
        <tr>
            <th>Fecha de desaparicón:</th>
            <th>Hora Desaparición:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Fecha de percato:</th>
            <th>Hora de percato:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th colspan="2">Aclaración de la fecha y hora de los hechos:</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
    </table>
</section>

<section id="contexto economico-laboral">
    <h2>Lugar de los hechos</h2>

    <table>
        <tr>
            <th>Calle:</th>
            <th>N° Exterior:</th>
            <th>N° Interior:</th>
            <th>Colonia</th>
            <th>Código Postal:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Estado:</th>
            <th>Municipio:</th>
            <th colspan="3">Localidad:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Entre calle 1:</th>
            <th>Entre calle 2:</th>
            <th colspan="3">Tramo carretero:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th colspan="5">Referencia:</th>
        </tr>
        <tr>
            <td colspan="5"></td>
        </tr>
    </table>
</section>

<section id="contexto social">
    <h2>Circunstancias de los hechos</h2>

    <table>
        <tr>
            <th>Zona del estado:</th>
            <th>Área que atendera:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th colspan="2">¿La persona desaparecida había recibido amenazas o había cambiado su comportamiento o rutina
                recientemente?
            </th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th colspan="2">Descripción de la situación de amenazas:</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th colspan="2">¿Cúantas veces antes la persona ha desaparecido o se ha ausentado?</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th colspan="2">Descripción de la situación previa o anote los folios en el campo siguiente si ya ha estado
                registrada:
            </th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th colspan="2">Folios previos</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th colspan="2">Dato de persona(s) que puedieron estar relacionadas o brindar información sobre la
                desaparición:
            </th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th colspan="2">Descripción de los hechos de la desaparición:</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th colspan="2">Síntesis de los hechos de desaparición:</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
    </table>

    <h2>Hipótesis</h2>
    <table>
        <tr>
            <th>Posible Hipótesis de desaparición 1:</th>
            <th>Circunstancia inicial 1:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Posible Hipótesis de desaparición 2:</th>
            <th>Circunstancia inicial 2:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Sitio inicial:</th>
            <th>Área que codifica sitio inical:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2>Desaparición asociada</h2>
    <table>
        <tr>
            <th>¿Desapareció con alguien más?:</th>
            <th>N° de personas en el mismo evento</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th colspan="2">Referencias de la o las otra(s) persona(s):</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
    </table>

    <h2>Folios directos</h2>
    <table>
        <tr>
            <td></td>
        </tr>
    </table>

    <h2>Folios indirectos</h2>
    <table>
        <tr>
            <td></td>
        </tr>
    </table>
</section>

<section id="Desapa-frozada">
    <h2>Desaparición forzada o por particulares</h2>
    <h2>Condiciones de desaparición</h2>
    <table>
        <tr>
            <th>¿Sufrió desaparición forzada?</th>
            <th>Autoridad:</th>
            <th>Describa la situación:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>¿Sufrió desaparición por particulares?</th>
            <th>Particular:</th>
            <th>Describa la situación:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Método de captura:</th>
            <th colspan="2">Observaciones del método de captura:</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th colspan="3">¿Existió detención previa o extorsión?</th>
        </tr>
        <tr>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th colspan="3">Despues de la desaparición o privación de la libertad de la persona...</th>
        </tr>
        <tr>
            <th>¿Ha sido avistado en alguna parte?</th>
            <th colspan="2">¿Dónde?</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"></td>
        </tr>
    </table>

    <h2>Información sobre el perpetrador</h2>
    <table>
        <tr>
            <th>Nombre(s)/apodo(s):</th>
            <th>Sexo:</th>
            <th>Descripción:</th>
        </tr>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
            <th>Último estatus del perpetrador:</th>
            <th colspan="2">Descripción del gurpo perpetrador</th>
        </tr>
        <td></td>
        <td colspan="2"></td>
        </tr>
        <tr>
            <th>¿Se sucitaron otros delitos antes o después de la desaparicón?</th>
            <th colspan="2">Especifique cuáles:</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"></td>
        </tr>
    </table>

</section>

<section id="Contextos">
    <h2>Contextos</h2>
    <h2>Contexto familiar</h2>
    <table>
        <tr>
            <th>N° de personas con las que vive:</th>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>
    <table>
        <tr>
            <th>Nombre del pariente</th>
            <th>Parentesco</th>
            <th>Ha ejercido violencia</th>
            <th>Es un familiar cercano</th>
            <th>Observaciones</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2>CONTEXTO ECONÓMICO-LABORAL</h2>

    <table>
        <tr>
            <th>¿Dónde trabaja?</th>
            <th>¿Cuantos años lleva laborando?</th>
            <th>¿Le gusta su trabajo?</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>¿Ha manifestado la intensión de irse a trabajar fuera de la ciudad?</th>
            <th colspan="2">¿A donde desea irse?</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>¿Ha sufrido violencia por parte de algún integrante de su trabajo?</th>
            <th colspan="2">¿Por parte de quién?</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>¿Sabe si tiene deudas?</th>
            <th>Monto aproximado de la deuda</th>
            <th>¿A quien le debe?</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2>Contexto social</h2>
    <table>
        <tr>
            <th>Pasatiempos</th>
            <th>Clubes u organizaciones a los que pertenece</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <th colspan="4">¿Estudia?</th>
        </tr>
        <tr>
            <th>Nivel</th>
            <th>Institución</th>
            <th>Horario</th>
            <th>Dirección</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <th colspan="5">Amistades</th>
        </tr>
        <tr>
            <th>Nombre</th>
            <th>Apodo</th>
            <th>Telefono</th>
            <th>Dirección</th>
            <th>Redes sociales</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

</section>

<section id="vehiculos">
    <h2>Vehículos involucrados</h2>
    <h2>Datos del vehiculo involucrado</h2>
    <table>
        <tr>
            <th>Relación con la persona desaparecida o no localizada:</th>
            <th>Marca:</th>
            <th>Submarca:</th>
            <th>Color:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Placa:</th>
            <th>Modelo(Año):</th>
            <th>Número de serie:</th>
            <th>Número de motor:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Número de permiso:</th>
            <th>Tipo de vehiculo:</th>
            <th colspan="2">Uso vehiculo:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th colspan="4">Señas particulares:</th>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th colspan="4">Fotografias</th>
        </tr>
        <tr>
            <td colspan="4"><!--Inserte la foto aqui --></td>
        </tr>
        <tr>
            <th colspan="4">Estatus del vehiculo:</th>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
    </table>
</section>

<section id="boletines">
    <h2>Generación de boletines</h2>
    <h2>Fotografías de la persona desaparecida</h2>
    <table>
        <tr>
            <td><!--Inserte la foto aqui --></td>
            <td><!--Inserte la foto aqui --></td>
        </tr>
        <tr>
            <td><!--Inserte la foto aqui --></td>
            <td><!--Inserte la foto aqui --></td>
        </tr>
        <tr>
            <td><!--Inserte la foto aqui --></td>
            <td><!--Inserte la foto aqui --></td>
        </tr>
    </table>

    <h2>Información exacta</h2>
    <table>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>

    <h2>Información tratada</h2>
    <table>
        <tr>
            <th>Señas particulares para el boletín</th>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <th>¿Es menor de edad?</th>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <th>Información adicional:</th>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>

    <h2>Generación de boletín</h2>
    <table>
        <tr>
            <th>Tipo de boletín</th>
            <th>Estatus de la persona desaparecida</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>

</section>

<section id="Folio">
    <h2>Folio y expediente</h2>
    <table>
        <tr>
            <th colspan="3">Folio cebv:</th>
        </tr>
        <tr>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Estado</th>
            <th>Municipio:</th>
            <th>Número de personas en el mismo evento:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Fecha de desaparición:</th>
            <th>Zona de desaparición:</th>
            <th>Terminación de la entidad:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <h2>Información del reporte</h2>
    <table>
        <tr>
            <th>Tipo de folio:*</th>
            <th>Tipo de desaparición:</th>
            <th>Nombre de quién asignó folio:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</section>

<section id="Localizacion">
    <h2>Datos de localización</h2>
    <h2>Localización</h2>
    <table>
        <tr>
            <th colspan="2">¿La persona desaparecida fue localizada con vida?</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>Estatus preliminar:*</th>
            <th>Fecha de estatus preliminar:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th colspan="2">Fecha de localización:*</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <th colspan="2">localizada con vida</th>
        </tr>
        <tr>
            <th>Estatus formalizado</th>
            <th>Fecha de actualización del estatus formalizado:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th colspan="2">Síntesis de localización:*</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th colspan="2">Describa brevemente la condición psicofísica en que fue localizada la persona</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <th colspan="2">Ubicación de la localización</th>
        </tr>
        <tr>
            <th>Estado:*</th>
            <th>Municipio:*</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2>Hipótesis de la localización</h2>
    <table>
        <tr>
            <th>Hipótesis de localización(ogpi) 1:</th>
            <th>Circunstancia final 1:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Hipótesis de localización(ogpi) 2:</th>
            <th>Circunstancia final 2:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>Sitio final:</th>
            <th>Area que codifica inicial</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th colspan="2">Hipótesis deb</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th colspan="2">Observaciones sobre la actualización del status</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
    </table>

    <h2>Documentación</h2>
    <table>
        <tr>
            <th>Informe de localización</th>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <th>Prueba de vida</th>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <th>Identificación oficial</th>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>
</section>

<section id="ogpi">
    <h2>Control ogpi</h2>
    <h2>Información general</h2>
    <table>
        <tr>
            <th>Fecha de captura</th>
            <th>Nombre del capturista</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th colspan="2">Observaciones generales</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th colspan="2">N° de tarjeta</th>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
    </table>

    <h2>Información rnpdno</h2>
    <table>
        <tr>
            <th>Folio fub:</th>
            <th>Autoridad que ingresó fub:</th>
            <th>Estatus en rnpdno:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</section>


<div id="footer">
    <p>
        Enríquez s/n, Zona Centro <br>
        C.P. 91000 Xalapa, Veracruz <br>
        Tel: 01 228 841 7400 ext. 3531 <br>
        <b>www.segobver.gob.mx</b>
    </p>

</div>


</body>
</html>
