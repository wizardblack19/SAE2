
<?php 
include 'conexion.php';
//recibir los datos para almacenarlos en varialbes
$regional = $_POST['Regional'];
$municipio = $_POST['Municipio'];
$centro = $_POST['Centro'];
$director = $_POST['Director'];
$nombre = $_POST['Nombre'];
$direccion = $_POST['Direccion'];
$telefono = $_POST['Telefono'];
$email = $_POST['Email'];






//consulta para insertar datos
$sql = "INSERT INTO tblSede VALUES (0, '$regional', '$municipio', '$centro', '$director', '$nombre', '$direccion', '$telefono', '$email')";
// ejecutar consulta 
$resultado = mysqli_query($conexion, $sql);
if (!$resultado){
        echo 'error al registrar';
         }
else {
    echo 'Registro exitoso!';
	
    header('location: ../sede1.php');
}

mysqli_close($conexion);

?>


