<?php
$conexion=new mysqli("localhost", "root", "", "sishorario");

$regional = $_GET['regional'];
$municipio = $_GET['municipio'];
$centro = $_GET['centro'];
$sede = $_GET['sede'];
$programa = $_GET['programa'];
$jornada = $_GET['jornada'];
$tipo = $_GET['tipo'];
$instructor = $_GET['instructor'];
$numero = $_GET['numero'];
$cantidad = $_GET['cantidad'];
$inicio = $_GET['fechainicio'];
$fin = $_GET['fechafin'];







//consulta para insertar datos
$sql = "INSERT INTO tblfichas VALUES (0, '$regional', '$municipio', '$centro', '$sede', '$programa', '$jornada', '$tipo', '$instructor', '$numero', '$cantidad', '$inicio', '$fin')";
// ejecutar consulta 
if(mysqli_query($conexion, $sql)){
    return true;
}
return false;
mysqli_close($conexion);

?>
