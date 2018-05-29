<?php
$page = file_get_contents('./tema/docentes.html', FILE_USE_INCLUDE_PATH);
ob_start();
include("index.php");
$page = ob_get_contents();
ob_end_clean();
//Procesos PHP
$llave = array();
$enlace = array();



$llave[] = '{codigo}';
$enlace[] = $perfil['codigo'];
$llave[] = '{tabla}';
$enlace[] =tabla_usuarios('usuarios','1');
$llave[] = '{modaluser}';
$enlace[] =modal_usuarios('1');

$page = str_replace($llave, $enlace, $page);
echo $page;
