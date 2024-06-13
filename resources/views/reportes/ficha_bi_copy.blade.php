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
        <br><h2>Cabello:</h2>
       
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
            <br> <h2>Vello facial:</p>
            
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
            <br> <h2>Nariz:</h2><br>
            
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
    
        <section id="Fcara">
            <br><h2>Media filiacion complementaria</h2>
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
                <th>¿Tiene  algún tratamiento dental?</th>
                <th>Especifique el tratamiento dental:</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
        </section>
       
        <section id="Tceja">
            <br><h2>Proyeccion del menton</h2>
        <table>
            <tr>
                <th>Tipo de mentón:</th>
                <th>Cualquier otra especificacion del menton</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
        </section>
    
        <section id="Mcejas">
            <br> <h2>Deformaciones</h2><br>
            
                 <table>
                    <tr>
                        <th>Región de la deformación:</th>
                        <th>Especificacion de la deformacion:</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
        </section>
    
        <section id="Orejasf">
            <br> <h2>Interveciones quirurgicas</h2><br>
            
            <table>
                <tr>
                    <th>Intervencion quirurgica</th>
                    <th>Especificacion de la intervencion quirurjica:</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </section>
    
    
        <section id="Orejast">
            <br> <h2>Enfermedades de la piel</h2><br>
            
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
    
        <section id="Narizf">
            <br> <h2>Observaciones generales</h2><br>
           
                 <table>
                    <tr>
                        <td></td>
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
                <td>Se desconoce</td>
                <th></th>
                <td></td>
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