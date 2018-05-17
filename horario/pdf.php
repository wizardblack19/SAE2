<?php ob_start(); ?>

<?php
include	'Funciones/php/tablausuario.php';
?>
<?php
require_once("dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "ejemplo".time().'.pdf';
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>
