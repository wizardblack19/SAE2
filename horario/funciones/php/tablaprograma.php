<table class='table'>
	<tr>
		<th>#</th><th>Regional</th><th>Centro</th><th>Sede</th><th>Nombre</th><th>TipoFormación</th><th>Codigo</th><th>No. Aprendices</th><th><i class="material-icons">build</i></span></th>
	</tr>			
		<?php
		$mysqli = new mysqli("localhost", "root", "", "sishorario");		
		if ($mysqli->connect_errno) {
		echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit();
		}
		$consulta= "SELECT * FROM tblprogramas";
		if ($resultado = $mysqli->query($consulta)) 
		{
			while ($programa = mysqli_fetch_object($resultado)) 
			{					
				echo "<tr>";
				echo "<td>$programa->idPrograma</td><td>$programa->pro_regional</td><td>$programa->pro_centro</td><td>$programa->pro_sede</td><td>$programa->pro_nombre</td><td>$programa->pro_tipoformacion</td><td>$programa->pro_codigo</td><td>$programa->pro_cantaprendicez</td>";	
				echo"<td>";						
				echo "<a href='funciones/php/editar.php?idPrograma=".$programa->idPrograma."' class='btn btn-warning btn-sm''><i class='material-icons'>create</i></a> ";			
				echo "<a class='btn btn-danger btn-sm' href='funciones/php/eliminar.php?idPrograma=".$programa->idPrograma."'><i class='material-icons'>delete</i></a>";		
				echo "</td>";
				echo "</tr>";
			}
		$resultado->close();
		}
		$mysqli->close();			

		?>
</table>