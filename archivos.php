<?php
$page = file_get_contents('./tema/archivos.html', FILE_USE_INCLUDE_PATH);
ob_start();
include("index.php");
$page = ob_get_contents();
ob_end_clean();
//Procesos PHP
$llave = array();
$enlace = array();
conectar();

$archivos = db("select * from archivos limit 0,10", $mysqli);
$tabla = "";
$n = 0;
foreach ($archivos as $archivo) {
	$n++;
	$tabla .= "<tr>
                    <td>{$n}</td>
                    <td>Eugene</td>
                    <td>Kopyov</td>
                    <td>
						<div class='btn-group'>
	                    	<button type='button' class='btn border-warning text-warning-600 btn-flat btn-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
		                    	<i class='icon-gear'></i> &nbsp;<span class='caret'></span>
	                    	</button>
	                    	<ul class='dropdown-menu dropdown-menu-right'>
								<li><a href='#'><i class='icon-pencil7'></i> Editar</a></li>
								<li class='divider'></li>
								<li><a source='del_file' idb='{$archivo['idfile']}' class='borrar' href='#'><i class='icon-trash'></i> Borrar</a></li>
							</ul>
						</div>
                    </td>
                  </tr>";
}
if($n=0){
		$tabla = "<tr><td colspan='4'>No se encontro ningun archivo con su codigo.</td></tr>";
}

$llave[] = '{tabla}';
$enlace[] = $tabla;
$llave[] = '{codigo}';
$enlace[] = $perfil['codigo'];

cerrar_conex();






$page = str_replace($llave, $enlace, $page);
















echo $page;