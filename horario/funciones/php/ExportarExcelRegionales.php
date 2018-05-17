
<?php
		$mysqli = new mysqli("localhost", "root", "", "sishorario");		
		if ($mysqli->connect_errno) {
		 "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit();
		}

		?>

<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=TablaRegional.xls");
header("Pragma: no-cache");
header("Expires: 0");?>
?>


<head>


<style>
.table{
	border:1px #111 solid;
	border-radius:20;
width:100%;
}
.td{
	border:0.2px #333 solid;
	color:#000;
	

}	
.th
{
border:0.2px #333 solid;
	color:#000;
  }

div{	border:1px #111 solid;
		font:Arial;
color:#fff;
	background-color:#088A85 ;
}
td
{ 	width:25%;
	text-align:center;
}

</style>

</head>

<div  class="btn btn-primary" >

<center>
<h1 bgcolor="#111">LISTA DE REGIONALES </h1>
</center>
</div>

<table class="table"  cellspacing="0px">
	
	<tr>

		<th bgcolor="#CEF6D8" class="th" >#</th>
		<th bgcolor="#CEF6D8" class="th" >Pais</th>
		<th bgcolor="#CEF6D8" class="th" >Departamento</th>
		<th bgcolor="#CEF6D8" class="th" >Director</th>
		<th bgcolor="#CEF6D8" class="th" >Nombre Regional</th>


	</tr>			
		<?php
		$consulta= "SELECT * FROM tblRegional";
		if ($resultado = $mysqli->query($consulta)) 
		{
			while ($Regional = mysqli_fetch_object($resultado)) 
			{

				?>


			<tr>
				<td class="td" bgcolor="#eee"><?php echo $Regional->idRegional ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Regional->reg_pais ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Regional->reg_departamento ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Regional->reg_director ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Regional->reg_nombre ?> </td>
				
				
				
			</tr>

				 <?php
			}
		
		$resultado->close();
		}
		$mysqli->close();			

		?>
		
		</tr>

</table>
