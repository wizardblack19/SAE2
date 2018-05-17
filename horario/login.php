x<?php
session_start();
?>
<?php
if (isset($_SESSION['admin']) ) {
	header('Location: index.php');
}else
{
	if (isset($_SESSION['instructor']) ) {
		header('Location: index.php');
	}else{
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
			$password = $_POST['password'];
			$password = hash('sha512', $password);
			$roll;
			$errores ='';	
		
			try{
				$conexion = new PDO('mysql:host=localhost;dbname=sishorario','root','');
			}catch(PDOException $e){
				echo "Error: ". $e->getMessage();
			}
				if($usuario=="ADMIN" or $usuario=="admin")
				{
						$statement = $conexion -> prepare(
						"SELECT usu_roll as roll, usu_usuario as usuario FROM tblusuarios  WHERE tblusuarios.usu_usuario = :usuario AND tblusuarios.usu_clave = :password ");
				}else
				{
					$statement = $conexion -> prepare(
					"SELECT tblusuarios.usu_roll as roll, usu_usuario as usuario, tblinstructores.ins_nrodocumento as numero FROM tblusuarios, tblinstructores WHERE tblusuarios.usu_usuario = :usuario AND tblusuarios.usu_clave = :password and  tblinstructores.ins_nrodocumento ='$usuario' and tblusuarios.usu_usuario='$usuario'");
				}
				
		
			$statement ->execute(array(':usuario'=> $usuario,':password'=> $password));
		
			while( $resultado = $statement->fetch())
				if($resultado !==false){
					if($resultado[0]== '1'){
						$_SESSION['admin'] = $resultado[1];				
						header('Location: administracion.php');
					}else{
						if($resultado[0]== '2'){
							$_SESSION['instructor'] = $resultado[2];

							header('Location: horario.php');
						}
					}
			
				}else{
					$errores .= 'Datos incorrectos y/o invalidos!';
				}
		}
		require	'views/form/login.php';
		
	}	
}

?>
