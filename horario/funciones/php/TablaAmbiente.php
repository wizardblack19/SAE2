<table class='table'>
	<tr>
		<th>#</th><th>Regional</th><th>Centro</th><th>Sede</th><th>Nombre</th><th>Capacidad</th><th>Tipo Ambiente</th><th><i class="material-icons">build</i></span></th>
	</tr>			
		<?php
		$mysqli = new mysqli("localhost", "root", "", "sishorario");		
		if ($mysqli->connect_errno) {
		echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit();
		}
		$consulta= "SELECT * FROM tblambientes";
		if ($resultado = $mysqli->query($consulta)) 
		{
		while ($ambiente = mysqli_fetch_object($resultado)) 
		{					
			echo "<tr>";
			echo "<td>$ambiente->idAmbiente</td><td>$ambiente->amb_regional</td><td>$ambiente->amb_centro</td><td>$ambiente->amb_sede</td><td>$ambiente->amb_nombre</td><td>$ambiente->amb_capacidad</td><td>$ambiente->amb_tipoambiente</td>";	
			echo"<td>";						
			echo "<a href='funciones/php/editar.php?idAmbiente=".$ambiente->idAmbiente."' class='btn btn-warning btn-sm''><i class='material-icons'>create</i></a> ";			
			echo "<a class='btn btn-danger btn-sm' href='funciones/php/eliminar.php?idAmbiente=".$ambiente->idAmbiente."'><i class='material-icons'>delete</i></a>";			
			echo "</td>";
			echo "</tr>";
		}
		$resultado->close();
		}
		$mysqli->close();			

		?>
</table>