<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SIGHO</title>
      <link rel="stylesheet" href="css/styleprueba1.css">

	  <link rel="stylesheet" href="css/alertify.core.css"/>
	<link rel="stylesheet" href="css/alertify.default.css"/>
	<script src="js/alertify.js"></script>
	<script src="js/jquery.js"></script>
</head>



<?php
include 'Funciones/Funciones.php';
 session_start();
 if (! empty($_SESSION["usu_usuario"])) {
 	$usuario=$_SESSION['usu_usuario'];
?>
<center>
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


<br>
 </header>
</center>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<nav class="navMenu">
 <label><b> (<?php echo $usuario; ?>)</label> <a href="Funciones/CerrarSesion.php"><button> CERRAR SESION </button> </b></a>
</nav>



 <body>
 <center>
 <main style="">
	 <aside>

	 			<div class="nav-hold">
	 			   <div class="nav-logo">
	 			       <center> <div class="buscar"><input><button><img src="IconosImagenes/buscar.svg" style="width:70%;"></button></div></center>

			 			  	   <hr>
			 	</div>
			 	<div class="nav-menu" id="nav"> menú</div>
						<ul class="nav-items">

              <li><a href="Regional1.php"><img src="iconosImagenes/regional.svg" width="16px" height="16px"> Regional	</a> </li>
			 		   	  <li><a href="Centro1.php"><img src="iconosImagenes/Centro.svg" width="16px" height="16px"> Centro</a></li>
			 		   	  <li><a href="Sede1.php"><img src="iconosImagenes/sede.svg" width="16px" height="16px"> Sede</a></li>
			 		   	  <li><a href="Programas1.php"><img src="iconosImagenes/Aula.svg" width="16px" height="16px"> Programas</a></li>
			 		   	  <li> <a href="Fichas1.php"><img src="iconosImagenes/fichas.svg"  width="16px" height="16px"> Fichas</a></li>
			 		      <li><a href="Ambientes1.php"><img src="iconosImagenes/Aula.svg" width="16px" height="16px"> Ambientes</a></li>
			 		      <li style="background:#238276;"><a href="Instructor1.php"><img src="iconosImagenes/ipro.png" > Instructores</a></li>
							<li ><a href="Horario1.php"><img src="iconosImagenes/Centro.svg" width="16px" height="16px"> Horarios</a></li>
			 		</ul>
			</div>


	 </aside>

	 <article>
	 		<section>


				<form id="form_conte" class="RegInstructor" method="POST">
					<div class="formIns"><br>
						 <div><b>REGISTRAR INSTRUCTOR </b>
				 		 </div><br>
				 		<input type="text" name="Nombre" class="Nombre" placeholder="Primer Nombre">
						<input type="text" name="Nombre2" class="Nombre2" placeholder="Segundo Nombre"><br>
				 		<input type="text" name="Apellido" class="Apellido" placeholder="Primer Apellido">
				 			<input type="text" name="Apellido2" class="Apellido2" placeholder="Segundo Apellido"><br>
				 		<SELECT type="select" name="TipoDocumento" class="TipoDocumento" >
				 		   <OPTION value="">.::TIPO DOCUMENTO::.</OPTION>
				 		    <OPTION value="C.C">CEDULA DE CIUDADANIA</OPTION>
				 		   <OPTION value="C.E">CEDULA DE EXTRANJERIA</OPTION>
				 		   <OPTION value="T.I">TARJETA DE IDENTIDAD</OPTION>
				 		   <OPTION value="OTRO">OTRO</OPTION>
				 		</SELECT>
				 		<input type="text" name="NroDocumento" class="NroDocumento" placeholder="Nro Documento"><br>
				 		 <SELECT type="select" name="TipoInstructor" class="TipoInstructor">
				 		   <OPTION value="">.::TIPO INSTRUCTOR::.</OPTION>
				 		   <OPTION value="Fuera de sede">FUERA DE SEDE</OPTION>
				 		   <OPTION value="Desplazado">DESPLAZADO</OPTION>
				 		   <OPTION value="Articulacion">ARTICULACION</OPTION>
				 		</SELECT>
				 		<input type="text" name="Genero" class="Genero" placeholder="Genero"><br>
				 		<input type="text" name="Direccion" class="Direccion" placeholder="Direccion">
				 		<input type="text" name="Telefono" class="Telefono" placeholder="Telefono"><br>
				 		<input type="text" name="Profesion" class="Profesion" placeholder="Profesion">
				 		<input type="text" name="Email" class="Email" placeholder="Email"><br>
				 		<div  class="agregar" >REGISTRAR</div>
					</div><br>
				</form>
		</section>

		<section>
			<center>
			<div class="tabla_ajax"
			<?php
			include 'funciones/MostrarTablaInstructores.php';

			?>
			</center>
			</div>
		</section>

   </article>
</main>

</center>

    <div class="footer"><center>Laboratorio ADSI - 1193938, Malambo © 2017</center></div>
<script src="js/instructor1.js"></script>
</body>

<?php
 }else{




  header("location:index.php");


 }
?>

</html>
