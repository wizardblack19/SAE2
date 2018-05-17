<?php
			try{
				$conexion = new PDO('mysql:host=localhost;dbname=sishorario','root','');
			}catch(PDOException $e){
				echo "Error: ". $e->getMessage();
			}
			
			$consultaEst = $conexion -> prepare("
			SELECT count(*) as estados FROM events WHERE confirmado='false'");
			$consultaEst ->execute();
			$consultaEst = $consultaEst ->fetchAll();
?>
<?php foreach ($consultaEst as $Sql): ?>
	<?php echo "<i class='notification'>". $Sql['estados']. "</i>"; ?>									
<?php endforeach; ?>
										<strong>NOTIFICACIONES</strong>
									</a>
