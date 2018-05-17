
<table class='table'>
	<tr>
		<th>#</th><th>Nombre</th><th>Apellido</th><th><i class="material-icons">build</i></span></th>
	</tr>			
		<?php
		$mysqli = new mysqli("localhost", "root", "", "sishorario");		
		if ($mysqli->connect_errno) {
		echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit();
		}
		$consulta= "SELECT * FROM tblinstructores";
		if ($resultado = $mysqli->query($consulta)) 
		{
		while ($instructor = mysqli_fetch_object($resultado)) 
		{					
			echo "<tr>";
			echo "<td>$instructor->idInstructor</td><td>$instructor->ins_nombre</td><td>$instructor->ins_apellido	</td>";	
			echo"<td>";						
			echo "<a href='funciones/php/editar.php?idInstructor=".$instructor->idInstructor."' class='btn btn-warning btn-sm''><i class='material-icons'>create</i></a> ";			
			echo "<a class='btn btn-danger btn-sm' href='funciones/php/eliminar.php?idInstructor=".$instructor->idInstructor."'><i class='material-icons'>delete</i></a>";		
			echo "</td>";
			echo "</tr>";
		}
		$resultado->close();
		}
		$mysqli->close();			

		?>
</table>