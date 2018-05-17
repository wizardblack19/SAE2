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
	 			       <center>
	 			         <div class="buscar">

	 			     		  <input type="text ">
	 			      		  <button>
	 			      				  <img src="IconosImagenes/buscar.svg" style="width:70%;">
	 			       		 </button>
	 			         </div>
	 			       </center>
				 	   <hr>
				   </div>
			 	   <div class="nav-menu" id="nav"> menú</div>
				   <ul class="nav-items">
             <li style="background:#238276;"><a href="Regional1.php"><img src="iconosImagenes/regional.svg" width="16px" height="16px"> Regional	</a> </li>
               <li ><a href="Centro1.php"><img src="iconosImagenes/Centro.svg" width="16px" height="16px"> Centro</a></li>
               <li><a href="Sede1.php"><img src="iconosImagenes/sede.svg" width="16px" height="16px"> Sede</a></li>
               <li><a href="Programas1.php"><img src="iconosImagenes/Aula.svg" width="16px" height="16px"> Programas</a></li>
               <li> <a href="Fichas1.php"><img src="iconosImagenes/fichas.svg"  width="16px" height="16px"> Fichas</a></li>
               <li><a href="Ambientes1.php"><img src="iconosImagenes/Aula.svg" width="16px" height="16px"> Ambientes</a></li>
               <li><a href="Instructor1.php"><img src="iconosImagenes/ipro.png" > Instructores</a></li>
             <li ><a href="Horario1.php"><img src="iconosImagenes/Centro.svg" width="16px" height="16px"> Horarios</a></li>
			 	   </ul>
			</div>


	 </aside>

	 <article>
	 		<section id="section">

				<?php

				include 'CamposRegional.php';

				 ?>

		    </section>

	    	<section>
				<center>
				<div class="tabla_regional">
				 <?php
				 include 'funciones/MostrarTablaRegional.php';

				 ?>
				 </div>
				</center>

	    </section>
  </article>

</main> </center>




 <script src="js/regional1.js"></script>
    <div class="footer"><center>Laboratorio ADSI - 1193938, Malambo © 2017</center>
    </div>

</body>

<?php
 }

 		else
 		{
 		 header("location:soiadmin.php");
 		}
?>

</html>
