<?php
$page = file_get_contents('./tema/miscursos.html', FILE_USE_INCLUDE_PATH);
ob_start();
include("index.php");
$page = ob_get_contents();
ob_end_clean();


$llave = array();
$enlace = array();
$llave[] = '{codigo}';
$enlace[] = $perfil['codigo'];
$llave[] = '{tabla_miscursos}';
$enlace[] = vermiscursos($perfil['codigo']);

$llave[] = '{Sgrado}';
$enlace[] = Sgrado(0);

$llave[] = '{Snivel}';
$enlace[] = Snivel(0);

$llave[] = '{Sjornada}';
$enlace[] = Sjornada();

$llave[] = '{Scarrera}';
$enlace[] = Snivel(2);

$llave[] = '{Sseccion}';
$enlace[] = Sseccion();


$page = str_replace($llave, $enlace, $page);
echo $page;