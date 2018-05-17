<?php 


 
 $conexion= new mysqli("localhost", "root", "", "Sishorario");
    $Query ="SELECT * FROM tblInstructores ORDER BY idInstructor";
    if ($Resultado=$conexion->query($Query)) {

  echo "
  <h1><b>TABLA INSTRUCTORES</b></h1>";
    echo "<table class='tablains'> 
    
    <th> #</th>
    
    
    <th> Tipo Doc</th>
    <th> Numero</th>
    <th> Nombres</th>
    
    <th> Apellidos</th>
    <th> Tipo Ins</th>
    <TH> Profesion </th>
    <TH> Horario </th>
    <TH> Perfil </th>
    <TH> Eliminar </th>
    
    ";
    
    while ($fila=mysqli_fetch_array($Resultado)) {
      echo "
    <tr>
    <td>$fila[0]</td>
    <td>$fila[5]</td>
    <td>$fila[6]</td>
    <td>$fila[1] $fila[2]</td>
    
    <td>$fila[3] $fila[4]</td>
    
    
    <td>$fila[7]</td>
    <td>$fila[11]</td>
    <center>
    <td>
      
      <form method='POST' action='Horario1.php'><input type='hidden' name='documentoo' value='"; echo $fila[6]; echo"'>
        <button type='submit' style='background:transparent;'>
          <a href=''>
             <img src='iconosImagenes/ojo.png' border='0' title='Ver Horario Instructor' widht='20px' height='20px'>
          </a>
        </button>
      </form>
    
    </td>
    <td>
      
      <form method='POST' action='Horario1.php'><input type='hidden' name='documentoo' value='"; echo $fila[6]; echo"'>
        <button type='submit' style='background:transparent;'>
          <a href=''>
             <img src='iconosImagenes/editarnegro.svg' border='0' title='Editar Instructor' widht='20px' height='20px'>
          </a>
        </button>
      </form>
    
    </td><td>
      
      <form method='POST' action='Funciones/EliminarInstructor.php'><input type='hidden' name='documentoo' value='"; echo $fila[6]; echo"'>
        <button type='submit' style='background:transparent;'>
          <a href=''>
             <img src='iconosImagenes/basura.svg' border='0' title='Eliminar Instructor' widht='20px' height='20px'>
          </a>
        </button>
      </form>
    
    </td>
    </center>
    </tr>
    </tr>
    
      
    ";
    }
    
    }
    echo "</table> 
    <br>";
    
    
   
?>