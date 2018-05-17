<?php

$conexion = new mysqli("localhost", "root", "", "sishorario");

$sql="SELECT*FROM tbltrimestres";

$resultado=mysqli_query($conexion, $sql);
while($trimestre=mysqli_fetch_object($resultado))
{
	$datos[] = array('inicio' => $trimestre->tri_inicio,'fin' => $trimestre->tri_fin, 'trimestre' => $trimestre->tri_descripcion);

}
header('Content-Type: application/json');

echo json_encode($datos, JSON_FORCE_OBJECT);

?>