<section class="registrodecentro"> 
	
	
				<form class="RegInstructor" method="POST" action="Funciones/RegistrarInstructor.php">
					<div class="formIns"><br>
						<div><b>REGISTRAR CENTRO</b></div><br>
 				<?php $dpt="";  ?>
							 <SELECT type="select" name="Regional" required>
						
							   <?php
							   	$Conexion=new mysqli("localhost", "root", "", "sishorario");
							   	$sql= "SELECT * FROM tblRegional ORDER BY reg_nombre";

							   	$proceso=mysqli_query($Conexion, $sql);

							   	while ($resultado=mysqli_fetch_object($proceso))
							   	 {
							   		?>
							   		<option class="option" value="<?php $dpt=$resultado->reg_departamento ?> <?php echo $resultado->reg_nombre ?>"><?php echo $resultado->reg_nombre ?> </option>

									 <?php  
								 }

							   ?>
							 </SELECT>
							 <SELECT type="select" name="Municipio" required>
							    <OPTION value="">.::Municipio::.</OPTION>
						<?php
						$ccon = new mysqli("localhost", "root", "", "sishorario");
						$sql = "SELECT Municipio.nombreMunicipio, idmunicipio FROM Municipio, tbldepartamentos WHERE tbldepartamentos.idDepartamento='$dpt' and municipio.departamento_iddepartamento='$dpt'  ORDER BY Municipio.idMunicipio";
						$proceso =mysqli_query($ccon, $sql);

						while ($municipio=mysqli_fetch_object($proceso)) {
							?>
					<option value="<?php echo $municipio->idMunicipio ?> "> <?php echo $municipio->nombreMunicipio ?> </option> 
					<?php 	}

						?>
							 </SELECT>
							 <input type="select" name="Codigo"  placeholder="Codigo Centro *" required>
							 <input type="select" name="Director"  placeholder="Director Centro *" required><br>
							 <input type="text" name="Nombre" placeholder="Nombre Centro *" required>
							 <input type="text" name="Direccion" placeholder="Direccion" required><br>
							 <input type="text" name="Telefono" placeholder="Telefono" required>
							 <input type="text" name="Email" placeholder="Email" required><br>
							 <button type="submit">REGISTRAR  CENTRO</button>
				
					</div><br>
				</form>
		    </section>