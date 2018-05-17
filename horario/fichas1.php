<!DOCTYPE html>
<html >
<head>
<style>	</style>
  <meta charset="UTF-8">
  <title>SIGHO</title>
          <link rel="stylesheet" href="css/styleprueba1.css">
  <link rel="stylesheet" href="css/alertify.core.css"/>
	<link rel="stylesheet" href="css/alertify.default.css"/>
	<script src="js/alertify.js"></script>
	<script src="js/jquery.js"></script>



<script src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("jquery", "1.2", {uncompressed:true});
</script>
</head>



<?php

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
 			<h3>  <b>SISTEMA DE GESTION DE HORARIOS</b>		</h3>
 			<h4>  <b>SIGHO 						   </b> 	</h4>
		</td>

		<td class="iD">
			<div>
 				<img src="iconosImagenes/iconoSigho.png" width="28%" height="20%">
 		   </div>
 		</td>

	</tr>

 </table>
 <br>	 </center>

</header>

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
	 			       <center> <div class="buscar">
	 			       <input type="text">
	 			       <button>
	 			       <img src="IconosImagenes/buscar.svg" style="width:70%;">
	 			       </button>
	 			       </div>
	 			       </center>
					   <hr>
			 	</div>
			 	<div class="nav-menu" id="nav"> menú</div>
						<ul class="nav-items">

							<li><a href="Regional1.php"><img src="iconosImagenes/regional.svg" width="16px" height="16px"> Regional	</a> </li>
								<li ><a href="Centro1.php"><img src="iconosImagenes/Centro.svg" width="16px" height="16px"> Centro</a></li>
								<li><a href="Sede1.php"><img src="iconosImagenes/sede.svg" width="16px" height="16px"> Sede</a></li>
								<li><a href="Programas1.php"><img src="iconosImagenes/Aula.svg" width="16px" height="16px"> Programas</a></li>
								<li style="background:#238276;"> <a href="Fichas1.php"><img src="iconosImagenes/fichas.svg"  width="16px" height="16px"> Fichas</a></li>
								<li><a href="Ambientes1.php"><img src="iconosImagenes/Aula.svg" width="16px" height="16px"> Ambientes</a></li>
								<li><a href="Instructor1.php"><img src="iconosImagenes/ipro.png" > Instructores</a></li>
							<li ><a href="Horario1.php"><img src="iconosImagenes/Centro.svg" width="16px" height="16px"> Horarios</a></li>

			 		</ul>
			</div>


	 </aside>

	 <article>
	 		<section>


				<form class="form_fichas" method="POST">
					<div class="formIns"><br>
						<div><b>REGISTRAR FICHA</b></div><br>

 							<SELECT type="select" class="Regional" id="Regional" name="Regional" required>
 							   <OPTION value="" >.::Regional::.</OPTION>
 							  	<?php
 										$con = new Mysqli("localhost", "root", "", "sishorario");
 										$sql="SELECT * FROM tblRegional ORDER BY idRegional";
 										$proceso = mysqli_query($con, $sql);

 										while ($regional =mysqli_fetch_object($proceso)) {
 											?>
 											<option value="<?php echo $regional->reg_departamento ?> ">Regional <?php echo $regional->reg_nombre ?> </option>
											<?php
 										}
 									?>
 							</SELECT>

				 			 <SELECT type="select" id="Municipio" name="Municipio" required>
				 				   <OPTION value="">.::MUNICIPIO::.</OPTION>

				 			</SELECT>
							<SELECT type="select" id="Centro" class="Centro" name="Centro" required>
				 				   <OPTION value="">.::CENTRO::.</OPTION>

				 			</SELECT>
				 			<SELECT type="select" class="Sede" id="Sede" name="Sede" required>
				 				   <OPTION value="">.::SEDE::.</OPTION>

				 				</SELECT>
				 				<SELECT type="select" id="Programa" class="Programa" name="Programa" required>
				 			   <OPTION value="2">.::Programa::.</OPTION>

				 			</SELECT>
							<SELECT type="select" class="Jornada" id="Jornada" name="Jornada" required>
 				  				   <OPTION value="">.::JORNADA::.</OPTION>
 				  				   <OPTION value="Tecnico">Matutina</OPTION>
 				  				   <OPTION value="Tecnologo">Vespertina</OPTION>
 				  				   <OPTION value="Complementario">Nocturna</OPTION>
 								</SELECT>
 								<SELECT type="select" class="TipoPresencia" id="TipoPresencia" name="TipoPresencia" required>
 				  				   <OPTION value="">.::PRESENCIAL/VIRTUAL::.</OPTION>
 				  				   <OPTION value="Tecnico">Presencial</OPTION>
 				  				   <OPTION value="Tecnologo">Virtual</OPTION>
 				  				</SELECT>
 								<SELECT type="select" class="Instructor" id="Instructor" name="Instructor" required>
 				  				   <OPTION value="fff">.::SELECCIONAR INSTRUCTOR::.</OPTION>
 				  				   	<?php
 										$con = new Mysqli("localhost", "root", "", "sishorario");
 										$sql="SELECT * FROM tblInstructores ORDER BY idInstructor";
 										$proceso = mysqli_query($con, $sql);

 										while ($ins =mysqli_fetch_object($proceso)) {
 											?>
 											<option value="<?php echo $ins->ins_nrodocumento ?> "><?php echo $ins->ins_nombre,' ', $ins->ins_apellido ?> </option>
											<?php
 										}
 									?>
 								</SELECT>
				 			<input type="text" class="NroFicha" id="NroFicha" placeholder="Numero de Ficha">

				 			 <input type="number" min="1" max="40" class="Cantidad" id="Cantidad" name="Cantidad" placeholder="Cantidad Aprendicez" required>
				 			 <input type="date" class="FechaInicio" id="FechaInicio" name="FechaInicio" placeholder="Fecha Inicio" required>
				 			 <input type="date" class="FechaFin" id="FechaFin" name="FechaFin" placeholder="Fecha Fin" required>

							<div class="agregarficha" style="cursor:pointer;">REGISTRAR  FICHA</div>

					</div><br>
				</form>
		    </section>

	    	<section>
	    	<div class="tabla_fichas">
				<center>

				 <?php
				include 'funciones/mostrarTablaFichas.php';

				 ?>
				</center>
			</div>
	    </section>
  </article>

</main> </center>


    <script src="js/fichas1.js"></script>
    <div class="footer"><center>Laboratorio ADSI - 1193938, Malambo © 2017</center>
    </div>

</body>

<?php
 }

 		else
 		{
 		 header("location:index.php");
 		}
?>

</html>
