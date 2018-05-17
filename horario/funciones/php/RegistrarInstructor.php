<?php
$conexion=new mysqli("localhost", "root", "", "sishorario");

$nombre=$_GET['nombre'];
$nombre2=$_GET['nombre2'];
$apellido=$_GET['apellido'];
$apellido2=$_GET['apellido2'];
$tipodoc=$_GET['tipodocumento'];
$documento=$_GET['nrodocumento'];
$tipoins=$_GET['tipoinstructor'];
$genero=$_GET['genero'];
$direccion=$_GET['direccion'];
$telefono=$_GET['telefono'];
$profesion=$_GET['profesion'];
$email=$_GET['email'];


//consulta para insertar datos
$sql = "INSERT INTO tblInstructores VALUES (0, '$nombre', '$nombre2', '$apellido', '$apellido2', '$tipodoc', '$documento', '$tipoins', '$genero', '$direccion','$telefono', '$profesion', '$email')";
// ejecutar consulta 
if(mysqli_query($conexion, $sql)){


	    $clave='d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db';
	$queryUsuario="INSERT INTO tblUsuarios VALUES (0, '$documento', '$clave', 2)";
	mysqli_query($conexion, $queryUsuario);
	
	return true;
	
	


}
return false;
mysqli_close($conexion);

?>
