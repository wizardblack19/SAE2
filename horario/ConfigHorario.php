<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SIGHO</title>
      <link rel="stylesheet" href="css/stylepruebainstructor.css">
<style type="text/css">
  
.RowTabla td
{
  width: 40%;
border: #ddd     0.8px solid;
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
 <b>
 			      <li><a href="HorarioInstructor.php"><img src="iconosImagenes/Centro.svg" width="16px" height="16px"> Ver Perfil</a></li>
    	      <li style="background:#F76D2F;"><a href="HorarioInstructor.php"><img src="iconosImagenes/horario.png" > Horarios</a></li>
      		</b>
    </ul>
  </div> 


</nav>
	

	<section> 
  <img src="iconosimagenes/fondo1.png" style=" width:60%; height:50%; left:22%; position:fixed">
<table class="tablaHorario" >

<tr>
  <td class="RowForm">
    <aside>
<form class="RegInstructor" method="POST" action="Funciones/ModificarConfigHorario.php">
<div style="text-align:left" class="formIns"><br>
 <div> <b>  	CONFIGURAR HORARIO DE: <?php echo $docc; ?> </b></div> <hr><br>


<label>Cantidad de horas </label> <br><input name="CantidadHoras" type="number" value="1" min="1" max="24" step="1"> <br>
<label>Hora de inicio </label> <br>
<select name="HoraInicio">
<OPTION value='00:30:00'>00:30:00</OPTION>
<OPTION value='01:00:00'>01:00:00</OPTION>
<OPTION value='01:30:00'>01:30:00</OPTION>
<OPTION value='02:00:00'>02:00:00</OPTION>
<OPTION value='02:30:00'>02:30:00</OPTION>
<OPTION value='03:00:00'>03:00:00</OPTION>
<OPTION value='03:30:00'>03:30:00</OPTION>
<OPTION value='04:00:00'>04:00:00</OPTION>
<OPTION value='04:30:00' >04:30:00</OPTION>
<OPTION value='05:00:00'>05:00:00</OPTION>
<OPTION value='05:30:00'>05:30:00</OPTION>
<OPTION value='06:00:00'>06:00:00</OPTION>
<OPTION value='06:30:00'>06:30:00</OPTION>
<OPTION value='07:00:00'>07:00:00</OPTION>
<OPTION value='07:30:00'>07:30:00</OPTION>
<OPTION value='08:00:00'>08:00:00</OPTION>
<OPTION value='08:30:00'>08:30:00</OPTION>
<OPTION value='09:00:00'>09:00:00</OPTION>

</select><br>

 <label>Intervalo de horas</label><br>
 <select name="Intervalo">
<OPTION value='00:15:00'>00:15:00</OPTION>
<OPTION value='00:30:00'>00:30:00</OPTION>
<OPTION value='00:45:00'>00:45:00</OPTION>
<OPTION value='01:00:00'>01:00:00</OPTION>

</select><br>
  <input type="hidden" name="documentoo" value="<?php echo $docc ?>">
 <button type="submit">REGISTRAR</button>
</div>

</form>

</aside>
</td>

</tr>

</table><br>
<br><br><br><br><br><br><br><br>
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
