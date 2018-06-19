<?php
$page = file_get_contents('./tema/preinscripcion.html', FILE_USE_INCLUDE_PATH);
ob_start();
include("index.php");
$page = ob_get_contents();
ob_end_clean();
conectar();
$llave = array();
$enlace = array();
$llave[] = '{codigo}';
$enlace[] = $perfil['codigo'];

$llave[] 	= '{grado}';
$enlace[] 	= Sgrado(0);
$llave[] 	= '{nivel}';
$enlace[] 	= Snivel('nivel',true);
$llave[] 	= '{carrera}';
$enlace[] 	= Snivel('carrera',true);
$llave[] 	= '{jornada}';
$enlace[] 	= sjornada();
$llave[] 	= '{dia}';
$enlace[] 	= fecha('d');
$llave[] 	= '{year}';
$enlace[] 	= fecha('y');
$llave[] 	= '{mes}';
$enlace[] 	= fecha('m');





cerrar_conex();
$page = str_replace($llave, $enlace, $page);
echo $page;
