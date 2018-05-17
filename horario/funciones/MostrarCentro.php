<?php

$mun= $_POST['id']; //valor del select


$ccon = new mysqli("localhost", "root", "", "sishorario");
						$sql = "SELECT tblCentro.cen_nombre, idCentro FROM Municipio, tblcentro WHERE tblcentro.cen_municipio='$mun' and municipio.idMunicipio='$mun' ORDER BY tblcentro.cen_nombre ";
						$proceso =mysqli_query($ccon, $sql);
echo "<option>.::SELECCIONAR CENTRO::.</option>";
			while ($centro=mysqli_fetch_object($proceso)) {
							?>
			<option value="<?php echo $centro->idCentro ?> "> <?php echo $centro->cen_nombre ?> </option> 
				<?php 	}

						?>