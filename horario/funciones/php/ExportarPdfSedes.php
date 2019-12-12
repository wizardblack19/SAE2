
<?php
		$mysqli = new mysqli("localhost", "root", "", "sishorario");		
		if ($mysqli->connect_errno) {
		 "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit();
		}

		?>
<?php   ob_start();   ?>


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
<h1 bgcolor="#111">LISTA DE SEDES </h1>
</center>
</div>

<table class="table"  cellspacing="0px">
	
	<tr>

		<th bgcolor="#CEF6D8" class="th" >#</th>
	<th bgcolor="#CEF6D8" class="th" >Municipio</th>
		<th bgcolor="#CEF6D8" class="th" >Centro</th>
		<th bgcolor="#CEF6D8" class="th" >Director</th>
		<th bgcolor="#CEF6D8" class="th" >Nombre</th>
		<th bgcolor="#CEF6D8" class="th" >Direccion</th>
		<th bgcolor="#CEF6D8" class="th" >Telefono</th>
		<th bgcolor="#CEF6D8" class="th" >Email</th>


	</tr>			
		<?php
		$consulta= "SELECT * FROM tblSede";
		if ($resultado = $mysqli->query($consulta)) 
		{
			while ($Sede = mysqli_fetch_object($resultado)) 
			{

				?>


			<tr>

				<td class="td" bgcolor="#eee"><?php echo $Sede->idSede ?></td>
			<td class="td" bgcolor="#eee"><?php echo $Sede->sed_municipio ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Sede->sed_centro ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Sede->sed_director ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Sede->sed_nombre ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Sede->sed_direccion ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Sede->sed_telefono ?> </td>
				<td class="td" bgcolor="#eee"><?php echo $Sede->sed_email ?> </td>
				
				
				
			</tr>

				 <?php
			}
		
		$resultado->close();
		}
		$mysqli->close();			

		?>
		
		</tr>

</table>


<?php

require_once '../../dompdf/dompdf_config.inc.php';

$dompdf = new DOMPDF(); 
$dompdf->load_html(ob_get_clean()); 

$dompdf->set_paper('letter','carta'); 
$dompdf->render(); 
$pdf= $dompdf->output();

$filename = "TablaCentro".time().'.pdf';
file_put_contents($filename, $pdf);

$dompdf->stream($filename); 


?>


