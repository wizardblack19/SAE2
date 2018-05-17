
<?php 
include 'conexion.php';
//recibir los datos para almacenarlos en varialbes
$regional = $_POST['Regional'];
$municipio = $_POST['Municipio'];
$centro = $_POST['Centro'];
$sede = $_POST['Sede'];
$programa = $_POST['Programa'];
$jornada = $_POST['Jornada'];
$TipoPresencia =$_POST['TipoPresencia'];
$instructor =$_POST['Instructor'];
$nro = $_POST['NroFicha'];
$cantidad = $_POST['Cantidad'];
$fechai = $_POST['FechaInicio'];
$fechaf = $_POST['FechaFin'];

//consulta para insertar datos
$sql = "INSERT INTO tblFichas VALUES 
(0, '$regional', '$municipio', '$centro', '$sede', '$programa', '$jornada', '$TipoPresencia',  '$instructor', '$nro', '$cantidad', '$fechai', '$fechaf' )";

// ejecutar consulta 
$resultado = mysqli_query($conexion, $sql);
mysqli_close($conexion);

?>


