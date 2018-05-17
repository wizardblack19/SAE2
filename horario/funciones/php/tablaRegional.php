
	
		
<table class='table'>
			<tr>
				<th>#</th><th>Pais</th><th>Departamento</th><th>Director</th><th>Nombre</th><th><i class="material-icons">build</i></span></th>
			</tr>			
				<?php
				$mysqli = new mysqli("localhost", "root", "", "sishorario");		
				if ($mysqli->connect_errno) {
				echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				exit();
				}
				$consulta= "SELECT * FROM tblregional";
				if ($resultado = $mysqli->query($consulta)) 
				{
				while ($regional = mysqli_fetch_object($resultado)) 
				{					
					echo "<tr>";
					echo "<td>$regional->idRegional</td>
					<td>$regional->reg_pais</td>
					<td>$regional->reg_departamento</td>
					<td>$regional->reg_director</td>
					<td>$regional->reg_nombre</td>";	
					echo"<td>";						
					echo "<a href='funciones/php/editar.php?id=".$regional->idRegional."' class='btn btn-warning btn-sm' id='btnEditar'><i class='material-icons'>create</i></a> ";			
					echo "<a class='btn btn-danger btn-sm' href='funciones/php/eliminar.php?idRegional=".$regional->idRegional."'><i class='material-icons'>delete</i></a>";		
					echo "</td>";
					echo "</tr>";
					
				}
				$resultado->close();
				}
				$mysqli->close();			

				?>
		</table>