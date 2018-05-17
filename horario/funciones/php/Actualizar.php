<?php



if(isset($_GET['idRegional']))
{
	$id=$_GET['idRegional'];
	$pais=$_GET['Pais'];
	$dpto=$_GET['Dpto'];
	$director=$_GET['Director'];
	$nombre=$_GET['Nombre'];

	$con= new mysqli("localhost", "root","","sishorario");
	$sql = "UPDATE tblRegional SET reg_pais='$pais', reg_departamento='$dpto', reg_director='$director', reg_nombre='$nombre' where idRegional='$id'";

	if(mysqli_query($con, $sql))
	{
		echo "1";
	}
	else
	{
		echo "0";
	}
}



?>