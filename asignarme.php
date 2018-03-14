<?php
$page = file_get_contents('./tema/asignarme.html', FILE_USE_INCLUDE_PATH);
ob_start();
include("index.php");
$page = ob_get_contents();
ob_end_clean();











echo $page;