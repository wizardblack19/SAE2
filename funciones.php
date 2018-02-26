<?php


	function lugar(){
		$nombre_archivo = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
			if ( strpos($nombre_archivo, '/') !== FALSE ){
			    //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre sin su extension
			    @$nombre_archivo = preg_replace('/\.php$/', '' ,array_pop(explode('/', $nombre_archivo)));
			}
		return $nombre_archivo;
	}


	function conectar(){
	global $mysqli;	
		define("HOST", "localhost");
		define("USER", "root"); 
		define("PASSWORD", "ceci5652");
		define("DATABASE", "fuentede_sae");
		@$mysqli = mysqli_connect(HOST, USER, PASSWORD) or die ("No se ha podido conectar al servidor. <br />Error: ".mysqli_connect_error());
		@$db = mysqli_select_db( $mysqli, DATABASE ) or die ( "Upps! No es posible conectar con la base de datos." );
		$acentos = $mysqli->query("SET NAMES 'utf8'");
	}

	function db ($sql, $c) {
		$res = false;
		$q = ($c === null)?@mysqli_query($sql):@mysqli_query($c,$sql);

		if($q) {
			if(strpos(strtolower($sql),'select') === 0) {
				$res = array();
				while($r = mysqli_fetch_assoc($q)) {
					$res[] = $r;
				}
			} else {
				$res = ($c === null)?mysqli_affected_rows():mysqli_affected_rows($c);
			}
		}
		return $res;
		mysqli_close($c);
	}

	function cerrar_conex(){
		global $mysqli;
		mysqli_close ($mysqli);
	}

	function sesion(){
		if(!isset($_COOKIE['perfil']) && (isset($_SESSION['codigo']) && isset($_SESSION['tipo'])) ){
			datosG($_SESSION['codigo'], $_SESSION['tipo']);
		}	
		if((isset($_SESSION['codigo']) && isset($_SESSION['tipo'])) and lugar()=="login" ){
			header('Location: index.php');
			exit();
		}
		if(!(isset($_SESSION['codigo']) && isset($_SESSION['tipo'])) and lugar()!="login" ){
			header('Location: login.php');
		exit();
		}

	}

	function salir(){
      session_start();
      $_SESSION = array();
      if (ini_get("session.use_cookies")) {
          $params = session_get_cookie_params();
          setcookie(session_name(), '', time() - 42000,
              $params["path"], $params["domain"],
              $params["secure"], $params["httponly"]
          );
      session_destroy();
      setcookie("perfil", $perfil,time() - 3600);
      }
      header("Location: login.php");
      exit;
	}

	function datosG($codigo, $tipo){
		$datosGE = array(); 	
		global $mysqli;
		    if($codigo && $tipo){
		    	//conectar();
		    	$datosGE['hora'] = date('1998');
		    	if($user = db("select codigo,tipo from user where codigo = '".$codigo."' and tipo = '".$tipo."' limit 0,1 ",$mysqli)){
		   		 	$datosGE['nombres'] = "Marvin Adolfo";
		    		$datosGE['apellidos'] = "Lopez Garcia";
		    		$datosGE['hora'] = date('YmdHis');
		    		$datosGE['codigo'] = $codigo;
		    	}
		    		$perfil = json_encode($datosGE);
		    		setcookie("perfil", $perfil);		    	
		    	//cerrar_conex();
		    }
	}

