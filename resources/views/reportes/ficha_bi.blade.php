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
            <div class="Fecha-Folio">
                <table>
                    <tr>
                        <th>Fecha:</th>
                        <td>20/03/2024</td>
                        <th>Folio:</th>
                        <td>No. Folio</td>
                    </tr>
                    <tr>
                        <th>Hora:</th>
                        <td colspan="3">10:23:45</td>
                    </tr>
            </table>
            </div> 
            <p><br>Manifiesta que la información que aporte para el RNPDNO sea utilizada exclusivamente para la búsqueda e identificación
            de la Persona Desaparecida o No Localizada.  <b>SI   NO</b></p>
    
            <p>¿Solicita que se haga pública la información de la Persona Desaparecida o No Localizada?   <b>SI   NO</b></p>
          <h2>DATOS DEL REPORTANTE</h2>
        
          <table>
            <tr>
                <th>Nombre Completo*</th>
                <td colspan="3">Ismael Matus García</td>
                
            </tr>
            <tr>
                <th>Edad y Fecha de Nacimiento</th>
                <td>23 años, 07 de Marzo de 2001</td>
                <th>Sexo</th> 
                <td>Hombre</td>
            </tr>
            <tr>
                <th>Domicilio</th>
                <td colspan="3">Lucas Martin</td> 
            </tr>
            <tr>
                <th>Teléfono(s)*</th>
                <td colspan="3">2283561304</td>
            </tr>
            <tr>
                <th>Correo Electronico</th> 
                <td colspan="3">ismaelmg46@gmail.com</td> 
            </tr>
            <tr>
                <th>Relación con la Persona <br>Desaparecida o No Localizada*</th>
                <td>Tio</td>
                <th>Tipo de Reporte</th>
                <td>Denuncia</td> 
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
            <th>Genero</th>
            <td>(Femenino, Masculino, Otro) <br>{{ $desaparecido->persona->genero }} </td>
            <th>Nacionalidad y Estatus Migratorio</th>
            <td></td>
        </tr>
        <tr>
            <th>Edad y Fecha de Nacimiento*</th>
            <td>{{ $desaparecido->persona->edad_anos() }} años, {{ $desaparecido->persona->fecha_nacimiento }}</td> 
            <th>Tipo de Sangre</th>
            <td></td>
        </tr>
        <tr>
            <th>Ocupación</th>
            <td>{{ $desaparecido->persona->ocupacion }}</td> 
            <th>Escolaridad</th>
            <td></td>
        </tr>
        <tr>
            <th>Condición de Salud</th>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th>Teléfono Celular*</th>
            <td>2283561304</td>
            <th>CURP</th>
            <td>{{ $desaparecido->persona->curp }}</td> 
        </tr>
        <tr>
            <th>Dirección de Residencia</th>
            <td colspan="3">Lucas Martin</td>
        </tr>
        <tr>
            <th>¿Tiene conocimiento de que consuma tabaco, alchol o alguna otra sustancia?</th>
            <td> ¿Si, cual? <br>No <br>¿Con qué frecuencia? <br>No</td> 
        <th>¿Ha recibido alguna llamada de exigencia monetaria?</th>
        <td>¿Si, cuanto? <br>No <br> ¿Por qué medio?<br></td>
    </tr>
   
</section>
    
    <section id="información desaparición">
        <h2>INFORMACIÓN SOBRE LA DESAPARICIÓN</h2>

    <table>
        <tr>
            <th>Lugar de desaparición*</th>
            <td colspan="3">Ismael Matus García</td>
        </tr>
        <tr>
            <th>Fecha de desaparición*</th>
            <td>23 años, 07 de Marzo de 2001</td>
            <th>Hora aproximada de la desaparición o última hora de contacto*</th>
            <td>9:30:42 pm</td>
            
        </tr>
        <tr>
            <th>Datos de personas que puedas brindar información y/o probablemente involucradas<</th>
            <td colspan="3">No se</td> 
        </tr>
        <tr>
            <th>Narrativa de los hechos que se reportan*</th>
            <td colspan="3">asddddddddddddddddddddddddddd</td>
        </tr>
        

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
            <td>(Tatuajes, lunares, manchas, cicatrices, perforaciones, protesis, acne, amputaciones, quemaduras, malformaciones, entre otros) <br> Ciatriz en el dedo indice</td> 
        </tr>

        <tr>
            <th>Tatuajes</th>
            <td>(Ubicación, descripción) <br>Ninguno</td>
        </tr>

    </table> <br>
    
    <div class="Estatura-Peso">
        <table>
            <tr>
                <th>Estaura:</th>
                <td>{{ $desaparecido->persona->estatura }}m</td>
                <th>Peso:</th>
                <td>{{ $desaparecido->persona->peso }}kg</td>
            </tr>
        </table>
    </div> 
    </section>
    
    <section id="Complexion">
        <h2>Complexión:</h2>
    <table>
        <tr>
            <th>Regular</th>
            <th>Obesa</th>
            <th>Robusta</th>
            <th>Delgada</th>
            <th>Atlética</th>
        </tr>
    </table>
    </section>
    
    <section id="Piel">
        <br><h2>Color de piel:</h2>
       
        <table>
            <tr>
                <th>{{ $desaparecido->persona->caracteristicasfisicas->color_piel ->colorpiel }}</th>
                
            </tr>
        </table>
        </section>
    
    
        <section id="Ojos">
            <br> <h2>Color de ojos: {{ $desaparecido->persona->caracteristicasfisicas->color_ojos->color }}</h2><p>Forma de ojos:</p>
            
            <table>
                <tr>
                    <th>Redondos</th>
                    <th>Ovales</th>
                    <th>Rasgados</th>
                    <th>Alargados</th>
                </tr>
            </table>
        </section>
    
        <section id="TamañoO">
            <br> <h2>Tamaño de ojos:</h2><br>
            
                <table>
                    <tr>
                        <th>Grandes</th>
                        <th>Medianos</th>
                        <th>Pequeños</th>
                    </tr>
                </table>
        </section>
    
        <section id="Cabello">
            <b><h2>Color de cabello: {{ $desaparecido->persona->caracteristicasfisicas->color_cabello ->colorcabellos }}</h2><p>Corto/largo:</p> <p>Tipo de cabello:</p>
            
                <table>
                    <tr>
                        <th>{{ $desaparecido->persona->caracteristicasfisicas->tipo_cabello ->tipocabello }}</th>
                    
                    </tr>
                </table>
        </section>
       
        <section id="CantidadC">
            <br><b><h2>Cantidad de cabello:</h2></b>
           
                <table>
                    <tr>
                        <th>Abundante</th>
                        <th>Regular</th>
                        <th>Escaso</th>
                        <th>Crespo</th>
                    </tr>
                </table>
        </section>
    
        <section id="Fcara">
            <br><h2>Forma de cara:</h2>
        
        <table>
            <tr>
                <th>Redonda</th>
                <th>Ovalada</th>
                <th>Triangular</th>
                <th>Cuadrada/Rectangular</th>
                <th>Alargada</th>
            </tr>
        </table>
        </section>
       
        <section id="Tceja">
            <br><h2>Tipo de ceja:</h2>
        <table>
            <tr>
                <th>Poblada</th>
                <th>Regulares</th>
                <th>Escasa</th>
                <th>Depilada</th>
                <th>Rasurada</th>
            </tr>
        </table>
        </section>
    
        <section id="Mcejas">
            <br> <h2>Modificaciones de la ceja:</h2><br>
            
                 <table>
                    <tr>
                        <th>Tatuadas</th>
                        <th>Perforadas</th>
                        <th>Teñidas</th>
                    </tr>
                </table>
        </section>
    
        <section id="Orejasf">
            <br> <h2>Orejas de su forma:</h2><br>
            
            <table>
                <tr>
                    <th>Cuadrada</th>
                    <th>Ovalada</th>
                    <th>Redonda</th>
                    <th>Triangular</th>
                </tr>
            </table>
        </section>
    
    
        <section id="Orejast">
            <br> <h2>Orejas por su tamaño:</h2><br>
            
                 <table>
                    <tr>
                        <th>Chica</th>
                        <th>Mediana</th>
                        <th>Grande</th>
                    </tr>
                </table>
        </section>
    
        <section id="Narizf">
            <br> <h2>Nariz por su forma:</h2><br>
           
                 <table>
                    <tr>
                        <th>Chata</th>
                        <th>Aguileña</th>
                        <th>Recta</th>
                    </tr>
                </table>
        </section>
    
        <section id="Boca">
            <br> <h2>Boca:</h2><br>
            
                 <table>
                    <tr>
                        <th>Chica</th>
                        <th>Mediana</th>
                        <th>Grande</th>
                    </tr>
                </table>
        </section>
    
        <section id="Labios">
            <br> <h2>Labios:</h2><br>
         
                 <table>
                    <tr>
                        <th>Delgados</th>
                        <th>Gruesos</th>
                        <th>Mixtos</th>
                    </tr>
                </table>
        </section>
    
        <section id="Dientes">
            <br> <h2>Dientes:</h2><br>
            
                    <table>
                        <tr>
                            <th>Ausencia</th>
                            <th>No ausencia</th>
                        </tr>
                    </table>
        </section>
    
        <section id="Bigote">
            <br> <h2>Bigote:</h2><br>
            
                 <table>
                    <tr>
                        <th>Lampiño</th>
                        <th>Poblado</th>
                        <th>Recortado</th>
                    </tr>
                </table>
        </section>
    
        <section id="morfologia">
            <br> <h2>Ubicación y descripción morfológica (caracteristicas, tatuajes):</h2><br>
            <div class="Morfologica">
                <div class="L"> <img src="{{ public_path("reportes/ficha_de_datos/CuerpoUNIXMejorado.png") }}"
                    width="500"
                    height="500"/> </div> 
                 </div><br>
        </section>
    
        <section id="contexto familiar">
            <h2>CONTEXTO FAMILIAR</h2>
    
        <table>
            <tr>
                <th>Estado conyugal</th>
                <th>¿Con qué personas vive?</th>
            </tr>
            <tr>
                <td>Soltero</td>
                <td>Sus papás y su hermano</td>
            </tr>
            <tr>
                <th>Datos de la última pareja sentimental conocida</th>
                <th>Hijas(os)</th>
            </tr>
            <tr>
                <td>No se le conocio</td>
                <td>Ninguno</td>
            </tr>
            <tr>
                <th>¿Quién es el integrante de su familia más cercano?</th>
                <th>¿Conoce si ha sufrido algún tipo de violencia por parte de algún integrante de la familia?</th>
            </tr>
            <tr>
                <td>Su hermano</td>
                <td>Ninguna</td>
            </tr>
        </table>
        </section>
    
        <section id="contexto economico-laboral">
            <h2>CONTEXTO ECONÓMICO-LABORAL</h2>
       
        <table>
            <tr>
                <th>¿Dónde trabaja o cuál es su medio de subsistencia?</th>
                <th>¿Sabe si le gusta su trabajo?</th>
            </tr>
            <tr>
                <td>En el tecnologico</td>
                <td>Si</td>
            </tr>
            <tr>
                <th>¿Ha manifestado la intensión de irse a trabajar fuera de la ciudad?</th>
                <th>¿Conoce si ha sufrido algún tipo de violencia por parte de algún integrante de su trabajo?</th>
            </tr>
            <tr>
                <td>Si</td>
                <td>se desconoce</td>
            </tr>
            <tr>
                <th>¿Sabe si tiene deudas?</th>
                <th></th>
            </tr>
            <tr>
                <td>Se desconoce</td>
                <td></td>
            </tr>
        </table>
        </section>
    
        <section id="contexto social">
            <h2>CONTEXTO SOCIAL</h2>
        
        <table>
            <tr>
                <th>¿Qué pasatiempos tiene?</th>
                <th>¿Pertenece a algún club u organización?¿Puede mencionar?</th>
            </tr>
            <tr>
                <td>practicar deportes, jugar videojuegos e ir al gym</td>
                <td>si, no me se el nombre</td>
            </tr>
            <tr>
                <th>¿Estudia?</th>
                <th>¿Puede mencionar sus amistades más cercanas?</th>
            </tr>
            <tr>
                <td>si</td>
                <td>No me se los nombres</td>
            </tr>
            <tr>
                <th>¿Ha manifestado tener amistades en otro Municipio o Estado?</th>
                <th>Correo electrónico, Nombre en sus Redes Sociales</th>
            </tr>
            <tr>
                <td>Si</td>
                <td>ismaelmg46@gmail.com, IsmaelMAGA, ismaelmaga_18</td>
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