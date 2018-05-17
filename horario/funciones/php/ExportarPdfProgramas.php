
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
<h1 bgcolor="#111">LISTA DE PROGRAMAS </h1>
</center>
</div>

<table class="table"  cellspacing="0px">
	
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


<?php

require_once '../../dompdf/dompdf_config.inc.php';

$dompdf = new DOMPDF(); 
$dompdf->load_html(ob_get_clean()); 

$dompdf->set_paper('letter','carta'); 
$dompdf->render(); 
$pdf= $dompdf->output();

$filename = "TablaProgramas".time().'.pdf';
file_put_contents($filename, $pdf);

$dompdf->stream($filename); 


?>


