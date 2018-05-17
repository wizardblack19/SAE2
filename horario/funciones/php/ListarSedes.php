<?php

$cen= $_GET['id']; //valor del select


$ccon = new mysqli("localhost", "root", "", "sishorario");
$sql = "SELECT tblsede.sed_nombre, idSede FROM tblsede, tblcentro WHERE tblcentro.idCentro='$cen' and tblsede.sed_centro='$cen' ORDER BY tblsede.sed_nombre ";
$proceso =mysqli_query($ccon, $sql);

			echo "<option>.::SELECCIONAR SEDE::.</option>";
			while ($sede=mysqli_fetch_object($proceso)) {
							?>
			<option value="<?php echo $sede->idSede ?>"> <?php echo $sede->sed_nombre ?> </option> 
				<?php 	}

						?>