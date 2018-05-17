<?php 


 
   $conexion= new mysqli("localhost", "root", "", "Sishorario");
        $Query ="SELECT * FROM tblRegional ORDER BY idRegional";

        if ($Resultado=$conexion->query($Query))
        {
        
          echo "
          <h1><b>TABLA REGIONAL</b></h1>";
        echo "
        <table class='tablains'> 
        
          <th> #</th>
          <th> Pais</th>
          <th> Departamento</th>
          <th> Director</th>
          <th> Nombre</th>
          <TH> Ver </th>
          <TH> Editar</th>
          <TH> Eliminar </th>
          
                  
        ";
        
        while ($fila=mysqli_fetch_array($Resultado)) 
            {
                  echo "
               <form method='POST' id='form_regional_editar'class='form_regionalOpciones'>
                  <tr>
                  
                    <td id='idRegional' name='idRegional'>$fila[0]</td>
                    <td id='PaisRegional' name='PaisRegional'>$fila[1]</td>
                    <td id='DepartamentoRegional' name='DepartamentoRegional'>$fila[2]</td>
                    <td id='DirectorRegional' name='DirectorRegional'>$fila[3]</td>
                    <td id='NombreRegional' name='NombreRegional'>$fila[4]</td>
                    <td><center>
                         <input type='hidden' name='documentoo' value='"; echo $fila[0]; echo"'>
                         <button type='submit' style='background:transparent;'>
                           <a href=''>
                            <img src='iconosImagenes/ojo.png' border='0' title='Ver regional' width='20px' height='20px'>
                           </a>
                         </button>
                       </center>
                    </td>
                    <td><center>
                     
                    <input type='hidden' id='hidden' class='hidden' name='documentoo' value='"; echo $fila[0]; echo"'>
                     <button type='submit' id='editarRegional' class='editarRegional' style='background:transparent;'>
                      
                       <img src='iconosImagenes/editarnegro.svg' border='0' title='Editar regional' width='20px' height='20px'>
                        
                     </button>
                     </form>
                      </center>
                    </td>
                    <td><center>
                        <a href=''>
                           <img src='iconosImagenes/Basura.svg' border='0' title='Eliminar regional' width='20px' height='20px'>
                        </a>
                    </td></center>  
                    
                    
                  </tr> ";
    
            }
        
          }
        echo "
          </table> 

        <br><br><br><br><br><br>";
        
    
    
   
?>