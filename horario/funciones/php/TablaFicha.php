<table class='table'>			
		<?php
		$mysqli = new mysqli("localhost", "root", "", "sishorario");		
		if ($mysqli->connect_errno) {
		echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit();
		}
		$consulta= "SELECT * FROM tblfichas";
		if ($resultado = $mysqli->query($consulta)) 
		{
		?> <tr>
			<th>#</th><th>Programa</th><th>Jornada</th><th>Tipo Presencia</th><th>Instructor</th><th>No. Ficha</th><th>No. Aprendices</th><th>Fecha Inicio</th><th>Fecha Fin</th><th><i class="material-icons">build</i></span></th>
		</tr>
		<?php
			while ($fichas = mysqli_fetch_object($resultado)) 
			{					
				echo "<tr>";
				echo "<td>$fichas->idFicha</td><td>$fichas->fic_programa</td><td>$fichas->fic_jornada</td><td>$fichas->fic_tipopresencia</td><td>$fichas->fic_instructor</td><td>$fichas->fic_nroficha</td><td>$fichas->fic_cantidadaprendicez	</td><td>$fichas->fic_fechainicio</td><td>$fichas->fic_fechafin</td>";	
				echo"<td>";						
				echo "<a href='funciones/php/editar.php?idFicha=".$fichas->idFicha."' class='btn btn-warning btn-sm''><i class='material-icons'>create</i></a> ";			
				echo "<a class='btn btn-danger btn-sm' href='funciones/php/eliminar.php?idFicha=".$fichas->idFicha."'><i class='material-icons'>delete</i></a>";		
				echo "</td>";
				echo "</tr>";
			}
		$resultado->close();
		}
		$mysqli->close();			

		?>
</table>