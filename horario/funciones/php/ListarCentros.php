<?php
if(isset($_GET['id'])){
$mun= $_GET['id'];

 //valor del select


$ccon = new mysqli("localhost", "root", "", "sishorario");
						$sql = "SELECT tblCentro.cen_nombre, idCentro FROM Municipio, tblcentro WHERE tblcentro.cen_municipio='$mun' and municipio.idMunicipio='$mun' ORDER BY tblcentro.cen_nombre ";
						$proceso =mysqli_query($ccon, $sql);
echo "<option>.::SELECCIONAR CENTRO::.</option>";
			while ($centro=mysqli_fetch_object($proceso)) {
							?>
			<option value="<?php echo $centro->idCentro ?>"> <?php echo $centro->cen_nombre ?> </option> 
				<?php 
			
			}


}


$reg= $_GET['idd'];

$ccon = new mysqli("localhost", "root", "", "sishorario");
						$sql = "SELECT tblcentro.cen_nombre, idCentro FROM tblregional, tblcentro WHERE tblcentro.cen_regional='$reg' and tblregional.reg_departamento='$reg' ";
						$proceso =mysqli_query($ccon, $sql);
echo "<option>.::SELECCIONAR CENTRO::.</option>";
			while ($centro=mysqli_fetch_object($proceso)) {
							?>
			<option value="<?php echo $centro->idCentro ?>"> <?php echo $centro->cen_nombre ?></option> 
				<?php 
			
			}




	?>