<?php

$inicioP=$_GET['inicioP'];
$inicioS=$_GET['inicioS'];
$inicioT=$_GET['inicioT'];
$inicioC=$_GET['inicioC'];

$finP=$_GET['finP'];
$finS=$_GET['finS'];
$finT=$_GET['finT'];
$finC=$_GET['finC'];

$Primero="Primero";
$Segundo="Segundo";
$Tercero="Tercero";
$Cuarto="Cuarto";

$conexion = new mysqli("localhost", "root", "", "sishorario");

$sql="UPDATE tbltrimestres SET tri_inicio='$inicioP', tri_fin='$finP' WHERE tri_descripcion ='$Primero'";
mysqli_query($conexion, $sql);

$sql="UPDATE tbltrimestres SET tri_inicio='$inicioS', tri_fin='$finS' WHERE tri_descripcion ='$Segundo'";
mysqli_query($conexion, $sql);

$sql="UPDATE tbltrimestres SET tri_inicio='$inicioT', tri_fin='$finT' WHERE tri_descripcion ='$Tercero'";
mysqli_query($conexion, $sql);

$sql="UPDATE tbltrimestres SET tri_inicio='$inicioC', tri_fin='$finC' WHERE tri_descripcion ='$Cuarto'";
mysqli_query($conexion, $sql);

?>