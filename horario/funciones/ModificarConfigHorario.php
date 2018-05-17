
<?php 
include 'conexion.php';
//recibir los datos para almacenarlos en varialbes
$canth=$_POST['CantidadHoras'];
$hinicio=$_POST['HoraInicio'];
$intervalo=$_POST['Intervalo'];
//$usuario=$_POST['id'];
$docc=$_POST['documentoo'];




//consulta para insertar datos
$sql = "UPDATE tblConfigHorario SET con_canth='$canth', con_hinicio='$hinicio', con_intervalos='$intervalo' WHERE con_ins_documento='$docc' ";

// ejecutar consulta 
$resultado = mysqli_query($conexion, $sql);
if (!$resultado){
        echo 'error al registrar';
         }
else {
    echo '*';
	?>
	<!DOCTYPE html>
	 <html>
	 <head>
	 	<title></title>
	 	<style type="text/css"> 
	 	div
	 	{	position:absolute;
	 		background:#eee;
	 		width:50%;
	 		height:30%;
	 		left:30%;
	 	}	
	 	</style>
	 </head>
	 <body><center>
	 <div><form  method='POST' action ='../Horario1.php'>
	<input type='hidden' value='<?php echo $docc;?>' name='documentoo'>
	<h1>¡HORARIO CONFIGURADO CORRECTAMENTE!</h1><button type='submit' value='REGRESAR'> REGRESAR
	</button> </form> </div>
	</center> </body>
	 </html>
	
  <!-- header('location: ../HorarioInstructor.php');-->
  <?php
}

mysqli_close($conexion);

?>


