<?php
			if (isset($_POST['Ambiente'])) {

				 $amb = $_POST['Ambiente'];

                  $classtd='';
                  echo "
                  
                  <h3> HORARIO DEL AMBIENTE <h4 style='color:#555'>" . $amb . "</h4></h3>
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
                  </tr><br><br><br><br><br><br>
               ";

                  $con = new mysqli("localhost", "root", "", "Sishorario");
                        if ($con->connect_error)
                         {
                            echo "Fallo al conectar a MySQL: (" . $con->connect_error . ") " . $con->connect_error;
                            exit();
                        }

                  $consulta="SELECT tblconfighorario.con_nombreambiente, con_canth, con_hinicio, con_intervalos, con_cantd, tbldisponibilidad.dis_lunes, dis_martes, dis_miercoles, dis_jueves, dis_viernes, dis_sabado,dis_domingo  FROM tblconfighorario, tbldisponibilidad WHERE tblconfighorario.con_nombreambiente like '%".$amb."%' and tbldisponibilidad.dis_nombreambiente LIKE '%".$amb."%' ";

                    if ($resultado = mysqli_query($con, $consulta))
                    {


                		 while ($fila=mysqli_fetch_array($resultado))
                		 {
                		 	    $CantidadHoras=$fila['con_canth'];
                		        $HoraInicio=$fila['con_hinicio'];
                		        $Intervalo=$fila['con_intervalos'];
                		       $cantidadDias=$fila['con_cantd'];
                		       $lunes=$fila['dis_lunes'];
                		       $martes=$fila['dis_martes'];
                		       $miercoles=$fila['dis_miercoles'];
                		       $jueves=$fila['dis_jueves'];
                		       $viernes=$fila['dis_viernes'];
                		       $sabado=$fila['dis_sabado'];
                		       $domingo=$fila['dis_domingo'];

		           		 }

		           	  $i=1;
                  $ii=1;

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
                     $paddin="";
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
                                  $id="viernes";
                                  $paddin="10px";

                                    if ($i==3) {
                                      $viernes=0;
                                       $paddin="0px";
                                    }
                               }

                               if($viernes==0)
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

                              if ($sabado =='0') {  $colorsabado="999"; }
                              else  { $colorsabado="eef";              }


                              if ($domingo =='0') {  $colordomingo="F1948A"; }
                              else  { $colordomingo="eef";              }
                        
                        echo "
                        
                        <div style='width:20%; background:#D0ECE7; float:left'>$i (
                       $HoraInicio - "; $horaFinal=date('H:i:s', strtotime($HoraInicio)+$Intervalo); echo $horaFinal;
                        echo ")</div>

                      

                       ";
                      
                           $HoraInicio=date('H:i:s', strtotime($HoraInicio)+$Intervalo);

                              $i=$i+1;
                           
 
                          }
                        
                          echo "";// fin ciclo mientras


                   }
                    ?> <script>
        $(document).ready(function() {

var dia = "";
var horainicial= "";

 $('.lol').click(function() { 
            $.blockUI({ message: $('#configHorario') }); 
   			dia= $('#viernes').attr("id");
			horainicial= $('#horainicio').attr("class");

				alert(dia);
      	alert(horainicial);
           setTimeout($.unblockUI, 3000000); 
         }); 


      $('#no').click(function() {
      

              $.unblockUI();
              return false;
          });

      });

       </script>
       <?php 
            }


			else
			{
				echo "<p>SELECCIONE UN AMBIENTE PARA VER EL HORARIO</p>";
			}
			?>
