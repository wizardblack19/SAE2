
<?php  $mysqli = new mysqli("localhost", "root", "", "sishorario");		
		if ($mysqli->connect_errno) {  "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error; exit(); }
		?>
<?php
header('Content-type: application/vnd.ms-word');
header("Content-Disposition: attachment; filename=TablaInstructor.doc");
header("Pragma: no-cache");
header("Expires: 0");?>
?>


<!DOCTYPE html>
<html>

<head>
<style>
	.table{
		border:1px #111 solid;
		border-radius:20;

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

	div{

		border:1px #111 solid;
		font:Arial;
		color:#fff;
		background-color:#088A85 ;
	}
	td
	{
		text-align:center;
	}
	.imgg
	{
		width: 10px;
		height: 10px;
	}
</style>
</head>

<body>

	<div  class="btn btn-primary" >
		<center>
			<h1 bgcolor="#111">LISTA DE INSTRUCTORES </h1>
		</center>
	</div>

	<table class="table"  cellspacing="0px">		
		<tr>
			<th bgcolor="#CEF6D8" class="th" >#</th>		
			<th bgcolor="#CEF6D8" class="th" colspan="2" >NOMBRES</th>
			<th bgcolor="#CEF6D8" class="th" colspan="2" >APELLIDOS</th>	
			<th class="th" bgcolor="#CEF6D8" >DOCUMENTO</th>
			<th class="th" bgcolor="#CEF6D8" >TIPO</th>
			<th class="th" bgcolor="#CEF6D8" >GENERO</th>
			<th class="th" bgcolor="#CEF6D8" >TELEFONO</th>
			<th class="th" bgcolor="#CEF6D8" >EMAIL</th>
		</tr>			
			<?php
			$consulta= "SELECT * FROM tblinstructores";
			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($instructor = mysqli_fetch_object($resultado)) 
				{	
					?>
						<tr>
							<td class="td" bgcolor="#eee"><?php echo $instructor->idInstructor ?></td>
							<td class="td" bgcolor="#eee"><?php echo $instructor->ins_nombre ?> </td>
							<td class="td" bgcolor="#eee"><?php echo $instructor->ins_nombre2 ?> </td>
							<td class="td" bgcolor="#eee"><?php echo $instructor->ins_apellido ?> </td>	
							<td class="td" bgcolor="#eee"><?php echo $instructor->ins_apellido2 ?> </td>	
						
							<td class="td" bgcolor="#eee"><?php echo $instructor->ins_nrodocumento ?> </td>				
							<td class="td" bgcolor="#eee"><?php echo $instructor->ins_tipoinstructor ?> </td>
							<td class="td" bgcolor="#eee"><?php echo $instructor->ins_genero ?> </td>
							<td class="td" bgcolor="#eee"><?php echo $instructor->ins_telefono ?> </td>
							<td class="td" bgcolor="#eee"><?php echo $instructor->ins_email ?> </td>
						</tr>
					 <?php
				}		
			$resultado->close();
			}
			$mysqli->close();			

				?>		
			</tr>
	</table>
</body>
</html>



