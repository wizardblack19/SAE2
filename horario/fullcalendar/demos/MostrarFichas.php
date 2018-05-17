 <?php 
              $con=new mysqli("localhost", "root","","sishorario");
              $sede =$_GET['sede'];

              $sql = "SELECT tblfichas.fic_nroficha as numero FROM tblfichas, tblsede WHERE tblsede.idSede='$sede' and tblfichas.fic_sede='$sede'";

              $proceso=mysqli_query($con, $sql);
              echo "<option>.::SELECCIONAR FICHASS::.</option>";
              while ($ficha=mysqli_fetch_object($proceso)) {
           ?> 
           <option value='<?php echo $ficha->numero; ?>'><?php echo "FICHA: ". $ficha->numero ?></option>

             <?php
                 }
             ?>