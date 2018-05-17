<?php

$mun= $_GET['id']; //valor del select


$ccon = new mysqli("localhost", "root", "", "sishorario");
						$sql = "SELECT tblCentro.cen_nombre, idCentro FROM tblregional, tblcentro, tbldepartamentos WHERE tblcentro.cen_regional='$mun' and tblregional.reg_departamento='$mun' and tbldepartamentos.iddepartamento='$mun' and tblregional.reg_departamento='$mun' ORDER BY tblcentro.cen_nombre ";
						$proceso =mysqli_query($ccon, $sql);
echo "<option>.::SELECCIONAR CENTRO::.</option>";
			while ($centro=mysqli_fetch_object($proceso)) {
							?>
			<option value="<?php echo $centro->idCentro ?>"> <?php echo $centro->cen_nombre ?> </option> 
				<?php 	}

						?>