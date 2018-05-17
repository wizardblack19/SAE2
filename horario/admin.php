<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SIGHO</title>
      <link rel="stylesheet" href="css/styleprueba.css">

</head>


<body >
<?php
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

 

<main id="ContenedorCuerpo">
<nav class="nav-bar">
 
  <div class="nav-hold">
    <div class="nav-logo">
      <a href="index.html">SIGHO</a>
      <hr>
    </div>
    <div class="nav-menu" id="nav"> menú</div>
		<ul class="nav-items">
 			 <li><a href="Funciones/CerrarSesion.php"> (<?php echo $usuario; ?>) CerrarSesion</a></li>
 			      <li><a href="index.php"><img src="iconosImagenes/Centro.svg" width="16px" height="16px"> REGIONAL</a></li>
    	     <li><a href="index.php"><img src="iconosImagenes/Centro.svg" width="16px" height="16px"> CENTRO</a></li>
    	          <li><a href="index.php"><img src="iconosImagenes/Centro.svg" width="16px" height="16px"> SEDE</a></li>
    	           <li><a href="soyAprendiz.php"><img src="iconosImagenes/Aula.svg" width="16px" height="16px"> PROGRAMAS</a></li>
    	          <li> <a href="soyInstructor.php"><img src="iconosImagenes/fichas.svg"  width="16px" height="16px"> FICHAS</a></li>
      		 <li><a href="soyAprendiz.php"><img src="iconosImagenes/Aula.svg" width="16px" height="16px"> AMBIENTE</a></li> 	      
     	 <li><a href="registroinstructor.php"><img src="iconosImagenes/ipro.png" > INSTRUCTOR</a></li>
      <li><a href="soyAdmin.php"><img src="iconosImagenes/horario.png" > HORARIOS</a></li>
      		
    </ul>
  </div> 


</nav>
	

	<section> 
<table>

<tr>
  <td class="RowForm">
    <aside>

<form class="RegInstructor" method="POST" action="Funciones/RegistrarInstructor.php">
<div class="formIns"><br>
 <div><b>REGISTRAR INSTRUCTOR </b></div><br>
 <input type="text" name="Nombre" placeholder="Primer Nombre">
<input type="text" name="Nombre2" placeholder="Segundo Nombre"><br>
 <input type="text" name="Apellido" placeholder="Primer Apellido">
 <input type="text" name="Apellido2" placeholder="Segundo Apellido"><br>
 <SELECT type="select" name="TipoDocumento" >
    <OPTION value="">.::TIPO DOCUMENTO::.</OPTION>
     <OPTION value="CEDULA DE CIUDADANIA">CEDULA DE CIUDADANIA</OPTION>
    <OPTION value="CEDULA DE EXTRANJERIA">CEDULA DE EXTRANJERIA</OPTION>
    <OPTION value="TARJETA DE IDENTIDAD">TARJETA DE IDENTIDAD</OPTION>
    <OPTION value="OTRO">OTRO</OPTION>
 </SELECT>
 <input type="text" name="NroDocumento" placeholder="Nro Documento"><br>
  <SELECT type="select" name="TipoInstructor">
    <OPTION value="">.::TIPO INSTRUCTOR::.</OPTION>
    <OPTION value="FUERA DE SEDE">FUERA DE SEDE</OPTION>
    <OPTION value="DESPLAZADO">DESPLAZADO</OPTION>
    <OPTION value="ARTICULACION">ARTICULACION</OPTION>
 </SELECT>
 <input type="text" name="Genero" placeholder="Genero"><br>
 <input type="text" name="Direccion" placeholder="Direccion">
 <input type="text" name="Telefono" placeholder="Telefono"><br>
 <input type="text" name="Profesion" placeholder="Profesion">
 <input type="text" name="Email" placeholder="Email"><br>
 <button type="submit">REGISTRAR</button>
</div>
</form>

</aside>
</td>

</tr>

<tr>

<div id="lol">

<td class="RowTabla">
<center>
 <?php
 
 $conexion= new mysqli("localhost", "root", "", "Sishorario");
$Query ="SELECT * FROM tblInstructores ORDER BY idInstructor";
if ($Resultado=$conexion->query($Query)) {

	echo "
	<hr><h1><b>TABLA INSTRUCTORES</b></h1>";
echo "<table class='tablains'> 

<th> #</th>
<th> Nombre</th>

<th> Apellido</th>

<th> Tipo Doc</th>
<th># Doc</th>
<th> Tipo Ins</th>
<TH> Profesion </th>
<TH> Horario </th>
<TH> Perfil </th>
<TH> Otraaaaaaaaaaaa </th>

";

while ($fila=$Resultado->fetch_row()) {
	echo "
<tr>
<td>$fila[0]</td>
<td>$fila[1]</td>

<td>$fila[3]</td>

<td>$fila[5]</td>
<td>$fila[6]</td>
<td>$fila[7]</td>
<td>$fila[11]</td>
<td><center><a href=''><img src='iconosImagenes/ojo.png' widht='20px' height='20px'></a></center></td>
<td><center><a href=''><img src='iconosImagenes/ojo.png' widht='20px' height='20px'></a></center></td>
<td><center><a href=''><img src='iconosImagenes/ojo.png' widht='20px' height='20px'></a></center></td>
</tr>

	
";
}

}
echo "</table>";

 ?>
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
