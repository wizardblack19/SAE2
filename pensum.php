<?php
$page = file_get_contents('./tema/pensum.html', FILE_USE_INCLUDE_PATH);
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
$enlace[] =tabla_pensum('1');

$llave[] = '{grado}';
$enlace[] = Sgrado(0);
$llave[] = '{nivel}';
$enlace[] = Snivel('nivel',true);
$llave[] = '{carrera}';
$enlace[] = Snivel('carrera',true);



$page = str_replace($llave, $enlace, $page);
echo $page;

