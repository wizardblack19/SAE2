<?php

	function version(){
		$ver = '3.0';
		echo $ver;
	}

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
		    	$datosGE['hora'] = date('1998');
		    	if($user = db("select codigo,tipo from user where codigo = '".$codigo."' and tipo = '".$tipo."' limit 0,1 ",$mysqli)){
		   		 	$datosGE['nombres'] = "Marvin Adolfo";
		    		$datosGE['apellidos'] = "Lopez Garcia";
		    		$datosGE['hora'] = date('YmdHis');
		    		$datosGE['codigo'] = $codigo;
		    	}
		    		$perfil = json_encode($datosGE);
		    		setcookie("perfil", $perfil);
		    }
	}

	function ext($ext){
		$info = new SplFileInfo($ext);
		$ext = $info->getExtension();
		return $ext;
	}

	function microsoft_view($archivo){
		if( ext($archivo) == "pdf"){
			$enlace = "files/";
		}else{
			$enlace = "https://view.officeapps.live.com/op/view.aspx?src=";
		}
		return $enlace.$archivo;
	}

	function tabla_archivos($codigo){
		global $mysqli;
		conectar();	
		$tabla = "";
		$n = 0;
		//Cualquier cambio aqui debe hacerce en CORE id VerArchivos
		if($archivos = db("select * from archivos where codocente like '{$codigo}' ", $mysqli)){
			$enlace = "";
			$tabla = '
				<table class="table table-bordered table-framed">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th>Título de Archivo</th>
							<th width="15%"># adjunto</th>
							<th width="15%">Opciones</th>
						</tr>
					</thead>
					<tbody>';
			foreach ($archivos as $archivo) {
				$n++;
				$enlace = microsoft_view($archivo['archivo']);
				$tabla .= "
				<tr>
	                <td>{$n}</td>
	                <td>{$archivo['nombre']}</td>
	                <td>{conteo}</td>
	                <td>
						<div class='btn-group'>
	                    	<button type='button' class='btn border-warning text-warning-600 btn-flat btn-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
		                    	<i class='icon-gear'></i> &nbsp;<span class='caret'></span>
	                    	</button>
	                    	<ul class='dropdown-menu dropdown-menu-right'>
	                    		<li><a class='verDOC' href='#verDOC' rel='{$enlace}'><i class='icon-file-eye'></i> Ver</a></li>
								<li><a href='#'><i class='icon-pencil7'></i> Editar</a></li>
								<li class='divider'></li>
								<li><a source='del_file' idb='{$archivo['id']}' class='borrar' href='#borrar'><i class='icon-trash'></i> Borrar</a></li>
							</ul>
						</div>
	                </td>
	            </tr>";
			}
			$tabla .= '</tbody></table>';
		}else{
			$tabla = "<h3>No se encontro archivos con su codigo.</h3>";
		}
					cerrar_conex();
		return $tabla;
	}

	function vermiscursos($codigo){
		global $mysqli;
		conectar();	
		$tabla = "";
		$n = 0;		
		if($asignaciones = db("SELECT asignaciones.maestro as 'cod_maestro', asignaciones.curso as 'cod_curso', cursos.nombre as 'curso', CONCAT(cursos.grado,' ',carreras.nombre) as 'grado', asignaciones.seccion, cursos.jornada 
		FROM 
		asignaciones 
		INNER JOIN cursos ON asignaciones.curso = cursos.codigo 
		INNER JOIN carreras ON (cursos.carrera = carreras.codigo OR cursos.nivel = carreras.codigo) 
		WHERE asignaciones.maestro LIKE '{$codigo}' ",$mysqli)){
		$tabla = '
		<table class="table datatable-column-search-selects table-bordered">
			<thead>
				<tr>
					<th width="5%">#</th>
					<th width="10%">Codigo</th>
					<th>Curso</th>
					<th>Grado</th>
					<th>Sección</th>
					<th width="15%">Opciones</th>
				</tr>
			</thead>
			<tbody>';
		foreach ($asignaciones as $curso) {
			$n++;
			$tabla .= "
			<tr>
                <td>{$n}</td>
                <td>{$curso['cod_curso']}</td>
                <td>{$curso['curso']}</td>
                <td>{$curso['grado']}</td>
                <td>{$curso['seccion']}</td>
                <td>{$curso['jornada']}</td>
            </tr>";

			
		}






		$tabla .= '
		</tbody>
			<tfoot>
				<tr>
					<th width="5%">#</th>
					<td width="10%">Codigo</th>
					<td>Curso</td>
					<td>Grado</td>
					<td>Sección</td>
					<th widtd="15%">Opciones</td>
				</tr>
			</tfoot>
		</table>';

	}else{

		$tabla = "<h3>No tiene cursos asignados, puede asignarse en cualquier momento.</h3>";
	}
		return $tabla;
		cerrar_conex();
	}
