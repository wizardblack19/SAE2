
<?php 
include 'conexion.php';
//recibir los datos para almacenarlos en varialbes
$regional = $_POST['Regional'];
$centro = $_POST['Centro'];
$sede = $_POST['Sede'];
$nombre = $_POST['Nombre'];
$tipoa = $_POST['TipoAmbiente'];
$capacidad = $_POST['Capacidad'];






//consulta para insertar datos
$sql = "INSERT INTO tblAmbientes VALUES (0, '$regional', '$centro', '$sede', '$nombre', '$capacidad', '$tipoa')";
// ejecutar consulta 
$resultado = mysqli_query($conexion, $sql);
	

if (!$resultado){
        echo 'error al registrar';
         }
else {
    echo 'Registro exitoso!';

	$queryConfig="INSERT INTO tblConfigHorario VALUES(0, '$nombre', 24, '00:00:00', '23:00:00', '01:00:00', 7)";
	$resulConfig=mysqli_query($conexion, $queryConfig);

	$queryDisponi="INSERT INTO tblDisponibilidad VALUES(0, '$nombre', 0,0,0,0,0,0,0)";
	$resultDisponi=mysqli_query($conexion, $queryDisponi);

    header('location: ../ambientes1.php');
}

mysqli_close($conexion);

?>


