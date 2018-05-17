	
<table class='table'>
			<tr>
				<th>#</th><th>Usuario</th><th>Roll</th><th><i class="material-icons">build</i></span></th>
			</tr>			
				<?php
				$mysqli = new mysqli("localhost", "root", "", "sishorario");		
				if ($mysqli->connect_errno) {
				echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				exit();
				}
				$consulta= "SELECT * FROM tblusuarios";
				if ($resultado = $mysqli->query($consulta)) 
				{
				while ($usuarios = mysqli_fetch_object($resultado)) 
				{					
					echo "<tr>";
					echo "<td>$usuarios->idUsuario</td>
					<td>$usuarios->usu_usuario</td>
					<td>$usuarios->usu_roll</td>";	
					echo "<td>";						
					echo "<a href='editar.php?id=" .$usuarios->idUsuario ."' class='btn btn-warning btn-sm''><i class='material-icons'>create</i></a> ";			
					echo "<a class='btn btn-danger btn-sm' href='elimina.php?id=" .$usuarios->idUsuario ."'><i class='material-icons'>delete</i></a>";		
					echo "</td>";
					echo "</tr>";
					
				}
				$resultado->close();
				}
				$mysqli->close();			

				?>
		</table>