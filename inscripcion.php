<?php
$page = file_get_contents('./tema/inscripcion.html', FILE_USE_INCLUDE_PATH);
ob_start();
include("index.php");
$page = ob_get_contents();
ob_end_clean();
conectar();
$codigo = $_GET['docente'] ?? $perfil['codigo'];
$idp = $_GET['r'] ?? 0;


$llave = array('{{carrera}}','{{jornada}}','{{nivel}}','{{grado}}','{{seccion}}','{{hoy}}','{{idp}}');
$enlace = array(Snivel("carrera"),Sjornada(),Snivel("nivel"),Sgrado(0),Sseccion(),date('Y-m-d'),$idp);





cerrar_conex();

$page = str_replace($llave, $enlace, $page);
echo $page;

$var = array_search('NIVELES', $_SESSION['data']);

print_r($_SESSION['data']);


//U89560 PRI 380 PRE 300 Bas 350 Diver bach 310 diver peritos 325 gradua 330

