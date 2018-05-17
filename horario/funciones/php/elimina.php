<?php

session_start();

	$conexion = new mysqli("localhost", "root", "", "sishorario");


	if(isset($_GET['idRegional']))
	{
	   $id = $_GET['idRegional'];
	   $sql = $conexion->query("DELETE FROM tblRegional WHERE idRegional='$id'");	
		echo "<script language='javascript'> alert('ELIMINADO CORRECTAMENTE LA REGIONAL CON ID $id'); </script>";
		header("location: ../../regional.php");
	}

		



?>