

<?php
			$sede=$_GET['id'];
			
			$con = new mysqli("localhost", "root", "", "sishorario");
			$sql = "SELECT * FROM tblAmbientes WHERE amb_sede = '$sede' ORDER BY amb_nombre";
			$proceso = mysqli_query($con, $sql);
			echo "<option>SELECCIONAR</option>";
			while ($amb = mysqli_fetch_object($proceso)) {
		
			?>
			<option value="<?php echo $amb->idAmbiente ?>"> <?php echo $amb->amb_nombre ?> </option>

			<?php
			}
			?>
