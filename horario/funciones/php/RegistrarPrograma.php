<?php
$conexion=new mysqli("localhost", "root", "", "sishorario");

$regional = $_GET['regional'];
$muni = $_GET['municipio'];
$centro = $_GET['centro'];
$sede = $_GET['sede'];
$tipo = $_GET['tipo'];
$codigo = $_GET['codigo'];
$nombre = $_GET['nombre'];
$cantidad = $_GET['cantidad'];

//consulta para insertar datos
$sql = "INSERT INTO tblProgramas VALUES (0, '$regional','$muni', '$centro', '$sede', '$tipo', '$codigo', '$nombre', '$cantidad')";
// ejecutar consulta 
if(mysqli_query($conexion, $sql)){
    return true;
}
return false;
mysqli_close($conexion);

?>
