
<?php 
include 'conexion.php';
//recibir los datos para almacenarlos en varialbes
$pais = $_REQUEST['Pais'];
$departamento = $_REQUEST['Departamento'];
$director = $_REQUEST['DirectorRegional'];
$nombre = $_REQUEST['Nombre'];






//consulta para insertar datos
$sql = "INSERT INTO tblRegional VALUES (0, '$pais', $departamento, '$director', '$nombre')";
// ejecutar consulta 
$resultado = mysqli_query($conexion, $sql);
mysqli_close($conexion);

?>


