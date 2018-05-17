<?php



$conexion=new mysqli("localhost", "root", "", "sishorario");

$regional = $_GET['regional'];
$centro = $_GET['centro'];
$sede = $_GET['sede'];
$tipo = $_GET['tipo'];
$nombre = $_GET['nombre'];
$cantidad = $_GET['cantidad'];

//consulta para insertar datos
$sql = "INSERT INTO tblAmbientes VALUES (0, '$regional', '$centro', '$sede', '$nombre', '$cantidad', '$tipo')";
// ejecutar consulta 
if(mysqli_query($conexion, $sql)){
    return true;
}
return false;
mysqli_close($conexion);

?>
