<table class='table'>
	<tr>
		<th>#</th><th>Regional</th><th>Centro</th><th>Director</th><th>Nombre</th><th>Direccion</th><th>Telefono</th><th><i class="material-icons">build</i></span></th>
	</tr>			
		<?php
		$mysqli = new mysqli("localhost", "root", "", "sishorario");		
		if ($mysqli->connect_errno) {
		echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit();
		}
		$consulta= "SELECT * FROM tblsede";
		if ($resultado = $mysqli->query($consulta)) 
		{
		while ($sede = mysqli_fetch_object($resultado)) 
		{					
			echo "<tr>";
			echo "<td>$sede->idSede</td><td>$sede->sed_regional</td><td>$sede->sed_centro</td><td>$sede->sed_director</td><td>$sede->sed_nombre</td><td>$sede->sed_direccion</td><td>$sede->sed_telefono</td>";	
			echo"<td>";						
			echo "<a href='funciones/php/editar.php?idSede=".$sede->idSede."' class='btn btn-warning btn-sm''><i class='material-icons'>create</i></a> ";			
			echo "<a class='btn btn-danger btn-sm' href='funciones/php/eliminar.php?idSede=".$sede->idSede."'><i class='material-icons'>delete</i></a>";		
			echo "</td>";
			echo "</tr>";
		}
		$resultado->close();
		}
		$mysqli->close();			

		?>
</table>