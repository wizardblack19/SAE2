<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SIGHO</title>
      <link rel="stylesheet" href="css/stylepruebainstructor.css">
<style type="text/css">
  
.RowTabla td
{
  width: 4%;

}


.btn
{

  background: #fff;
  border: 0px solid;
  border-left: 1.3px #fff solid;
  padding: 4px 4px 4px 7px;
  font-size: 150%;
  color: #238276 ;
  cursor: pointer;
position: relative;
left: 50%;
width: 32%;
float: left;
}
.btn:hover
{

  background: #ddd;
  border: 0px solid;
  border-left: 1.3px #fff solid;
  padding: 4px 4px 4px 7px;
  font-size: 150%;
  color: #238276 ;
  cursor: pointer;
position: relative;
left: 50%;
width: 30%;
float: left;
border-radius: 10px;
}



</style>
</head>


<body >
<?php

$docc=$_POST['documentoo'];
 session_start();
 if (! empty($_SESSION["usu_usuario"])) {
 	$usuario=$_SESSION['usu_usuario'];
 	
?>
 <header>
  <table>
		<tr>
	 	 <td class="tdImagen">
	 	 <div>
 				<img src="iconosImagenes/logoSena.png" width="70%" height="70%">
 				</div>
		 </td>
	    <td class="tdLetras">
 				<h3><b>SISTEMA DE GESTION DE HORARIOS</b></h3>
 				   <h4><b>SIGHO</b></h4>
		 </td>
	<td class="iD"> 
		<div>
 		<img src="iconosImagenes/iconoSigho.png" width="28%" height="20%">
 		</div>	

 	</td>
		</tr>

  </table>
 				
   
<hr>
 </header>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<nav class="navMenu">
 <label><b> (<?php echo $usuario; ?>)</label> <a href="Funciones/CerrarSesion.php"><button> Cerrar Sesion </button> </b></a>
</nav>

<main id="ContenedorCuerpo">
<nav class="nav-bar">
 
  <div class="nav-hold">
    <div class="nav-logo">
        <center> <div class="buscar"><input><button><img src="IconosImagenes/buscar.svg" style="width:70%;"></button></div></center>

      <hr>
    </div>
    <div class="nav-menu" id="nav"> menú</div>
		<ul class="nav-items">
 
 			      <li><a href="MenuRegional.php"><img src="iconosImagenes/Centro.svg" width="16px" height="16px"> Ver perfil</a></li>
    	    
      <li style="background:#F36D22;"><a href="HorarioInstructor.php"><img src="iconosImagenes/horario.png" > Horarios</a></li>
      		
    </ul>
  </div> 


</nav>
	

	<section> 
<table>



<tr>

<div id="lol">

<td class="RowTabla">
<center><form method="POST" action="ConfigHorario.php">
<a href="#"><label style="float:left; left:10%; position:relative;">Instructor ID # <b><?php echo $docc; ?></b></label> <input type="hidden" name="documentoo" value="<?php echo $docc; ?> "> <button type="submit" class="btn"><img src="iconosImagenes/configuracion.svg" width="6%" > <b>Configurar Horario</b></button></a> <br><br>
<table class="tablains" >
 
 
<tr >
                  <th>#</th><th>Hora</th><th>Lunes</th><th>Martes</th><th>Miercoles</th><th>Jueves</th><th>Viernes</th><th>Sabado</th><th>Domingo</th>
                  </tr>

                  <?php
                  $mysqli = new mysqli("localhost", "root", "", "Sishorario");
                        if ($mysqli->connect_error) {
                            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_error . ") " . $mysqli->connect_error;
                            exit();
                        }

                       
                        

                  $consulta= "SELECT * FROM Tblconfighorario where con_ins_documento= $docc";
                    if ($resultado = $mysqli->query($consulta))
                    {


                      while ($fila = $resultado->fetch_row())
                      {
                        
                        $CantidadHoras=$fila[2];
                        $HoraInicio=$fila[3];
                        $Intervalo=$fila[5];
                        $HoraFin=$fila[4];

                     }
                     $i=1;

                    $hora = $Intervalo;
                    list($horas, $minutos, $segundos) = explode(':', $hora);
                    $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
                    $Intervalo= $hora_en_segundos;



                          while ($i<=$CantidadHoras)
                           { 

                              
                                 
                              
                        echo "<tr>";
                        echo "<td>$i</td><td>$HoraInicio - "; $horaFinal=date('H:i:s', strtotime($HoraInicio)+$Intervalo); echo $horaFinal;  
                        
                         echo "</td>
                        <td id='lunes'></td><td id='martes'></td><td id='miercoles'></td><td id='jueves'></td><td id='viernes'></td><td id='sabado'></td><td id='domingo'></td>

                        ";
                           $HoraInicio=date('H:i:s', strtotime($HoraInicio)+$Intervalo);   

                        echo "</tr> ";
                      
                              $i=$i+1;
                          
                          }
             
                      $resultado->close();
                    }
                  $mysqli->close();
                  ?>


</table>
<br>
<br><br><br><br><br><br><br><br>    <br><br>
</table>    
</center>
</td>
</div>


</tr>

	</section>



</main>



  
    <script src="js/index.js"></script>
    <div class="footer"><center>Laboratorio ADSI - 1193938, Malambo © 2017</center></div>
</body>

<?php
 }else{




  header("location:index.php");


 }
?>

</html>
