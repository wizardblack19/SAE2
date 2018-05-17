
<?php 
include 'conexion.php';
//recibir los datos para almacenarlos en varialbes
$regional = $_REQUEST['Regional'];
$municipio = $_REQUEST['Municipio'];
$codigo = $_REQUEST['Codigo'];
$director = $_REQUEST['Director'];
$nombre = $_REQUEST['Nombre'];
$direccion = $_REQUEST['Direccion'];
$telefono = $_REQUEST['Telefono'];
$email = $_REQUEST['Email'];






//consulta para insertar datos
$sql = "INSERT INTO tblCentro VALUES (0, '$regional', '$municipio', '$codigo', '$director', '$nombre', '$direccion', '$telefono', '$email')";
// ejecutar consulta 
$resultado = mysqli_query($conexion, $sql);

mysqli_close($conexion);

?>


