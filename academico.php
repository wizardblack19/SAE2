<?php
$page = file_get_contents('./tema/academico.html', FILE_USE_INCLUDE_PATH);
ob_start();
include("index.php");
$page = ob_get_contents();
ob_end_clean();
conectar();
$codigo = $_GET['docente'] ?? $perfil['codigo'];
$llave = array();
$enlace = array();
$llave[] = '{codigo}';
$enlace[] = $codigo;
$llave[] = '{list_jornadas}';
$enlace[] = list_jornadas();






cerrar_conex();

$page = str_replace($llave, $enlace, $page);
echo $page;
