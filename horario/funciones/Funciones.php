<?php

function MostrarTablaHorario()
{
                  $docc=$_POST['documentoo'];
                  $classtd='';
                  echo "
                  <table class='tablains'>
                  <tr>
                  <th>#</th>
                  <th>Hora</th>
                  <th>Lunes</th>
                  <th>Martes</th>
                  <th>Miercoles</th>
                  <th>Jueves</th>
                  <th>Viernes'</th>
                 
                  <th>Sabado</th>
                  <th>Domingo</th>
                  </tr>";
               
                  $mysqli = new mysqli("localhost", "root", "", "Sishorario");
                        if ($mysqli->connect_error) {
                            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_error . ") " . $mysqli->connect_error;
                            exit();
                        }                       

                  $consulta="SELECT tblconfighorario.con_ins_documento, con_canth, con_hinicio, con_intervalos, con_cantd, tbldisponibilidad.dis_lunes, dis_martes, dis_miercoles, dis_jueves, dis_viernes, dis_sabado,dis_domingo  FROM tblconfighorario, tbldisponibilidad WHERE tblconfighorario.con_ins_documento = $docc and tbldisponibilidad.dis_ins_doc = $docc";

                    if ($resultado = $mysqli->query($consulta))
                    {


                      while ($fila = $resultado->fetch_row())
                      {
                        
                        $CantidadHoras=$fila[1];
                        $HoraInicio=$fila[2];
                        $Intervalo=$fila[3];
                       $cantidadDias=$fila[4];
                       $lunes=$fila[5];
                       $martes=$fila[6];
                       $miercoles=$fila[7];
                       $jueves=$fila[8];
                       $viernes=$fila[9];
                       $sabado=$fila[10];
                       $domingo=$fila[11];

                     }
                     $i=1;

                    $hora = $Intervalo;
                    list($horas, $minutos, $segundos) = explode(':', $hora);
                    $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
                    $Intervalo= $hora_en_segundos;



                    //VARIABLES DEL ALGORITMO DIA VIERNES
                      $canHoras=4;
                      $x=0;

                      $sincombinar=$CantidadHoras-$canHoras;
                       $ss=$sincombinar;
                      $cantidaddispo=0;
                      $viernes=1;
                    $contador=$CantidadHoras;

                          while ($i<=$CantidadHoras)
                           {  
                           

                              $classimg="";
                              $Contenido="PRIMERA COMPETENCIA <br> Crear e implementar el sistema segun los requisitos del cliente";
                              $classlbl="";
                              if ($lunes =='0') {  $colorlunes="ECF0F1"; }
                              else  { $colorlunes="eef";              }

                              
                              if ($martes =='0') {  $colormartes="ECF0F1"; }
                              else  { $colormartes="eef";              }

                          
                              if ($miercoles =='0') {  $colormiercoles="ECF0F1"; }
                              else  { $colormiercoles="eef";              }

                                 
                              if ($jueves =='0') {  $colorjueves="ECF0F1"; }
                              else  { $colorjueves="eef";              }

                             


                              if ($viernes ==1 ) /*Si la hora esta disponible*/
                               {  
                                  $colorviernes="ee1"; //color amarillo
                                  $classtd="";
                                  $classimg="blanco lol"; // clase de la imagen blanco
                                  $imageneditar="editar.svg"; //icono editar blanco
                                  $id="botono";

                               }

                               if($viernes==0)
                               {  if ($contador<=$sincombinar+1)
                                  {
                                    $classtd="";
                                    $canHoras=1;
                                    $classimg="verde lol";
                                    $imageneditar="editarverde.svg";//icono editar blanco
                                    $colorviernes="ECF0F1";
                                     $id="botonov";
                                     $editar="lol";
                                    $Contenido="";
                                  }
                                  else
                                  { $contador=$contador-1;
                                    $classtd="none";
                                  }
                                    
                               }

                           
                              
                               
                              if ($sabado =='0') {  $colorsabado="999"; }
                              else  { $colorsabado="eef";              }

                                  
                              if ($domingo =='0') {  $colordomingo="F1948A"; }
                              else  { $colordomingo="eef";              }
                     


                        echo "<tr>";
                        echo "<td style='width:12px; background:#D0ECE7'>$i</td><td style='font-size:8px; background:#D0ECE7'>$HoraInicio - "; $horaFinal=date('H:i:s', strtotime($HoraInicio)+$Intervalo); echo $horaFinal;  
                        
                         echo "</td>
                        <td  class='lunes' id='$i' style='background:#$colorlunes'>$lunes</td>
                        <td style='background:#$colormartes' id='martes'>$martes</td>
                        <td style='background:#$colormiercoles' id='miercoles'>$miercoles</td>
                        <td style='background:#$colorjueves' id='jueves'>$jueves</td>

                        <td rowspan='$canHoras'class='$classtd'style='background:#$colorviernes'id='viernes'>
                          <div>
                     
                          <p>$Contenido</p>
                           <img id='$id' class='$classimg' src='iconosImagenes/$imageneditar'> 
                           <img class='$classimg' title='Eliminar actividad' src='iconosImagenes/borrar.svg'> 
                          </div>
                        </td>

                        <td style='background:#$colorsabado' id='sabado'>$sabado</td>
                        <td style='background:#$colordomingo' id='domingo'>$domingo</td>

                         ";
                           $HoraInicio=date('H:i:s', strtotime($HoraInicio)+$Intervalo);   

                              echo "</tr> ";
                      
                              $i=$i+1;
                              $viernes=0;
                          
                          }
                                
     
                      $resultado->close();
                    }
                  $mysqli->close();

}
 

function MostrarTablaAmbientes()
{
   $conexion= new mysqli("localhost", "root", "", "Sishorario");
        $Query ="SELECT * FROM tblAmbientes ORDER BY idAmbiente";
        if ($Resultado=$conexion->query($Query)) {
        
          echo "
          <h1><b>TABLA AMBIENTES</b></h1>";
        echo "
        <table class='tablains'> 
        
            <th> #</th>
            <th>Regional</th>
            <th> Centro</th>
            <th> Sede</th>
            <th> Nombre</th>
            <TH> Capacidad </th>
            <TH> Tipo Ambiente </th>
            <TH> Ver </th>
            <TH> Editar </th>
            <TH> Eliminar </th>
        
        ";
        
        while ($fila=$Resultado->fetch_row()) {
          echo "
        <tr>
            <td>$fila[0]</td>
            <td>$fila[1]</td>
            
            <td>$fila[2]</td>
            
            <td>$fila[3]</td>
            <td>$fila[4]</td>
            <td>$fila[5]</td>
            <td>$fila[6]</td>
            <td><center>
              <form mthod='POST' action='HorarioInstructor.php'>
                <input type='hidden' name='documentoo' value='"; echo $fila[6]; echo"'>
                 <button type='submit' style='background:transparent;'>
                   <a href=''>
                    <img src='iconosImagenes/ojo.png' border='0' title='Ver Ambiente' width='20px' height='20px'>
                   </a>
                 </button>
              </form></center>
            </td>
            <td><center>
              <a href=''>   
               <img src='iconosImagenes/editarnegro.svg' border='0' title='Editar Ambiente' width='20px' height='20px'>
                </a>
              </center>
            </td>
            <td><center>
                <a href=''>
                   <img src='iconosImagenes/Basura.svg' border='0' title='Eliminar Ambiente' width='20px' height='20px'>
                </a>
            </td></center>  
            
            
        </tr> ";

        }
        
        }
        echo "
          </table> 

        <br><br><br><br><br><br>";
}

function MostrarTablaFichas()
{

        $conexion= new mysqli("localhost", "root", "", "Sishorario");
        $Query ="SELECT * FROM tblFichas ORDER BY idFicha";
        if ($Resultado=$conexion->query($Query))
        {
        
          echo "
          <h1><b>TABLA FICHAS</b></h1>";
        echo "
        <table class='tablains'> 
        
            <th> #</th>
            <th>Regional</th>
            <th> Centro</th>
            <th> Sede</th>
            <th> TipoFormacion</th>
            <TH> Programa </th>
            <TH> Instructor </th>
            <TH> Jornada </th>
            <TH> Vacantes </th>
            <TH> Inicio </th>
            <TH> Fin </th>
            <TH> Ver </th>
            <TH> Editar </th>
            <TH> Eliminar </th>

        
        ";
        
        while ($fila=$Resultado->fetch_row()) 
            {
                  echo "
                  <tr>
                    <td>$fila[0]</td>
                    <td>$fila[1]</td>
                    <td>$fila[2]</td>
                    <td>$fila[3]</td>
                    <td>$fila[4]</td>
                    <td>$fila[5]</td>
                    <td>$fila[6]</td>
                    <td>$fila[7]</td>
                    <td>$fila[8]</td>
                    <td>$fila[9]</td>
                    <td>$fila[10]</td>
                    <td><center>
                      <form mthod='POST' action='HorarioInstructor.php'>
                        <input type='hidden' name='documentoo' value='"; echo $fila[6]; echo"'>
                         <button type='submit' style='background:transparent;'>
                           <a href=''>
                            <img src='iconosImagenes/ojo.png' border='0' title='Ver Ambiente' width='20px' height='20px'>
                           </a>
                         </button>
                      </form></center>
                    </td>
                    <td><center>
                      <a href=''>   
                       <img src='iconosImagenes/editarnegro.svg' border='0' title='Editar Ambiente' width='20px' height='20px'>
                        </a>
                      </center>
                    </td>
                    <td><center>
                        <a href=''>
                           <img src='iconosImagenes/Basura.svg' border='0' title='Eliminar Ambiente' width='20px' height='20px'>
                        </a>
                    </td></center>  
                    
                    
                  </tr> ";
    
            }
        
          }
        echo "
          </table> 

        <br><br><br><br><br><br>";
}

function MostrarTablaProgramas()
{
   $conexion= new mysqli("localhost", "root", "", "Sishorario");
        $Query ="SELECT * FROM tblProgramas ORDER BY idPrograma";
        if ($Resultado=$conexion->query($Query))
        {
        
          echo "
          <h1><b>TABLA PROGRAMAS</b></h1>";
        echo "
        <table class='tablains'> 
        
            <th> #</th>
            <th>Regional</th>
            <th> Centro</th>
            <TH> Sede </th>
            <TH> Tipo Formacion </th>
            <th> Cod. Programa</th>
            <TH> Nombre </th>
            <TH> Cantidad</th>
            <TH> Presencial/Virtual </th>
            <TH> Ver </th>
            <TH> Editar </th>
            <TH> Eliminar </th>

        
        ";
        
        while ($fila=$Resultado->fetch_row()) 
            {
                  echo "
                  <tr>
                    <td>$fila[0]</td>
                    <td>$fila[1]</td>
                    <td>$fila[2]</td>
                    <td>$fila[3]</td>
                    <td>$fila[4]</td>
                    <td>$fila[5]</td>
                    <td>$fila[6]</td>
                    <td>$fila[7]</td>
                    <td>$fila[8]</td>
                    <td><center>
                      <form mthod='POST' action='HorarioInstructor.php'>
                        <input type='hidden' name='documentoo' value='"; echo $fila[6]; echo"'>
                         <button type='submit' style='background:transparent;'>
                           <a href=''>
                            <img src='iconosImagenes/ojo.png' border='0' title='Ver Ambiente' width='20px' height='20px'>
                           </a>
                         </button>
                      </form></center>
                    </td>
                    <td><center>
                      <a href=''>   
                       <img src='iconosImagenes/editarnegro.svg' border='0' title='Editar Ambiente' width='20px' height='20px'>
                        </a>
                      </center>
                    </td>
                    <td><center>
                        <a href=''>
                           <img src='iconosImagenes/Basura.svg' border='0' title='Eliminar Ambiente' width='20px' height='20px'>
                        </a>
                    </td></center>  
                    
                    
                  </tr> ";
    
            }
        
          }
        echo "
          </table> 

        <br><br><br><br><br><br>";
        
}

function MostrarTablaInstructores()
{

 
 $conexion= new mysqli("localhost", "root", "", "Sishorario");
    $Query ="SELECT * FROM tblInstructores ORDER BY idInstructor";
    if ($Resultado=$conexion->query($Query)) {

  echo "
  <h1><b>TABLA INSTRUCTORES</b></h1>";
    echo "<table class='tablains'> 
    
    <th> #</th>
    
    
    <th> Tipo Doc</th>
    <th> Numero</th>
    <th> Nombres</th>
    
    <th> Apellidos</th>
    <th> Tipo Ins</th>
    <TH> Profesion </th>
    <TH> Horario </th>
    <TH> Perfil </th>
    <TH> Eliminar </th>
    
    ";
    
    while ($fila=$Resultado->fetch_row()) {
      echo "
    <tr>
    <td>$fila[0]</td>
    <td>$fila[5]</td>
    <td>$fila[6]</td>
    <td>$fila[1] $fila[2]</td>
    
    <td>$fila[3] $fila[4]</td>
    
    
    <td>$fila[7]</td>
    <td>$fila[11]</td>
    <center>
    <td>
      
      <form method='POST' action='Horario1.php'><input type='hidden' name='documentoo' value='"; echo $fila[6]; echo"'>
        <button type='submit' style='background:transparent;'>
          <a href=''>
             <img src='iconosImagenes/ojo.png' border='0' title='Ver Horario Instructor' widht='20px' height='20px'>
          </a>
        </button>
      </form>
    
    </td>
    <td>
      
      <form method='POST' action='Horario1.php'><input type='hidden' name='documentoo' value='"; echo $fila[6]; echo"'>
        <button type='submit' style='background:transparent;'>
          <a href=''>
             <img src='iconosImagenes/editarnegro.svg' border='0' title='Editar Instructor' widht='20px' height='20px'>
          </a>
        </button>
      </form>
    
    </td><td>
      
      <form method='POST' action='Funciones/EliminarInstructor.php'><input type='hidden' name='documentoo' value='"; echo $fila[6]; echo"'>
        <button type='submit' style='background:transparent;'>
          <a href=''>
             <img src='iconosImagenes/basura.svg' border='0' title='Eliminar Instructor' widht='20px' height='20px'>
          </a>
        </button>
      </form>
    
    </td>
    </center>
    </tr>
    </tr>
    
      
    ";
    }
    
    }
    echo "</table> 
    <br><br><br><br><br><br>";
    
    
    }
?>