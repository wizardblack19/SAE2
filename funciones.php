<?php
	//Valores Forzados para php
	date_default_timezone_set('America/Guatemala');
	ini_set('memory_limit', '1G');


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
          setcookie(session_name(), '', time() - 420000,
              $params["path"], $params["domain"],
              $params["secure"], $params["httponly"]
          );
      session_destroy();
      setcookie("perfil", 0,time() - 3600);
      }
      header("Location: login.php");
      exit;
	}

	function datosG($codigo, $tipo){
		$datosGE = array(); 	
		global $mysqli;
		    if($codigo && $tipo){
		    	$datosGE['hora'] = date('1998');
		    	if($user = db("select codigo,tipo,nombres,apellidos from user where codigo = '".$codigo."' and tipo = '".$tipo."' limit 0,1 ",$mysqli)){
		   		 	$datosGE['nombres'] = $user[0]['nombres'];
		    		$datosGE['apellidos'] = $user[0]['apellidos'];
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
					//cerrar_conex();
		return $tabla;
	}

	function vermiscursos($codigo){
		global $mysqli;
		conectar();	
		$tabla = "";
		$n = 0;		
		if($asignaciones = db("SELECT cursos.codigo,cursos.nombre,cursos.grado,cursos.nivel,cursos.carrera,asignaciones.seccion,cursos.jornada 
			FROM asignaciones INNER JOIN cursos ON asignaciones.curso = cursos.codigo
			WHERE asignaciones.maestro LIKE '{$codigo}' ",$mysqli)){
		$tabla = '
		<table class="table datatable-column-search-selects table-bordered">
			<thead>
				<tr>
					<th width="10">#</th>
					<th width="50">Codigo</th>
					<th>Curso</th>
					<th>Grado</th>
					<th width="40">Sección</th>
					<td width="150"></td>
				</tr>
			</thead>
			<tbody>';
		foreach ($asignaciones as $curso) {
			$n++;
			$grado = grado($curso['grado'],$curso['nivel'],$curso['carrera']);
			$tabla .= "
			<tr>
                <td>{$n}</td>
                <td>{$curso['codigo']}</td>
                <td>{$curso['nombre']}</td>
                <td>{$grado}</td>
                <td>{$curso['seccion']}</td>";
            $tabla .= '<td>

					<ul class="icons-list">
						<li><a class="permiso_unidad" href="#" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
						<li><a class="permiso_unidad" href="#" data-popup="tooltip" title="Remove"><i class="icon-trash"></i></a></li>
						<li><a class="permiso_unidad" href="#" data-popup="tooltip" title="Options"><i class="icon-cog7"></i></a></li>
					</ul>


				</td>
            </tr>
            ';

			
		}

		$tabla .= '
		</tbody>
			<tfoot>
				<tr>
					<th width="10">#</th>
					<td width="50">Codigo</th>
					<td>Curso</td>
					<td>Grado</td>
					<td width="40">Sección</td>
					<th width="150"></td>
				</tr>
			</tfoot>
		</table>';

	}else{

		$tabla = "<h3>No tiene cursos asignados, puede asignarse en cualquier momento.</h3>";
	}
		return $tabla;
		cerrar_conex();
	}

	function grado_t($g){
		if($g==1){
			$g = "Primero";
		}elseif ($g==2) {
			$g = "Segundo";
		}elseif ($g==3) {
			$g = "Tercero";
		}elseif ($g==4) {
			$g = "Cuarto";
		}elseif ($g==5) {
			$g = "Quinto";
		}elseif ($g==6) {
			$g = "Sexto";
		}else{
			$g = 0;
		}
		return $g;
	}
	function grado($g,$n,$c){
		global $mysqli;
		$nivel = "";
		if($n=="DIVER" || $n=="DIVERF"){
			$n = $c;
		}
		if($niv = db("select * from carreras where codigo like '{$n}' limit 0,1 ",$mysqli)){
			$nivel = $niv[0]['nombre'];
		}
		$g = grado_t($g).' '.$nivel;
		return $g;
	}

	function Sgrado($limite){
		$select = '';
		//Select para grados
		if ($limite == 0 || $limite > 6) {
			$limite = 6;
		}
		$select = '
		<select name="grado" class="form-control" required>
        <option value="">Grado</option>';
        for ($i = 1; $i <= $limite; $i++) {
        	$select .= "<option value=\"{$i}\">".grado_t($i).'</option>';
		}
		$select .= '</select>';
		return $select;
	}

	function Snivel(){
		global $mysqli;
		$niveles = db("select codigo, nombre from carreras where tipo = 1",$mysqli);
		$select = '
        <select name="nivel" class="form-control" required>
            <option value="">Nivel</option>';
    	foreach ($niveles as $nivel) {
        	$select .= "<option value=\"{$nivel['codigo']}\">{$nivel['nombre']}</option>";
        }
        $select .= '</select>';
        return $select;
	}

	function Sjornada(){
		global $mysqli;
		$i = 0;
		$jornadas = db("select valor from opciones where opcion LIKE 'JORNADAS' limit 0,1",$mysqli);
		$select = '
        <select name="jornada" class="form-control" required>
            <option value="">Nivel</option>';
    	foreach ($jornadas as $jornada) {
    		$i++;
        	$select .= "<option value=\"{$i}\">{$nivel['nombre']}</option>";
        }
        $select .= '</select>';
        return $select;
	}		