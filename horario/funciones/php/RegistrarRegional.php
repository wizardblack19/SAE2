
<?php 
$conexion = new mysqli("localhost", "root", "", "sishorario");
//recibir los datos para almacenarlos en varialbes
$pais = $_GET['pais'];
$departamento = $_GET['departamento'];
$director = $_GET['director'];
$nombre = $_GET['nombre'];


//consulta para insertar datos
$query="SELECT*FROM tblRegional WHERE reg_pais='$pais' AND reg_departamento='$departamento' and reg_nombre='$nombre' ";

if($resultado=mysqli_query($conexion,$query))
{
	if(mysqli_num_rows($resultado)>0){
		$mensaje=1;

		$datos[] = array('mensajeError' => $mensaje);

		header('Content-Type: application/json');
		echo json_encode($datos, JSON_FORCE_OBJECT);

		return false;

		}


}



$sql = "INSERT INTO tblRegional VALUES (0, '$pais', $departamento, '$director', '$nombre')";
// ejecutar consulta 
if(mysqli_query($conexion, $sql)){
return true;
}else{
    
    return false;
}


mysqli_close($conexion);

?>


