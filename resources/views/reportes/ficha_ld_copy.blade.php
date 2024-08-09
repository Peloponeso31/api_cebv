<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>

    
@page { margin: 100px 50px;}

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


  #footer .page:after { content: counter(page, upper-roman); }
    


h1, h2{
    margin-top: 40px;
    margin-bottom: 20px;
  }

  h1 {
    font-size: 1.5em;
    text-align: left;
  }
  
  h2{
    font-size: 1em;
    text-align: left;
  }

.Fecha-Folio{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
    grid-template-rows: 1fr 1fr 1fr;
}

.container{
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 10px;
    border: 2px solid black;
    padding: 10px;
}

.container p{
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

.container2{
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 10px;
    border: 2px solid black;
    padding: 10px;
}

.container2 p{
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

.container3{
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 10px;
    border: 2px solid black;
    padding: 10px;
}

.container3 p{
    margin: 5px 0;
}

.Lugar,
.Fecha,
.Hora,
.Datos,
.Narrativa{
    border: 1px solid black; 
    padding: 5px;
    text-align: justify;
}

.container4{
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 10px;
    border: 2px solid black;
    padding: 10px;
}


.container4 p{
    margin: 5px 0;
}

.Vestimenta,
.Tatuajes{
    border: 1px solid black; 
    padding: 5px;
    text-align: justify;
}

.Señas{
    border: 1px solid black; 
    padding: 5px;
    text-align: justify;
}

.Estatura-Peso{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
}

.Complexion{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
    border: 1px solid black;
}

.R,
.O,
.Ro,
.D,
.A{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}


.Piel{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
    border: 1px solid black;
}

.B,
.Mc,
.Mo,
.N,
.A,
.Al{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}

.Ojos{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    border: 1px solid black;
}

.R,
.O,
.Ra,
.A{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}


.Tamaño{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    border: 1px solid black;
}

.G,
.M,
.P{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}

.Tcabello{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    border: 1px solid black;
}

.L,
.R,
.C,
.O{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}

.Ccabello{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    border: 1px solid black;
}

.A,
.R,
.E,
.C{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}

.Cara{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
    border: 1px solid black;
}

.R,
.O,
.T,
.Cr,
.A{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}

.Ceja{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
    border: 1px solid black;
}

.P,
.R,
.E,
.D,
.R{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}


.Modicejas{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    border: 1px solid black;
}

.T,
.P,
.Te{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}

.OrejasF{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    border: 1px solid black;
}

.C,
.O,
.R,
.T{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}

.OrejasT{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    border: 1px solid black;
}

.C,
.M,
.G{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}

.NarizF{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    border: 1px solid black;
}

.C,
.A,
.G{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}

.Boca{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    border: 1px solid black;
}

.C,
.M,
.G{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}

.Labios{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    border: 1px solid black;
}

.D,
.G,
.M{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}

.Dientes{
    display: grid;
    grid-template-columns: 1fr 1fr;
    border: 1px solid black;
}

.A,
.Na{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}

.Bigote{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    border: 1px solid black;
}

.L,
.P,
.R{
 border: 1px solid black;
 padding: 5px;
 text-align: center;
}

.CF{
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 10px;
    border: 2px solid black;
    padding: 10px;
}

.CF p{
    margin: 5px 0;
}

.Conyugal,
.PVive,
.ParejaS,
.Hijos,
.IntCercano,
.Violencia{
    border: 1px solid black;
    padding: 5px;
    text-align: justify;
}

.CEL{
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 10px;
    border: 2px solid black;
    padding: 10px;
}

.CEL p{
    margin: 5px 0;
}

.Trabaja,
.Gtrabajo,
.FueraCiudad,
.VioTrabajo,
.Deudas{
    border: 1px solid black; 
    padding: 5px;
    text-align: justify;
}

.CS{
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 10px;
    border: 2px solid black;
    padding: 10px;
}

.CS p{
    margin: 5px 0;
}

.Pasatiempos,
.Organizacion,
.Estudia,
.Amistades,
.AMuniEsta,
.Redes{
    border: 1px solid black; 
    padding: 5px;
    text-align: justify;
}

#Firma{
    color: solid black;
    text-align: center; 
}
.montserrat-alternates-black {
  font-family: "Montserrat Alternates", sans-serif;
  font-weight: 900;
  font-style: normal;
}


        table {
            border-collapse:collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
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
        <h1>Lugar: Xalapa, Ver.</h1>
            <div class="Fecha-Folio">
                <p><b>Fecha y Hora:</b><p>20/03/2024, 10:23:45</p> </p>
            </div> 
            <p><br>Manifiesto que la información que aporte para el RNPDNO sea utilizada exclusivamente para la búsqueda e identificación
            de la Persona Desaparecida o No Localizada. Si:( )  No:( )</p>
    
            <p>¿Autoriza que se haga pública la información de la Persona Desaparecida o No Localizada? Si:( ) No:( )</p>
          <h2>DATOS DEL REPORTANTE</h2>
        
          <table>
            <tr>
                <th>Nombre Completo*</th>
                <td colspan="3">Ismael Matus García</td>
            </tr>
            <tr>
                <th>Edad y Fecha de Nacimiento</th>
                <td>23 años, 07 de Marzo de 2001</td>
                <th>Sexo: <br>Genero</th>
                <td>Hombre <br>Maculino</td>
                
            </tr>
            <tr>
                <th>CURP:</th>
                <td>MAGI070301</td>
                <th>INE:</th>
                <td>MTGRIS01030730H800</td>
            </tr>
            <tr>
                <th>Estado Civil:</th>
                <td colspan="3"></td> 
            </tr>
            <tr>
                <th>Religión:</th>
                <td></td>
                <th>Lengua:</th>
                <td></td>
            </tr>
            <tr>
                <th>Escolaridad:</th>
                <td></td>
                <th>Ocupación:</th>
                <td></td>
            </tr>
            <tr>
                <th>Domicilio:</th>
                <td colspan="3"></td>
                
            </tr>
            <tr>
                <th>Telefono(s)*:</th>
                <td colspan="3"></td>
            </tr>
            <tr>
                <th>Correo electronico:</th>
                <td colspan="3"></td>
            </tr>
            <tr>
                <th>Número de dependientes economicos:</th>
                <td colspan="3"></td>
            </tr>
            <tr>
                <th>Relación con la persona desaparecida o no Localizada:</th>
                <td colspan="3"></td>
            </tr>
            <tr>
                <th>¿Pertenece a alguna minoria?(Pueblo indigena, afrodescendiente, LGBTTTI, migrabte)</th>
                <td colspan="3"></td>
            </tr>
            <tr>
                <th>¿Pertenece o ha pertenecido a algún colectivo? <br>¿Cuál?</th>
                <td colspan="3"></td>
            </tr>
            <tr>
                <th>¿Ha realizado búsquedas con anterioridad? <br>¿En dónde?</th>
                <td colspan="3"></td>
            </tr>
            <tr>
                <th>A partir de la desaparición o privación de la libertad de su familiar ¿Ha sido victima de extorsión o fraude?, ¿Ha recibido amenazas?, ¿Sabe de donde provienen?</th>
                <td colspan="3"></td>
            </tr>
            <tr>
                <th>Tipo de reporte(Presencial, Noticia, Denuncia)</th>
                <td colspan="3"></td>
            </tr>

        </table>

        </section>
    
    <section id="Desaparecida">
        <h2>DATOS DE LA PERSONA DESAPARECIDA O NO LOCALIZADA</h2>

    <table>
        <tr>
            <th>Nombre Completo*</th>
            <td colspan="3">{{ $desaparecido->persona->nombre }}
                {{ $desaparecido->persona->apellido_paterno }}
                {{ $desaparecido->persona->apellido_materno }}</td>
            
        </tr>
        <tr>
            <th>Sobrenombre/apodo:</th>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Sexo: <br>Genero:</th>
            <td></td> 
            <th>Nacionalidad y estatus Migratorio:</th>
            <td></td>
        </tr>
        <tr>
            <th>Edad y fehca de nacimiento:*</th>
            <td>{{ $desaparecido->persona->edad_anos() }} años, {{ $desaparecido->persona->fecha_nacimiento }}</td>
            <th>Luagar de nacimiento(Localidad, municipio, estado, país)</th>
            <td></td>
        </tr>
        <tr>
            <th>Tipo de sangre:</th>
            <td></td>
            <th>CURP</th> 
            <td>{{ $desaparecido->persona->curp }}</td>
        </tr>
        <tr>
            <th>INE:</th>
            <td></td>
            <th>Religión:</th> 
            <td></td>
        </tr>
        <tr>
            <th>Lengua:</th>
            <td colspan="3"></td> 
        </tr>

        <tr>
            <th>Ocupación:</th>
            <td></td>
            <th>Escolaridad:</th> 
            <td></td>
        </tr>

        <tr>
            <th>Discapaciad:*</th>
            <td colspan="3">(Auditiva, visual, motriz, otra) <br> no</td> 
        </tr>

        <tr>
            <th>Telefono celular:*</th>
            <td colspan="3">(Número telefonico, lada y compañia celular) <br> 2283561304</td> 
        </tr>

        <tr>
            <th>Dirección de residencia:</th>
            <td colspan="3"></td> > 
        </tr>

        <tr>
            <th>¿Tiene conocimineto de que consuma tabaco, alcohol o alguna otra sustancia?:</th>
            <td colspan="3">¿Si, cuál? ¿Con que frecuencia? <br> no</td> 
    </tr>

    <tr>
        <th>¿Pertenece a algún grupo vulnerable?(Pueblo indígena, afrodescendiente, LGBTTTI, migrante):</th>
        <td colspan="3"></td> >  
    </tr>
    <tr>
        <th colspan="4">Ficha de búsqueda o boletín: Si (   ) No (   ) <br>Institución:</th>
    </tr>
   
</section>
    
    <section id="información desaparición">
        <h2>INFORMACIÓN SOBRE LA DESAPARICIÓN</h2>

    <table>
        <tr>
            <th>Lugar de desaparición:*</th>
            <td></td>
        </tr>
        <tr>
            <th>Fecha de desaparición;*</th>
            <td></td>
            
        </tr>
        <tr>
            <th>Hora aproximada de la desaparición o última hora de contacto*</th>
            <td></td>
        </tr>
        <tr>
            <th>Datos de personas que puedas brindar información y/o probablemente involucradas</th>
            <td></td> 
        </tr>
        <tr>
            <th>Narrativa de los hechos que se reportan*</th>
            <td></td>
        </tr>
        <tr>
            <th>Si la persona fue desaparecida junto a otras personas en el mismo suceso ¿Cuantas más fueron desaparecidas con ella? <br>indicar los nombres <br>¿Se conocian?<br> ¿Quién cree que pudo haber participado en la desaparición? </th>
            <td>asddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</td> 
        </tr>
        <tr>
            <th>Desaparicón forzada <br>(Gendarmería Nacional, Ejército, Marina Armada de México, Policía Naval, Policía Militar, Policía Federal/Guarcia Nacional, Policia Ministerial FGE, Policia Estatal, Fuerza Civil, Policía Municipal, Un Agente Migratorio, Servidor Público, otro)</th>
            <td></td>
        </tr>
        <tr>
            <th>Desaparición por particulares <br>(Una amistad, Un conocido, pareja sentimental, Un familiar, Uno o varios integrantes de la delincuencia organizada, desconocido, otros)</th>
            <td></td>
        </tr>
        <tr>
            <th>Metodos de captura <br>(Desaparición, Extorsión o engaño, Privación por particular-conocido como "Levantón", Retén u operativo, Orden de aprehensión, secuestro, otro-especifique, sin información)</th>
            <td></td>
        </tr>
        <tr>
            <th>Medios de Captura <br>(Armas blancas, armas de fuego cortas, armas de fuego largas, otro, sin información)</th>
            <td></td>
        </tr>
        <tr>
            <th>¿La desaparición se realizo abordo de algún vehiculo? <br> Tipo de vehículo <br>(Propio, laboral, oficial, patrulla, vehiculo militar, otro) <br>Número de vehiculo <br>Número de placas <br>Insignias del vehiculo <br>Caracteristicas del vehiculo</th>
            <td></td>
        </tr>
        <tr>
            <th>¿Hay testigos de los hechos?</th>
            <td></td>
        </tr>
        <tr>
            <th>¿Existio detención legal previa o extorsión?</th>
            <td></td>
        </tr>
        <tr>
            <th>Despues de la desaparicion o privacion de la libertad de la persona. ¿Ha sido avistado en alguna partr?(Sí ¿Dónde,? no)</th>
            <td></td>
        </tr>
        <tr>
            <th>Datos sobre el presunto perpetrador <br>(si se conoce) <br>(Nombre, otros nombres/apodo, género, ciudad, escolaridad)</th>
            <td></td>
        </tr>
        <tr>
            <th>Último estatus del perpetrados <br>(Vivo, Muerto, se desconoce, causo baja de una corporacion, esta en servicio)</th>
            <td></td>
        </tr>
        <tr>
            <th>Descripción del grupo perpetrador <br>(Uniforme, Insignias, Vestimentas, Descripcion fisica, otros)</th>
            <td></td>
        </tr>
        <tr>
            <th>Numero de carpeta de investigacion, Investigacion Ministerial y Fiscal a cargo</th>
            <td></td>
        </tr>
        <tr>
            <th>¿Se sucitaron otros delitos antes o despues de la desaparición? ¿Cuáles?</th>
            <td></td>
        </tr>
        </section>

        <section id="contexto familiar">
            <h2>CONTEXTO FAMILIAR</h2>
    
        <table>
            <tr>
                <th>Estado conyugal</th>
                <td>Soltero</td>
                <th>¿Con qué personas vive?</th>
                <td>Sus papás y su hermano</td>
            </tr>
            <tr>
                <th>Datos de la última pareja sentimental conocida</th>
                <td>No se le conocio</td>
                <th>Hijas(os)</th>
                <td>Ninguno</td>
            </tr>
            <tr>
                <th>¿Quién es el integrante de su familia más cercano?</th>
                <td>Su hermano</td>
                <th>¿Conoce si ha sufrido algún tipo de violencia por parte de algún integrante de la familia?</th>
                <td>Ninguna</td>
            </tr>
        </table>
        </section>

        
        <section id="contexto economico-laboral">
            <h2>CONTEXTO ECONÓMICO-LABORAL</h2>
       
        <table>
            <tr>
                <th>¿Dónde trabaja o cuál es su medio de subsistencia?</th>
                <td>En el tecnologico</td>
                <th>¿Sabe si le gusta su trabajo?</th>
                <td>Si</td>
            </tr>
            <tr>
                <th>¿Ha manifestado la intensión de irse a trabajar fuera de la ciudad?</th>
                <td>Si</td>
                <th>¿Conoce si ha sufrido algún tipo de violencia por parte de algún integrante de su trabajo?</th>
                <td>se desconoce</td>
            </tr>
            <tr>
                <th>¿Sabe si tiene deudas?</th>
                <td colspan="3">Se desconoce</td>
            </tr>
            
        </table>
        </section>
    
        <section id="contexto social">
            <h2>CONTEXTO SOCIAL</h2>
        
        <table>
            <tr>
                <th>¿Qué pasatiempos tiene?</th>
                <td>practicar deportes, jugar videojuegos e ir al gym</td>
                <th>¿Pertenece a algún club u organización?¿Puede mencionar?</th>
                <td>si, no me se el nombre</td>
            </tr>
            <tr>
                <th>¿Estudia?</th>
                <td>si</td>
                <th>¿Puede mencionar sus amistades más cercanas?</th>
                <td>No me se los nombres</td>
            </tr>
            <tr>
                <th>¿Ha manifestado tener amistades en otro Municipio o Estado?</th>
                <td>Si</td>
                <th>Correo electrónico, Nombre en sus Redes Sociales</th>
                <td>ismaelmg46@gmail.com, IsmaelMAGA, ismaelmaga_18</td>
            </tr>
        </table>
        </section>
        

    </section>
    
    <section id="caracteristicas afiliacion">
        <h2>CARACTERISTICAS DE MEDIA AFILIACION DE LA PERSONA DESAPARECIDA O NO LOCALIZADA</h2>

    <table>

        <tr>
            <th>Vestimenta que porta</th>
            <td>Playera verde, tenis negros, pantalon negro</td>
        </tr>
        <tr>
            <th>Señas particulares*</th>
            <td>Ciatriz en el dedo indice</td> 
        </tr>

        <tr>
            <th>Tatuajes</th>
            <td>Ninguno</td>
        </tr>

    </table>
    
    <div class="Estatura-Peso">
        <p><b>Estaura aproximada:</b><p>{{ $desaparecido->persona->estatura }}m</p> </p>
        <p><b>1. Complexión/Peso:</b><p>{{ $desaparecido->persona->peso }}kg</p> </p>
        <table>
            <tr>
                <th>Delaga</th>
                <th>Mediano</th>
                <th>Robusto</th>
                <th>Obeso</th>
                <th>Otro</th>
            </tr>
        </table>
    </div> 
    </section>
    
    
    <section id="Piel">
        <br><h2><b>2. Color de piel:</b></h2>
       
        <table>
            <tr>
                @foreach (App\Models\Catalogos\ColorPiel::all() as $color_piel)
                @if ($color_piel->colorpiel == $desaparecido->persona->caracteristicasfisicas->color_piel->colorpiel)
                    <th> <mark style="background-color: yellow;"> {{$color_piel->color}} </mark> </th>
                @else
                    <th> {{$color_piel->colorpiel}} </th>
                @endif
            @endforeach
            </tr>
        </table>
        </section>

        <section id="Cabello">
            <b><h2>3. Cabello:</h2>
                <p>3.1 Tamaño</p>
                <table>
                    <tr>
                        <th>Corto</th>
                        <th>Al hombro</th>
                        <th>Largo</th>
                        <th>Rapado</th>
                        <th>No valorable</th>
                    </tr>
                </table>
                <p>3.2 Tipo:</p>
                <table>
                    <tr>
                        @foreach (App\Models\Catalogos\TipoCabello::all() as $tipo_cabello)
                        @if ($tipo_cabello->tipocabello == $desaparecido->persona->caracteristicasfisicas->tipo_cabello->tipocabello)
                            <th> <mark style="background-color: yellow;"> {{$tipo_cabello->color}} </mark> </th>
                        @else
                            <th> {{$tipo_cabello->tipocabello}} </th>
                        @endif
                    @endforeach
                    </tr>
                </table>
                <p>3.3 Color</p>
                <table>
                    <tr>
                        @foreach (App\Models\Catalogos\ColorCabello::all() as $color_cabello)
                        @if ($color_cabello->colorcabellos == $desaparecido->persona->caracteristicasfisicas->color_cabello->colorcabellos)
                            <th> <mark style="background-color: yellow;"> {{$color_cabello->colorcabellos}} </mark> </th>
                        @else
                            <th> {{$color_cabello->colorcabellos}} </th>
                        @endif
                    @endforeach
                    </tr>
                </table>
                <p>3.4 Modificaciones:</p>
                <table>
                    <tr>
                        <th>Base/Permanente</th>
                        <th>Alaciado</th>
                        <th>Mechas</th>
                        <th>Militar</th>
                        <th>Extenciones</th>
                        <th>Trenzado</th>
                        <th>Rastas</th>
                    </tr>
                    <tr>
                        <th>Tatuado</th>
                        <td colspan="2">Peluca:</td>
                        <td colspan="2">Bisoñe:</td>
                        <td colspan="2">Teñido:</td>
                    </tr>
                </table>
                <p>3.5 Calvicie/alopecia:</p>
                <table>
                    <tr>
                        <th>Incipiente</th>
                        <th>Frontal</th>
                        <th>Coronal</th>
                        <th>Tonsural</th>
                    </tr>
                </table>
        </section>

        <section id="Tceja">
            <br><h2><b>4. Cejas:</b></h2>
        <table>
            <tr>
                <th>Poblada</th>
                <th>Regulares</th>
                <th>Escasa</th>
                <th>Depilada</th>
                <th>Rasurada</th>
            </tr>
            <tr>
                <td colspan="5">Modificaciones:</td>
            </tr>
        </table>
        </section>
    
    
        <section id="Ojos">
            <br> <h2><b>5 Ojos:</b></h2>
            <p>5.1 Color:</p>
            <table>
                <tr>
                    @foreach (App\Models\Catalogos\ColorOjos::all() as $color_ojos)
                            @if ($color_ojos->color == $desaparecido->persona->caracteristicasfisicas->color_ojos->color)
                                <th> <mark style="background-color: yellow;"> {{$color_ojos->color}} </mark> </th>
                            @else
                                <th> {{$color_ojos->color}} </th>
                            @endif
                        @endforeach
                </tr>
            </table>

            <p>5.2 Forma:</p>
            <table>
                <tr>
                    <th>Redondos</th>
                    <th>Ovales</th>
                    <th>Rasgados</th>
                    <th>Alargados</th>
                </tr>
            </table>
       
            <br> <p>5.3 Tamaño:</p><br>
            
                <table>
                    <tr>
                        <th>Grandes</th>
                        <th>Medianos</th>
                        <th>Pequeños</th>
                    </tr>
                    <tr>
                        <td colspan="3">Particularidades: <br>Pestañas Largas</td>
                    </tr>
                    <tr>
                        <td colspan="3">Patologias:</td>
                    </tr>
                </table>
        </section>

        <section id="Narizf">
            <br> <h2><b>6. Nariz</b></h2><br>
           
                 <table>
                    <tr>
                        <th>Ancha/Chata</th>
                        <th>Aguileña</th>
                        <th>Recta</th>
                    </tr>
                    <tr>
                        <td colspan="3">Particulares:</td>
                    </tr>
                    <tr>
                        <td colspan="3">Traumatismo con desviación:</td>
                    </tr>
                </table>
        </section>

        <section id="Boca">
            <br> <h2><b>7. Boca:</b></h2><br>
            <p>7.1 Tamaño</p>
            
                 <table>
                    <tr>
                        <th>Chica</th>
                        <th>Mediana</th>
                        <th>Grande</th>
                    </tr>
                </table>
        </section>

        <section id="Labios">
            <br> <h2><b>8. Labios</b></h2><br>
         
                 <table>
                    <tr>
                        <th>Delgados</th>
                        <th>Medianos</th>
                        <th>Gruesos</th>
                        <th>Mixtos</th>
                    </tr>
                    <tr>
                        <td colspan="4">Modificaciones:</td>
                    </tr>
                    <tr>
                        <td colspan="4">Cirugias/Patologias:</td>
                    </tr>
                </table>
        </section>

        <section id="Dientes">
            <br> <h2><b>9. Dientes</b></h2><br>
            
                    <table>
                        <tr>
                            <th>Ausencia: muela de lado izquierdo</th>
                            <th>Dentadura completa</th>
                        </tr>
                        <tr>
                            <td colspan="2">Tratamiento dental</td>
                        </tr>
                    </table><br>
        </section>

        <section id="morfologia">
            <div class="Morfologica">
                <div class="L"> <img src="{{ public_path("reportes/ficha_de_datos/Dentadura.jpg") }}"
                    width="500"
                    height="500"/> </div> 
                 </div><br>
        </section>

        <section id="Bigote">
            <br> <h2><b>10. Vello facial</b></h2><br>
            <p>10.1 Región</p>
                 <table>
                    <tr>
                        <th>Barba</th>
                        <th>Bigote</th>
                        <th>Patilla</th>
                    </tr>
                </table>
                <p>10.2 Color</p>
                <table>
                    <tr>
                        <th>Castaño</th>
                        <th>Negro</th>
                        <th>Rubio</th>
                        <th>Pelirojo</th>
                        <th>Entrecano</th>
                        <th>Canoso</th>
                    </tr>
                </table>

                <p>10.3 Volumen</p>
                <table>
                    <tr>
                        <th>Poblada</th>
                        <th>Lampiña</th>
                        <th>Escasa</th>
                    </tr>
                </table>

                
                <p>10.4 Corte o estilo</p>
                <table>
                    <tr>
                        @foreach (App\Models\Catalogos\TipoCabello::all() as $tipo_cabello)
                            @if ($tipo_cabello->id == $desaparecido->persona->caracteristicasfisicas->tipo_cabello->id)
                                <th> <mark style="background-color: yellow;"> {{$tipo_cabello->tipocabello}} </mark> </th>
                            @else
                                <th> {{$tipo_cabello->tipocabello}} </th>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td colspan="8">Modificaciones:</td>
                    </tr>
                </table>

        </section>
    
       
       
        <section id="CantidadC">
            <br><b><h2>11. Proyeción del mentón</h2></b>
           
                <table>
                    <tr>
                        <th>Saliente</th>
                        <th>Retraido</th>
                        <th>Recto</th>
                    </tr>
                    <tr>
                        <td colspan="3">Modificaciones/Observaciones:</td>
                    </tr>
                    <tr>
                        <td colspan="3">Cirujias/Patologias</td>
                    </tr>
                </table>
        </section>
    
        <section id="Fcara">
            <br><h2><b>12. Pabellón auricular</b></h2>
        
        <table>
            <tr>
                <th colspan="2">Completos</th>
                <th colspan="2">Incompletos</th>
            </tr>
            <tr>
                <th>Cuadradas</th>
                <th>Ovalados</th>
                <th>Redondos</th>
                <th>Triangulares</th>
            </tr>
            <tr>
                <td colspan="4">Modificaciones/Observaciones: (aretes, sin aretes, obliterada, prótesis auditiva) <br> sin aretes</td>
            </tr>
            <tr>
                <td colspan="4">Cirujias/Patologias <br> No</td>
            </tr>
        </table>
        </section>
    
        <section id="morfologia">
            <br> <h2>Particularidades en la región corporal <b>Marcar o dibujar</b></h2><br>
            <div class="Morfologica">
                <div class="L"> <img src="{{ public_path("reportes/ficha_de_datos/CuerpoUNIXMejorado.png") }}"
                    width="500"
                    height="500"/> </div> 
                 </div><br>
        </section>
    
        <section id="Dientes">
            <br> <h2><b>Describa</b></h2><br>
            
                    <table>
                        <tr>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Observaciones o aportaciones adicionales que quiera agregar a esta entrevista: <br> Tiene un dedo del pie izquierdo mochado</td>
                        </tr>
                    </table><br>
        </section>

        <section id="Firma">
            <br><p class="montserrat-alternates-black"><b>---------------------------------------------------------------</p>
            <p class="montserrat-alternates-black">Nombre y firma de la persona de la Comisión estatal de Busqueda<br>que realizó la entrevista</b></p>
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