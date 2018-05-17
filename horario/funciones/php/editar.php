<?php

if(isset($_GET['id']))
{
	$id =$_GET['id'];
	$con = new mysqli("localhost", "root", "", "sishorario");
	$sql= "SELECT * FROM tblRegional WHERE idRegional ='$id'";
	if($resultado = mysqli_query($con, $sql))
	{
		while ($regional = mysqli_fetch_object($resultado))
		{
			header("location: ../../Regional.php?id='".$id."'&Pais='".$regional->reg_pais."'&Departamento='".$regional->reg_departamento."'&Director='".$regional->reg_director."'&Nombre='".$regional->reg_nombre."'");
		}
	}


}


?>