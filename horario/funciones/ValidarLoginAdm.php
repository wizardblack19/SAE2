<?php 
session_start();
include 'conexion.php';
$usuario = $_POST['usuario'];
$clave =  $_POST['clave'];

$roll='1';

$con = mysqli_connect("localhost", "root", ""); 
mysqli_select_db($con, 'sishorario'); 


$proceso = $conexion->query("SELECT * FROM tblUsuarios WHERE usu_clave	='$clave' and usu_usuario='$usuario' and usu_roll= '$roll' ");
$resultado = mysqli_query($conexion, $proceso);


if ($resultado = mysqli_fetch_array($proceso)){
    
    $_SESSION['usu_usuario'] = $usuario;
    header("location:../instructor1.php");
    
} else {

 

    header("location:../ClaveIncorrecta.php");

}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>