<table class='table'>
	<tr>
		<th>#</th><th>Regional</th><th>Cod Centro</th><th>Director</th><th>Centro</th><th>Direccion</th><th><i class="material-icons">build</i></span></th>
	</tr>			
		<?php
		$mysqli = new mysqli("localhost", "root", "", "sishorario");		
		if ($mysqli->connect_errno) {
		echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit();
		}
		$consulta= "SELECT * FROM tblcentro";
		if ($resultado = $mysqli->query($consulta)) 
		{
		while ($centro = mysqli_fetch_object($resultado)) 
		{					
			echo "<tr>";
			echo "<td>$centro->idCentro</td><td>$centro->cen_regional</td><td>$centro->cen_codigo</td><td>$centro->cen_director</td><td>$centro->cen_nombre</td><td>$centro->cen_direccion</td>";	
			echo"<td>";						
			echo "<a href='funciones/php/editar.php?idCentro=".$centro->idCentro."' class='btn btn-warning btn-sm''><i class='material-icons'>create</i></a> ";			
			echo "<a class='btn btn-danger btn-sm' href='funciones/php/eliminar.php?idCentro=".$centro->idCentro."'><i class='material-icons'>delete</i></a>";		
			echo "</td>";
			echo "</tr>";
		}
		$resultado->close();
		}
		$mysqli->close();			

		?>
</table>