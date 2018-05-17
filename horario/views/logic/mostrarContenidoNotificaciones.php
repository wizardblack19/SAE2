
	<?php
	try{
			$conexion = new PDO('mysql:host=localhost;dbname=sishorario','root','');
			}catch(PDOException $e){
				echo "Error: ". $e->getMessage();
			}
			$consulta = $conexion -> prepare("
			SELECT * FROM events WHERE confirmado='false' order by id");
			$consulta ->execute();
			$consulta = $consulta ->fetchAll();
	?>

<?php foreach ($consulta as $Sql): ?>
	<?php echo "<li> <a href='horario.php?horaInicial=". $Sql['start']."&ambiente=".$Sql['amb']."'>El horario del instructor: <strong id='probar'>". $Sql['instructor']. "</strong> esta sin confirmar </a></li>"; ?>									
	<?php endforeach; ?>