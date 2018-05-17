
<?php 
include 'conexion.php';
//recibir los datos para almacenarlos en varialbes
$docc = $_POST['documentoo'];







//consulta para insertar datos
$sql = "DELETE FROM tblInstructores WHERE ins_nrodocumento='$docc' "  ;
// ejecutar consulta 
$resultado = mysqli_query($conexion, $sql);
if (!$resultado){
        echo 'error al eliminar';
         }
else {
    echo 'Instructor Eliminado Exitosamente';


	
    header('location: ../instructor1.php');
}

mysqli_close($conexion);

?>


