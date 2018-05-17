<?php
$conexion=new mysqli("localhost", "root", "", "sishorario");

$regional = $_GET['regional'];
$municipio = $_GET['municipio'];
$centro = $_GET['centro'];
$director = $_GET['director'];
$nombre = $_GET['nombre'];
$direccion = $_GET['direccion'];
$telefono = $_GET['telefono'];
$email = $_GET['email'];






//consulta para insertar datos
$sql = "INSERT INTO tblSede VALUES (0, '$regional', '$municipio', '$centro', '$director', '$nombre', '$direccion', '$telefono', '$email')";
// ejecutar consulta 
if(mysqli_query($conexion, $sql)){
    return true;
}
return false;
mysqli_close($conexion);

?>
