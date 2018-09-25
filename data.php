<?php
$page = file_get_contents('./tema/data.html', FILE_USE_INCLUDE_PATH);
$plantilla_pre_inscripcion = file_get_contents('tema/plantillas/pre_inscripcion.html', FILE_USE_INCLUDE_PATH);
ob_start();
include("index.php");
$page = ob_get_contents();
ob_end_clean();
conectar();
$codigo = $_GET['docente'] ?? $perfil['codigo'];
$idp = $_GET['rr'] ?? 0;


//para plantilla
$ge = array("{{N.encargado}}","{{dpi}}","{{parentesco}}","{{ciclo.4}}","{{N.alumno}}","{{T.dia}}","{{T.mes}}","{{T.year}}","{{E.alumno}}","{{day}}","{{year}}","{{T.ciclo}}");
$plantilla_pre_inscripcion = str_replace($ge, construye($_GET['r'],$ge), $plantilla_pre_inscripcion);




$llave = array('{{plantilla_pre_inscripcion}}','{{idp}}');
$enlace = array($plantilla_pre_inscripcion,$idp);


cerrar_conex();

$page = str_replace($llave, $enlace, $page);
echo $page;
