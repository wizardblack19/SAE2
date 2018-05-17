
<?php 
include 'conexion.php';
//recibir los datos para almacenarlos en varialbes
$regional = $_POST['Regional'];
$municipio = $_POST['Municipio'];
$centro = $_POST['Centro'];
$sede = $_POST['Sede'];
$tipof = $_POST['TipoFormacion'];
$codigo = $_POST['Codigo'];
$nombre = $_POST['Nombre'];
$Cant = $_POST['Cantidad'];






//consulta para insertar datos
$sql = "INSERT INTO tblProgramas VALUES (0, '$regional', '$municipio', '$centro', '$sede', '$tipof', '$codigo', '$nombre', '$Cant')";
// ejecutar consulta 
$resultado = mysqli_query($conexion, $sql);
mysqli_close($conexion);

?>


