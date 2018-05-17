
<?php

$dpt= $_GET['id']; //valor del select


$ccon = new mysqli("localhost", "root", "", "sishorario");
						$sql = "SELECT Municipio.nombreMunicipio, idmunicipio FROM Municipio, tbldepartamentos WHERE tbldepartamentos.idDepartamento='$dpt' and municipio.departamento_iddepartamento='$dpt'  ORDER BY Municipio.idMunicipio";
						$proceso =mysqli_query($ccon, $sql);

			while ($mun=mysqli_fetch_object($proceso)) {
							?>
			<option value="<?php echo $mun->idmunicipio ?>"> <?php echo $mun->nombreMunicipio ?> </option> 
				<?php 	}

						?>