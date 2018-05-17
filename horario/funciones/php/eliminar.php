<?php

session_start();

	$conexion = new mysqli("localhost", "root", "", "sishorario");
 

	if(isset($_GET['idRegional']))
	{
	   $id = $_GET['idRegional'];
	   $sql = "DELETE FROM tblRegional WHERE idRegional=$id";
	   mysqli_query($conexion, $sql);
	   header("location: ../../regional.php");
	}
	if(isset($_GET['idCentro']))
	{
	   $id = $_GET['idCentro'];
	   $sql = "DELETE FROM tblCentro WHERE idCentro=$id";
	   mysqli_query($conexion, $sql);
	   header("location: ../../centro.php");
	}
	if(isset($_GET['idSede']))
	{
	   $id = $_GET['idSede'];
	   $sql = "DELETE FROM tblSede WHERE idSede=$id";
	   mysqli_query($conexion, $sql);
	   header("location: ../../sede.php");
	}
	if(isset($_GET['idPrograma']))
	{
	   $id = $_GET['idPrograma'];
	   $sql = "DELETE FROM tblProgramas WHERE idPrograma=$id";
	   mysqli_query($conexion, $sql);
	   header("location: ../../programa.php");
	}
	if(isset($_GET['idFicha']))
	{
	   $id = $_GET['idFicha'];
	   $sql = "DELETE FROM tblFichas WHERE idFicha=$id";
	   mysqli_query($conexion, $sql);
	   header("location: ../../fichas.php");
	}
	if(isset($_GET['idAmbiente']))
	{
	   $id = $_GET['idAmbiente'];
	   $sql = "DELETE FROM tblAmbientes WHERE idAmbiente=$id";
	   mysqli_query($conexion, $sql);
	   header("location: ../../ambiente.php");
	}
	if(isset($_GET['idInstructor']))
	{
	   $id = $_GET['idInstructor'];
	   $sql = "DELETE FROM tblInstructores WHERE idInstructor=$id";
	   $conexion->query($sql);
	   header("location: ../../instructor.php");
	}







		



?>