<?php
$page = file_get_contents('./tema/configuracion.html', FILE_USE_INCLUDE_PATH);
ob_start();
include("index.php");
$page = ob_get_contents();
ob_end_clean();


$llave = array();
$enlace = array();
$llave[] = '{codigo}';
$enlace[] = $perfil['codigo'];





$page = str_replace($llave, $enlace, $page);
echo $page;