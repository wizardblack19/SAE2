<?php

$sed= $_POST['id']; //valor del select


$ccon = new mysqli("localhost", "root", "", "sishorario");
						$sql = "SELECT tblprogramas.pro_nombre, idPrograma FROM tblsede, tblprogramas WHERE tblsede.idSede='$sed' and tblprogramas.pro_sede='$sed' ORDER BY tblprogramas.pro_nombre ";
						$proceso =mysqli_query($ccon, $sql);

			while ($programa=mysqli_fetch_object($proceso)) {
							?>
			<option value="<?php echo $programa->idPrograma ?> "> <?php echo $programa->pro_nombre ?> </option> 
				<?php 	}

						?>