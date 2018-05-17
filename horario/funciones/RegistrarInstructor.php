
<?php 
include 'conexion.php';
//recibir los datos para almacenarlos en varialbes
$nombre = $_REQUEST['Nombre'];
$nombre2 = $_REQUEST['Nombre2'];
$apellido = $_REQUEST['Apellido'];
$apellido2 = $_REQUEST['Apellido2'];
$tipodocumento =$_REQUEST['TipoDocumento'];
$nrodocumento =$_REQUEST['NroDocumento'];
$tipoinstructor =$_REQUEST['TipoInstructor'];
$genero =$_REQUEST['Genero'];
$direccion=$_REQUEST['Direccion'];
$telefono = $_REQUEST['Telefono'];
$profesion = $_REQUEST['Profesion'];	
$email = $_REQUEST['Email'];






//consulta para insertar datos
$sql = "INSERT INTO tblInstructores VALUES 
(0,'$nombre', '$nombre2', '$apellido', '$apellido2', '$tipodocumento', '$nrodocumento', '$tipoinstructor', '$genero', '$direccion', '$telefono', '$profesion', '$email')";
// ejecutar consulta 
$resultado = mysqli_query($conexion, $sql);
if (!$resultado){
        echo 'error al registrar';
         }
else {
    echo 'Registro exitoso!';

	$queryUsuario="INSERT INTO tblUsuarios VALUES (0, '$nrodocumento', '$nrodocumento', 2)";
	$resul=mysqli_query($conexion, $queryUsuario);

	$queryConfig="INSERT INTO tblConfigHorario VALUES(0, '$nrodocumento', 24, '00:00:00', '23:00:00', '01:00:00', 7)";
	$resulConfig=mysqli_query($conexion, $queryConfig);
	
	$queryDisponi="INSERT INTO tblDisponibilidad VALUES(0, '$nrodocumento', 0,0,0,0,0,0,0)";
	$resultDisponi=mysqli_query($conexion, $queryDisponi);
	
    
mysqli_close($conexion);
}


?>


