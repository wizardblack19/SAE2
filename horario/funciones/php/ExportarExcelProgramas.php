
<?php
		$mysqli = new mysqli("localhost", "root", "", "sishorario");		
		if ($mysqli->connect_errno) {
		 "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit();
		}

		?>
<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=TablaProgramas.xls");
header("Pragma: no-cache");
header("Expires: 0");?>
?>
<head>
	<style type="text/css">
		.table
		{
			border: 1px #111 solid;
		}
	</style>
</head>
<table class="table"  cellspacing="0px">
	<center>
<h1 bgcolor="#111">LISTA DE PROGRAMAS </h1>
</center>
	<tr>

		<th bgcolor="#CEF6D8" class="th" >#</th>
	<th bgcolor="#CEF6D8" class="th" >Centro</th>
		<th bgcolor="#CEF6D8" class="th" >Sede</th>
		<th bgcolor="#CEF6D8" class="th" >Tipo Formacion</th>
		<th bgcolor="#CEF6D8" class="th" >Codigo</th>
		<th bgcolor="#CEF6D8" class="th" >Nombre</th>
		<th bgcolor="#CEF6D8" class="th" >Cantidad de Aprendicez</th>
		


	</tr>			
		<?php
		$consulta= "SELECT * FROM tblProgramas";
		if ($resultado = $mysqli->query($consulta)) 
		{
			while ($Programa = mysqli_fetch_object($resultado)) 
			{

				?>


			<tr>

				<td class="td" bgcolor="#eee"><?php echo $Programa->idPrograma ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Programa->pro_centro ?> </td>
				<td class="td" bgcolor="#eee"><?php echo $Programa->pro_sede ?> </td>
				<td class="td" bgcolor="#eee"><?php echo $Programa->pro_tipoformacion ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Programa->pro_codigo ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Programa->pro_nombre?></td>
				<td class="td" bgcolor="#eee"><?php echo $Programa->pro_cantaprendicez ?></td>
			
				
				
				
			</tr>

				 <?php
			}
		
		$resultado->close();
		}
		$mysqli->close();			

		?>
		
		</tr>

</table>




