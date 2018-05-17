
<?php
		$mysqli = new mysqli("localhost", "root", "", "sishorario");		
		if ($mysqli->connect_errno) {
		 "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit();
		}

		?>


<?php
header('Content-type: application/vnd.ms-word');
header("Content-Disposition: attachment; filename=TablaAmbientes.doc");
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

border:0.1px #333 solid;
	color:#000;
  }

div{	border:1px #111 solid;
		font:Arial;
color:#fff;
	background-color:#088A85 ;
}
td
{ 	
	text-align:center;
}

</style>

</head>

<div  class="btn btn-primary" >

<center>
<h1 bgcolor="#111">LISTA DE AMBIENTES </h1>
</center>
</div>


<table class="table"  cellspacing="0px">
	
	<tr>

		<th bgcolor="#CEF6D8" class="th" >#</th>
	<th bgcolor="#CEF6D8" class="th" >Sede</th>
		<th bgcolor="#CEF6D8" class="th" >Nombre</th>
		<th bgcolor="#CEF6D8" class="th" >Capacidad Aprendicez</th>
		<th bgcolor="#CEF6D8" class="th" >Tipo Ambiente</th>

		


	</tr>			
		<?php
		$consulta= "SELECT * FROM tblAmbientes";
		if ($resultado = $mysqli->query($consulta)) 
		{
			while ($Ambiente = mysqli_fetch_object($resultado)) 
			{

				?>


			<tr>

				<td class="td" bgcolor="#eee"><?php echo $Ambiente->idAmbiente ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Ambiente->amb_sede ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Ambiente->amb_nombre ?> </td>
				<td class="td" bgcolor="#eee"><?php echo $Ambiente->amb_capacidad ?> </td>
				<td class="td" bgcolor="#eee"><?php echo $Ambiente->amb_tipoambiente ?></td>
				
				
				
				
			</tr>

				 <?php
			}
		
		$resultado->close();
		}
		$mysqli->close();			

		?>
		
		</tr>

</table>
