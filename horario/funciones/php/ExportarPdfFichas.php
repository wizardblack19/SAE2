
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
{
	text-align:center;
}

</style>

</head>

<div  class="btn btn-primary" >

<center>
<h1 bgcolor="#111">LISTA DE FICHAS </h1>
</center>
</div>

<table class="table"  cellspacing="0px">
	
	<tr>

		<th bgcolor="#CEF6D8" class="th" >#</th>
		<th bgcolor="#CEF6D8" class="th" >Centro</th>
		<th bgcolor="#CEF6D8" class="th" >Sede</th>
		<th bgcolor="#CEF6D8" class="th" >Programa</th>
		<th bgcolor="#CEF6D8" class="th" >Jornada</th>
		<th bgcolor="#CEF6D8" class="th" >Tipo Presencia</th>
		<th bgcolor="#CEF6D8" class="th" >Instructor</th>
		<th bgcolor="#CEF6D8" class="th" >Nro Ficha</th>
	
		<th class="th" bgcolor="#CEF6D8" >Cant. Aprendicez</th>
		<th class="th" bgcolor="#CEF6D8" >Fecha Inicio</th>
		<th class="th" bgcolor="#CEF6D8" >Fecha Finalizacion</th>

	</tr>			
		<?php
		$consulta= "SELECT * FROM tblFichas";
		if ($resultado = $mysqli->query($consulta)) 
		{
			while ($ficha = mysqli_fetch_object($resultado)) 
			{

				?>


			<tr>
				<td class="td" bgcolor="#eee"><?php echo $ficha->idFicha ?></td>
				<td class="td" bgcolor="#eee"><?php echo $ficha->fic_centro ?></td>
				<td class="td" bgcolor="#eee"><?php echo $ficha->fic_sede ?></td>
				<td class="td" bgcolor="#eee"><?php echo $ficha->fic_programa ?></td>
				<td class="td" bgcolor="#eee"><?php echo $ficha->fic_jornada ?> </td>
				<td class="td" bgcolor="#eee"><?php echo $ficha->fic_tipopresencia ?> </td>
				<td class="td" bgcolor="#eee"><?php echo $ficha->fic_instructor ?> </td>	
				<td class="td" bgcolor="#eee"><?php echo $ficha->fic_nroficha?> </td>	
			
				<td class="td" bgcolor="#eee"><?php echo $ficha->fic_cantidadaprendicez?> </td>				
				<td class="td" bgcolor="#eee"><?php echo $ficha->fic_fechainicio ?> </td>
				<td class="td" bgcolor="#eee"><?php echo $ficha->fic_fechafin ?> </td>
				
				
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

$filename = "TablaFichas".time().'.pdf';
file_put_contents($filename, $pdf);

$dompdf->stream($filename); 


?>


