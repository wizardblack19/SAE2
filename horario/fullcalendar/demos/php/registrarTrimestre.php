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

$sql="INSERT INTO tbltrimestres VALUES(0,'$inicioP', '$finP', '$Primero')";
mysqli_query($conexion, $sql);

$sql="INSERT INTO tbltrimestres VALUES(0,'$inicioS', '$finS', '$Segundo')";
mysqli_query($conexion, $sql);

$sql="INSERT INTO tbltrimestres VALUES(0,'$inicioT', '$finT', '$Tercero')";
mysqli_query($conexion, $sql);

$sql="INSERT INTO tbltrimestres VALUES(0,'$inicioC', '$finC', '$Cuarto')";
mysqli_query($conexion, $sql);



?>